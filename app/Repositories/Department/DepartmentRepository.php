<?php

namespace App\Repositories\Department;

use App\Models\Department;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    protected $department;

    /**
     *  Construct
     *
     * @param Department $department Model
     */
    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    /**
     *  全てのdepartment エンティティを返す
     *
     * @return Department[]
     */
    public function retrieveAllDepartments()
    {
        return $this->department->get();
    }

    /**
     *  department エンティティを返す
     *
     * @param int $id  department.id
     * @return Department
     */
    public function retrieveDepartment($id)
    {
        return $this->department->find($id);
    }
}
