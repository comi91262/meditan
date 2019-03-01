<?php

namespace App\Services\UserTerm;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\UserTerm\UserTermServiceInterface;

// use App\Repositories\Term\TermRepositoryInterface;

class UserTermService implements UserTermServiceInterface
{

    /**
     * Constructor
     */
    public function __construct()
    {
    }

    public function createUserTermSet($japaneseTerm, $englishTerm, $department)
    {
        DB::table('user_terms')->insert(
            [
                'user' => Auth::id(),
                'term_jp' => $japaneseTerm,
                'term_en' => $englishTerm,
                'department' => $department,
            ]
        );
    }
}

