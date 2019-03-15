<?php

namespace App\Services\Term;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Repositories\Term\TermRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Repositories\UserTerm\UserTermRepositoryInterface;
use App\Repositories\Department\DepartmentRepositoryInterface;

class TermService implements TermServiceInterface
{
    protected $questionRepository;
    protected $termRepository;
    protected $departmentRepository;
    protected $userTermRepository;

    /**
    * @param object $question
    */
    public function __construct(
        QuestionRepositoryInterface $questionRepository,
        TermRepositoryInterface $termRepository,
        DepartmentRepositoryInterface $departmentRepository,
        UserTermRepositoryInterface $userTermRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->termRepository = $termRepository;
        $this->departmentRepository = $departmentRepository;
        $this->userTermRepository = $userTermRepository;
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

    public function retrieveRandomizedTerms($departments, $number, $lang)
    {
        $terms = $this->termRepository->retrieveRandomizedTerms($departments, $number, $lang);
        $userTerms  = $this->userTermRepository->retrieveRandomizedTerms($departments, $number, $lang);

        $terms = array_merge($terms, $userTerms);
        shuffle($terms);
        return array_slice($terms, 0, $number);
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

    // 登録する単語すでに登録されているかを調べる
    public function checkDuplication($term) : bool
    {
        if (strlen($term) !== mb_strlen($term)) {  // 日本語
            return DB::table('japanese_terms')
                ->select('term')
                ->where('term', $term)
                ->count() > 0;
        } else {
            return DB::table('english_terms')
                ->select('term')
                ->where('term', $term)
                ->count() > 0;
        }
    }

    /**
     * 問題に対する解答を検索する
     *
     * @param string $term
     * @param int $lang
     * @return string[]
     */
    public function retrieveCorrectAnswers($term, $lang): array
    {
        $queryBuilder = DB::table('japanese_terms')
            ->join('terms', 'japanese_terms.id', '=', 'terms.japanese_term_id')
            ->join('english_terms', 'english_terms.id', '=', 'terms.english_term_id')
            ->select('japanese_terms.term', 'english_terms.term');

        switch ($lang) {
            case Config::get('constants.language.japanese'):
                return $queryBuilder
                    ->where('japanese_terms.term', $term)
                    ->select('english_terms.term')
                    ->pluck('term')
                    ->toArray();
            case Config::get('constants.language.english'):
                return $queryBuilder
                    ->where('english_terms.term', $term)
                    ->select('japanese_terms.term')
                    ->pluck('term')
                    ->toArray();
            default:
                return [];
        }
    }
}
