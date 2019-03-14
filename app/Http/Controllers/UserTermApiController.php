<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\UserTerm\UserTermServiceInterface;

class UserTermApiController extends Controller
{
    protected $userTermService;

    /**
     * Constructor
     * @param UserTermServiceInterface $userTermService
     */
    public function __construct(
        UserTermServiceInterface $userTermService
    ) {
        $this->userTermService =  $userTermService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        return ['terms' => $this->userTermService->retrieveAllUserTerms($userId)];
    }

    /**
     * TODO ユーザーライクにjapaneseTermは日本語のみ englishTerm は英語のみの登録にするか
     */
    public function create(Request $request, $userId)
    {
        try {
            // 空白チェック
            $validInput = $this->validateInput($request->all());
        } catch (\Exception $exception) {
            return ['result' => null, 'message' => '空白を埋めてください'];
        }

        if ($userId === $request->user()) {
            return ['result' => null, 'message' => '予期しないエラーです'];
        }

        $result = $this->userTermService->createUserTermSet(
            $userId,
            $validInput['japaneseTerm'],
            $validInput['englishTerm'],
            $validInput['department']
        );

        return $result; // ['result' => term, 'message' => ''];
    }

    /**
     *
     */
    public function validateInput($requestInput)
    {
        return Validator::make(
            $requestInput,
            [
                'japaneseTerm' => 'required',
                'englishTerm' => 'required',
                'department' => 'required',
            ],
            [
                'required' => ':attribute が必要です.',
            ]
        )->validate();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $userId)
    {
        $japaneseTerm = $request->input('japaneseTerm');
        $englishTerm = $request->input('englishTerm');
        $department = $request->input('department');

        $this->userTermService->updateUserTerm($id, $userId, $japaneseTerm, $englishTerm, $department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $userId)
    {
        $this->userTermService->deleteUserTerm($id, $userId);
    }
}
