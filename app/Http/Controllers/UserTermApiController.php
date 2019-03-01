<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\UserTerm\UserTermServiceInterface;

class UserTermApiController extends Controller
{
    protected $userTermService;

    /**
     * Constructor
     * 
     * @param UserTermServiceInterface $userTermService
     */
    public function __construct(
        UserTermServiceInterface $userTermService
    ) {
        $this->userTermService =  $userTermService;
    }

    /**
     * 
     */
    public function create(Request $request)
    {
        $validInput = $this->validateInput($request->all());

        $japaneseTerm = $request->input('japaneseTerm');
        $englishTerm = $request->input('englishTerm');
        $department = $request->input('department');

        $this->userTermService->createUserTermSet(
            $japaneseTerm,
            $englishTerm,
            $department
        );

        return [];
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
}


