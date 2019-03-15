<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
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
    public function index(Request $request)
    {
        return ['terms' => $this->userTermService->retrieveAllUserTerms($request->user()->id)];
    }

    /**
     * TODO ユーザーライクにjapaneseTermは日本語のみ englishTerm は英語のみの登録にするか
     */
    public function create(Request $request)
    {
        try {
            // 空白チェック
            $validInput = $this->validateInput($request->all());
        } catch (ValidationException $exception) {
            $displayedMessage = '';
            foreach ($exception->validator->getMessageBag()->all() as $message) {
                $displayedMessage = $message;
            }
            return ['result' => null, 'message' => $displayedMessage];
        }

        $result = $this->userTermService->createUserTermSet(
            $request->user()->id,
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
                'japaneseTerm.required' => '日本語を入力してください',
                'englishTerm.required' => '英語を入力してください',
                'department.required' => 'カテゴリを入力してください',
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
    public function update(Request $request, $id)
    {
        $japaneseTerm = $request->input('japaneseTerm');
        $englishTerm = $request->input('englishTerm');
        $department = $request->input('department');

        $this->userTermService->updateUserTerm($id, $request->user()->id, $japaneseTerm, $englishTerm, $department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->userTermService->deleteUserTerm($id, $request->user()->id);
    }
}
