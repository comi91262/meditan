<?php

namespace App\Services\UserTerm;

interface UserTermServiceInterface
{
    public function createUserTermSet($japaneseTerm, $englishTerm, $department);
}
