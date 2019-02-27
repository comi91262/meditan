<?php

namespace App\Services\Service;

interface TermServiceInterface
{
    public function retriveAllTerms();
    public function retriveCorrectAnswers($term, $lang);
}
