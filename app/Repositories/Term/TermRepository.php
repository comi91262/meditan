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

    public function retrieveRandmizedTerms($number)
    {
        return $this->term->inRandomOrder()->take($number)->get();
    }
}
