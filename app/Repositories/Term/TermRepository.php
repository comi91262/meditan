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

    public function retrieveRandomizedTerms($number, $genre)
    {
        return $this->term->where('category', $genre)->inRandomOrder()->take($number)->get();
    }
}
