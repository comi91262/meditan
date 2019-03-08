<?php

namespace App\Services\UserTerm;

use App\Models\UserTerm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Services\UserTerm\UserTermServiceInterface;

class UserTermService implements UserTermServiceInterface
{

    /**
     * Constructor
     */
    public function __construct()
    {
    }

    public function retrieveAllUserTerms($userId)
    {
        return DB::table('user_terms')
            ->join('departments', 'user_terms.department', '=', 'departments.id')
            ->select(
                'user_terms.id',
                'term_jp',
                'term_en',
                'departments.name as department'
            )
            ->where('user_terms.user', $userId)
            ->latest()
            ->get();
    }

    public function createUserTermSet($userId, $japaneseTerm, $englishTerm, $department)
    {
        // 例外をキャッチして、ログをはかして、例外を投げる
        // IDが欲しいため、モデルからインサートする。
        $term = new UserTerm();
        $term->user = $userId;
        $term->term_jp = $japaneseTerm;
        $term->term_en = $englishTerm;
        $term->department = $department;
        $term->save();

        return $term;
    }

    /**
     *  とりあえず使わない 
     */
    public function updateUserTerm($id, $userId, $japaneseTerm, $englishTerm, $department)
    {
        DB::table('user_terms')->where('user', $userId)->update(
            [
                'term_jp' => $japaneseTerm,
                'term_en' => $englishTerm,
                'department' => $department,
            ]
        );
    }

    public function deleteUserTerm($id, $userId)
    {
        DB::table('user_terms')->where('user', $userId)->delete();
    }
}

