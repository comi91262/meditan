<?php
namespace App\Services\Term;

interface TermServiceInterface
{
    public function retrieveAllTerms();
    public function retrieveRandomizedTerms($departments, $number, $lang);
    public function retrieveCorrectAnswers($term, $lang): array;
    public function retrieveSimilarQuestions($number);
    public function checkDuplication($term) : bool;
}