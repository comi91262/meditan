<?php

namespace App\Services\Question;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use App\Services\Question\QuestionServiceInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Services\Term\TermServiceInterface;

class QuestionService implements QuestionServiceInterface
{
    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepository;

    /**
     * @var TermServiceInterface
     */
    protected $termService;

    /**
     * @param object $question
     */
    public function __construct(
        TermServiceInterface $termService,
        QuestionRepositoryInterface $questionRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->termService = $termService;
    }


    /**
     * ユーザーの回答が正解かどうかを調べて返す
     * 解答も返す
     *
     * @param string $section
     * @param string $number
     * @param string $userAnswer
     * @return (boolean, string)
     */
    public function isCorrect($section, $number, $userAnswer)
    {
        $question = $this->questionRepository->retrieveQuestion($section, $number);
        $answers = $this->termService->retrieveCorrectAnswers($question->question, $question->language);

        return [in_array($userAnswer, $answers), $answers];
    }

    /**
     * @param string 問題文の言語
     * @param string ジャンル
     * @param int    問題数
     * @return string セクション番号
     */
    public function createQuestions($lang, $departments, $number)
    {
        $terms = $this->termService->retrieveRandomizedTerms($departments, $number, $lang);
        return $this->questionRepository->saveTerms($terms);
    }

    public function createRetryQuestions()
    {
        $terms = $this->questionRepository->retrieveLatestWrongQuestions();
        return $this->questionRepository->saveTerms($terms);
    }

    public function createConditionQuestions($number)
    {
        $terms = DB::table('english_terms')->orderBy('term', 'asc')->take($number)->pluck('term')->toArray();
        return $this->questionRepository->saveTerms($terms, Config::get('constants.language.english'));
    }

    public function retrieveSetOfAssociatedSection($section)
    {
        $questions = DB::table('questions')->where(
            [
                'section' => $section,
            ]
        )->get();

        $successCount = 0;
        $failureCount = 0;
        $noAnswerCount = 0;
        foreach ($questions as $question) {
            if ($question->answer_datetime === null) {
                $noAnswerCount += 1;
                continue;
            }
            if ($question->success === 1) {
                $successCount += 1;
                continue;
            }
            if ($question->success === 0) {
                $failureCount += 1;
                continue;
            }
        }

        $total =  $successCount + $failureCount + $noAnswerCount;

        return [
            'total' => $total,
            'success' => $successCount,
            'failure' => $failureCount,
            'answered' => $total - $noAnswerCount,
        ];
    }

    public function retrieveLatestSection($userId)
    {
        $question = DB::table('questions')->where('user', $userId)->latest()->first();

        if ($question !== null) {
            return $question->section;
        } else {
            return '';
        }
    }

    public function retrieveAllQuestions($userId)
    {
        $questions = DB::table('questions')
            ->select()
            ->where('user', $userId)
            ->whereNotNull('answer_datetime')
            ->orderByDesc('answer_datetime')
            ->get()
        ;

        // TODO 遅くなるかも
        foreach ($questions as $question) {
            $answers = $this->termService->retrieveCorrectAnswers($question->question, $question->language);
            $question->answer = implode(', ', $answers);
        }

        return $questions;
    }


}
