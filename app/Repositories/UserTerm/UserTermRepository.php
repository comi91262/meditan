<?php

namespace App\Repositories\UserTerm;

use App\Models\UserTerm;
use Illuminate\Support\Facades\Config;

class UserTermRepository implements UserTermRepositoryInterface
{
    protected $userTerm;

    /**
     * Constructor
     *
     * @param UserTerm $userTerm
     */
    public function __construct(UserTerm $userTerm)
    {
        $this->userTerm = $userTerm;
    }

    public function retrieveRandomizedTerms($departments, $number, $lang)
    {
        echo var_export($departments, true);
        $userTerms = $this->userTerm->whereIn('department', $departments)
            ->inRandomOrder()
            ->take($number)
            ->get();

        $result = [];
        switch ($lang) {
            case Config::get('constants.language.japanese'):
                foreach ($userTerms as $userTerm) {
                    $result[] = $userTerm->term_jp;
                }
                return $result;
            case Config::get('constants.language.english'):
                foreach ($userTerms as $userTerm) {
                    $result[] = $userTerm->term_en;
                }
                return $result;
            default:
                return [];
        }

    }

    public function saveUserTerm($userId, $japaneseTerm, $englishTerm, $department): UserTerm
    {
        // IDが欲しいため、モデルからインサートする。
        $this->userTerm->user = $userId;
        $this->userTerm->term_jp = $japaneseTerm;
        $this->userTerm->term_en = $englishTerm;
        $this->userTerm->department = $department;
        $this->userTerm->save();

        return $this->userTerm;
    }


}
