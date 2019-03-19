<?php

namespace App\Services\Question;

interface QuestionServiceInterface
{
    public function createQuestions($lang, $departments, $number);
    public function createConditionQuestions($number);
    public function createRetryQuestions();
    public function retrieveSetOfAssociatedSection($section);
    public function retrieveLatestSection($userId);
    public function retrieveAllQuestions($userId);
}
