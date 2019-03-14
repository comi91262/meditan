<?php

namespace App\Repositories\UserTerm;

use App\Models\UserTerm;

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
