<?php

namespace App\Http\Controllers;

use App\Repositories\Department\DepartmentRepositoryInterface;

class DepartmentApiController extends Controller
{
    protected $departmentRepository;

    /**
     * @param object $question
     */
    public function __construct(
        DepartmentRepositoryInterface $departmentRepository
    ) {
        $this->departmentRepository =  $departmentRepository;
    }

    /**
     *
     */
    public function index()
    {
        $departments = $this->departmentRepository->retrieveAllDepartments();
        return ['departments' => $departments];
    }

    /**
     *
     */
    public function show()
    {
        $departments = $this->departmentRepository->retrieveDepartment();
        return ['departments' => $departments];
    }

}

