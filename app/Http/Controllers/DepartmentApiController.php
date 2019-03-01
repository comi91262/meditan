<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\Term\TermServiceInterface;

class DepartmentApiController extends Controller
{
    protected $termService;

    /**
    * @param object $question
    */
    public function __construct(
        TermServiceInterface $termService
    ) {
        $this->termService =  $termService;
    }

    /**
    *     
    */
    public function index()
    {
        $departments = $this->termService->retrieveDepartments();
        return ['departments' => $departments];
    }

}

