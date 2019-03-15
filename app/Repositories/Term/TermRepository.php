<?php

namespace App\Repositories\Term;

use App\Models\Term\English;
use App\Models\Term\Japanese;
use Illuminate\Support\Facades\Config;

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
     * @param string[] $departments 科（複数）
     * @param int $number (数)
     * @param int|string $lang (言語)
     */
    public function retrieveRandomizedTerms($departments, $number, $lang)
    {
        switch ($lang) {
            case Config::get('constants.language.japanese'):
                return $this->japaneseTerm->whereIn('department', $departments)
                    ->inRandomOrder()
                    ->take($number)
                    ->pluck('term')
                    ->toArray();
            case Config::get('constants.language.english'):
                return $this->englishTerm->whereIn('department', $departments)
                    ->inRandomOrder()
                    ->take($number)
                    ->pluck('term')
                    ->toArray();
            default:
                return [];
        }
    }
}
