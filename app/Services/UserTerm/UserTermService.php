<?php

namespace App\Services\UserTerm;

use Illuminate\Support\Facades\DB;
use App\Services\Term\TermServiceInterface;
use App\Services\UserTerm\UserTermServiceInterface;
use App\Repositories\Department\DepartmentRepository;
use App\Repositories\UserTerm\UserTermRepositoryInterface;

class UserTermService implements UserTermServiceInterface
{
    private $userTermRepository;
    private $termService;
    private $departmentRepository;

    /**
     * Constructor
     */
    public function __construct(
        UserTermRepositoryInterface $userTermRepository,
        TermServiceInterface $termService,
        DepartmentRepository $departmentRepository
    ) {
        $this->userTermRepository = $userTermRepository;
        $this->termService = $termService;
        $this->departmentRepository = $departmentRepository;
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
        if ($this->termService->checkDuplication($japaneseTerm)) {
            return ['result' => null, 'message' => 'その日本語は登録済みです'];
        }

        if ($this->termService->checkDuplication($englishTerm)) {
            return ['result' => null, 'message' => 'その英語は登録済みです'];
        }

        try {
            $term = $this->userTermRepository->saveUserTerm(
                $userId,
                $japaneseTerm,
                $englishTerm,
                $department
            );
            $department = $this->departmentRepository->retrieveDepartment($term->department);
            $term->department = $department->name;

            return ['result' => $term, 'message' => ''];
        } catch (\Exception $exception) {
            // TOOD ログはき
            if ($exception->errorInfo[1] === 1062) {
                return ['result' => null, 'message' => '同じカテゴリに同じ日本語、あるいは英語を登録することはできません'];
            } else {
                return ['result' => null, 'message' => '予期しないエラーが起きました。もう一度試してみてください'];
            }
        }
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

    /**
     * 単語を削除する
     *
     * @param string $id
     * @param string $userId
     * @return void
     */
    public function deleteUserTerm($id, $userId)
    {
        DB::table('user_terms')
            ->where(['id' => $id, 'user' => $userId])
            ->delete()
        ;
    }
}

