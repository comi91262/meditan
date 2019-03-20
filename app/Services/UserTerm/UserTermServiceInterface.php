<?php

namespace App\Services\UserTerm;

interface UserTermServiceInterface
{
    public function retrieveAllUserTerms($userId);
    public function createUserTermSet($userId, $japaneseTerm, $englishTerm, $department);
    public function updateUserTerm($id, $userId, $japaneseTerm, $englishTerm, $department);
    public function deleteUserTerm($id, $userId);
    public function retrieveCorrectAnswers($term, $lang): array;
}
