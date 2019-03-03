<?php

namespace App\Services\Term;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
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

    public function retrieveDepartments()
    {
        $departments = DB::table('japanese_terms')->pluck('department');
        return array_unique($departments->toArray());
    }

    public function retrieveCorrectAnswers($term, $lang)
    {
        $queryBuilder = DB::table('japanese_terms')
            ->join('terms', 'japanese_terms.id', '=', 'terms.japanese_term_id')
            ->join('english_terms', 'english_terms.id', '=', 'terms.english_term_id')
            ->select('japanese_terms.term', 'english_terms.term');

        if ($lang === Config::get('constants.language.japanese')) {
            $terms = $queryBuilder
                ->where('japanese_terms.term', $term)
                ->select('english_terms.term')
                ->get();
        } elseif ($lang === Config::get('constants.language.english')) {
            $terms = $queryBuilder
                ->where('english_terms.term', $term)
                ->select('japanese_terms.term')
                ->get();
        }

        $result = [];
        foreach ($terms as $term) {
            $result[] = $term->term;
        }

        return $result;
    }
}
