<?php

namespace App\Repositories\Question;

interface QuestionRepositoryInterface
{
    public function retrieveQuestion($section, $number);
    public function retrieveLatestWrongQuestions();
    public function saveTerms(array $terms);
}
