<?php

namespace App\Services\Question;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Services\Term\TermServiceInterface;
use App\Services\Question\QuestionServiceInterface;
use App\Services\UserTerm\UserTermServiceInterface;
use App\Repositories\Question\QuestionRepositoryInterface;

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
     * @var UserTermServiceInterface
     */
    protected $userTermService;

    /**
     * @param object $question
     */
    public function __construct(
        TermServiceInterface $termService,
        UserTermServiceInterface $userTermService,
        QuestionRepositoryInterface $questionRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->termService = $termService;
        $this->userTermService = $userTermService;
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
        $defaultAnswers = $this->termService->retrieveCorrectAnswers($question->question, $question->language);

        if (in_array($userAnswer, $defaultAnswers)) {
            return [true, $defaultAnswers];
        }

        $usersAnswers = $this->userTermService->retrieveCorrectAnswers($question->question, $question->language);

        if (in_array($userAnswer, $usersAnswers)) {
            return [true, $usersAnswers];
        }

        return [false, array_merge($defaultAnswers, $usersAnswers)];
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

    /**
     * 未回答のものがある最新のセクション番号を取得する。
     * ただし、ユーザーが意図的に中断ができるようになる(questionsの中に未回答だが回答する必要のないものが混ざる)
     * ことを想定してはじめに最新の問題を取得し、その問題が回答済みかどうかで未回答のものがあるかを判断して取得する
     *
     * @param string $userId
     * @return string
     */
    public function retrieveLatestSection($userId)
    {
        $question = DB::table('questions')
            ->where('user', $userId)
            ->orderBy('created_at', 'desc')
            ->orderBy('number', 'desc')
            ->first()
            ;

        if ($question === null) {
            return '';
        }

        if ($question->answer_datetime === null) {
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
