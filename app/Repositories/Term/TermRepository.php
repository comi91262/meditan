<?php

namespace App\Repositories\Term;

use App\Models\Term;

class TermRepository implements TermRepositoryInterface
{
    protected $term;

    /**
    * @param object $question
    */
    public function __construct(Term $term)
    {
        $this->term = $term;
    }

    public function retrieveRandomizedTerms($number, $department)
    {
        return $this->term->where('department', $department)->inRandomOrder()->take($number)->get();
    }
}
