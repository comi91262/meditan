<?php

namespace App\Services\Question;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Repositories\Term\TermRepositoryInterface;
use App\Services\Question\QuestionServiceInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Services\Term\TermServiceInterface;

class QuestionService implements QuestionServiceInterface
{
    protected $questionRepository;
    protected $termRepository;
    protected $termService;

    /**
     * @param object $question
     */
    public function __construct(
        TermServiceInterface $termService,
        QuestionRepositoryInterface $questionRepository,
        TermRepositoryInterface $termRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->termService = $termService;
        $this->termRepository = $termRepository;
    }

    /**
     * @param string 問題文の言語
     * @param string ジャンル
     * @param int    問題数
     * @return string セクション番号
     */
    public function createQuestions($lang, $departments, $number)
    {
        $terms = $this->termRepository->retrieveRandomizedTerms($departments, $number, $lang);
        return $this->questionRepository->saveTerms($terms, $lang);
    }

    public function createConditionQuestions($number)
    {
        $terms = DB::table('english_terms')->orderBy('term', 'asc')->take($number)->pluck('term')->toArray();
        return $this->questionRepository->saveTerms($terms, Config::get('constants.language.english'));
    }

    public function retrieveSection($userId)
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
            ->get()
        ;

        // TODO 遅くなるかも
        foreach ($questions as $question) {
            $answers = $this->termService->retrieveCorrectAnswers($question->question, $question->language);
            $question->answer = implode(', ', $answers);
            if ($question->success === true) {
                $question->success = '○';
            } else {
                $question->success = '×';
            }
        }

        return $questions;
    }


}
