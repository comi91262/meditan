<?php

namespace App\Repositories\Term;

interface TermRepositoryInterface
{
    public function retrieveRandomizedTerms($number, $department);
}
