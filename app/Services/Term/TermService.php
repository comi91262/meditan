<?php

namespace App\Services\Term;

use Illuminate\Support\Facades\DB;
use App\Services\Term\TermServiceInterface;
use App\Repositories\Term\TermRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;

// use App\Repositories\Term\TermRepositoryInterface;

class TermService implements TermServiceInterface
{
    protected $questionRepository;

    protected $termRepository;

    /**
    * @param object $question
    */
    public function __construct(
        QuestionRepositoryInterface $questionRepository,
        TermRepositoryInterface $termRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->termRepository = $termRepository;
    }

    public function retrieveAllTerms()
    {
        $hoge = DB::table('japanese_terms')
            ->join('terms', 'japanese_terms.id', '=', 'terms.japanese_term_id')
            ->join('english_terms', 'english_terms.id', '=', 'terms.english_term_id')
            ->select(
                'japanese_terms.term as japaneseTerm',
                'japanese_terms.department',
                'english_terms.term as englishTerm'
            )
            ->get();

        return $hoge;
    }

    public function retrieveCorrectAnswers($term, $lang)
    {
        $hoge = DB::table('japanese_terms')
            ->join('terms', 'japanese_terms.id', '=', 'terms.japanese_term_id')
            ->join('english_terms', 'english_terms.id', '=', 'terms.english_term_id')
            ->select('japanese_terms.term', 'english_terms.term')
            ->where(['japanese_terms.term' => $term])
            ->get();
    }
}
