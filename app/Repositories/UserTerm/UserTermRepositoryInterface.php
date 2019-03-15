<?php

namespace App\Repositories\UserTerm;

use App\Models\UserTerm;

interface UserTermRepositoryInterface
{
    public function retrieveRandomizedTerms($departments, $number, $lang);
    public function saveUserTerm($userId, $japaneseTerm, $englishTerm, $department): UserTerm;
}
