<?php

namespace App\Repositories\Term;

use App\Models\Term\English;
use App\Models\Term\Japanese;

class TermRepository implements TermRepositoryInterface
{
    protected $japaneseTerm;
    protected $englishTerm;

    /**
     * Constructor
     * 
     * @param Japanese $japaneseTerm
     * @param English $englishTerm
     */
    public function __construct(Japanese $japaneseTerm, English $englishTerm)
    {
        $this->japaneseTerm = $japaneseTerm;
        $this->englishTerm = $englishTerm;
    }

    /**
     *
     * @param [type] $departments
     * @param [type] $number
     * @param [type] $lang
     * @return void
     */
    public function retrieveRandomizedTerms($departments, $number,$lang)
    {
        switch ($lang) {
            case 'jp':
                return $this->japaneseTerm->whereIn('department', $departments)
                    ->inRandomOrder()
                    ->take($number)
                    ->get();
            case 'en':
                return $this->englishTerm->whereIn('department', $departments)
                    ->inRandomOrder()
                    ->take($number)
                    ->get();
            default:
                // TODO 例外
                break;
        }
    }
}
