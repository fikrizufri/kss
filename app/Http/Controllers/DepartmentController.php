<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    use CrudTrait;

    public function __construct()
    {
        $this->route = 'department';
        $this->title = "Department";
        $this->plural = 'true';
        $this->sort = 'name';

        $this->middleware('permission:view-' . $this->route, ['only' => ['index', 'show']]);
        $this->middleware('permission:create-' . $this->route, ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-' . $this->route, ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-' . $this->route, ['only' => ['delete']]);
    }


    public function configHeaders()
    {
        return [
            [
                'name'    => 'name',
            ],
        ];
    }
    public function configSearch()
    {
        return [
            [
                'name'    => 'name',
                'alias'    => 'Name',
            ],
        ];
    }
    public function configForm()
    {
        return [

            [
                'name'    => 'name',
                'alias'    => 'Department Name',
                'validasi'    => ['required'],
            ],

        ];
    }

    public function model()
    {
        return new Department();
    }
}
