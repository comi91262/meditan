<?php

namespace App\Repositories\Term;

interface TermRepositoryInterface
{
    public function retrieveRandomizedTerms($departments, $number, $lang);
}
