<?php

namespace App\Services\Term;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Repositories\Term\TermRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Repositories\Department\DepartmentRepositoryInterface;

// use App\Repositories\Term\TermRepositoryInterface;

class TermService implements TermServiceInterface
{
    protected $questionRepository;
    protected $termRepository;
    protected $departmentRepository;

    /**
    * @param object $question
    */
    public function __construct(
        QuestionRepositoryInterface $questionRepository,
        TermRepositoryInterface $termRepository,
        DepartmentRepositoryInterface $departmentRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->termRepository = $termRepository;
        $this->departmentRepository = $departmentRepository;
    }

    public function retrieveAllTerms()
    {
        return DB::table('japanese_terms')
            ->join('terms', 'japanese_terms.id', '=', 'terms.japanese_term_id')
            ->join('english_terms', 'english_terms.id', '=', 'terms.english_term_id')
            ->select(
                'japanese_terms.term as japaneseTerm',
                'japanese_terms.department',
                'english_terms.term as englishTerm'
            )
            ->get();
    }

    /**
     * 科に紐づく、単語を検索する
     *
     * @param  string|int $id ID
     * @return array
     */
    public function retrieveTermsByDepartment($id)
    {
        return DB::table('japanese_terms')
            ->join('terms', 'japanese_terms.id', '=', 'terms.japanese_term_id')
            ->join('english_terms', 'english_terms.id', '=', 'terms.english_term_id')
            ->select(
                'japanese_terms.term as japaneseTerm',
                'english_terms.term as englishTerm'
            )
            ->where('japanese_terms.department', $id)
            ->get();

    }

    public function retrieveDepartments()
    {
        return DB::table('departments')->get();
    }

    /**
     * 問題に対する解答を検索する
     *
     * @param string $term
     * @param int $lang
     * @return string[] 
     */
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
                ->pluck('term')
                ->toArray();
        } elseif ($lang === Config::get('constants.language.english')) {
            $terms = $queryBuilder
                ->where('english_terms.term', $term)
                ->select('japanese_terms.term')
                ->pluck('term')
                ->toArray();
        }

        return $terms;
    }
}
