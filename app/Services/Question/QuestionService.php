<?php

namespace App\Services\Question;

use App\Services\Question\QuestionServiceInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Repositories\Term\TermRepositoryInterface;

class QuestionService implements QuestionServiceInterface
{
    protected $questionRepository;

    protected $termRepository;

    /**
    * @param object $question
    */
    public function __construct(
        QuestionRepositoryInterface $questionRepository,
        TermRepositoryInterface $termRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->termRepository = $termRepository;
    }

    /**
    * @return string セクション番号
    */
    public function createQuestions()
    {
        $terms = $this->termRepository->retreveRandomizedTerms(10);
        return $this->questionRepository->saveTerms($terms);
    }
}
