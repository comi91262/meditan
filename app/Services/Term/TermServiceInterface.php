<?php

namespace App\Services\Term;

interface TermServiceInterface
{
    public function retrieveAllTerms();
    public function retrieveCorrectAnswers($term, $lang);
}
