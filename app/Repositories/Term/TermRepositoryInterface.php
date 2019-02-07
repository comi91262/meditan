<?php

namespace App\Repositories\Term;

interface TermRepositoryInterface
{
    public function retrieveRandmizedTerms($number);
}
