<?php

namespace App\Services\UserTerm;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\UserTerm\UserTermServiceInterface;

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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}

