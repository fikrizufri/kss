<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;

class JobController extends Controller
{
    use CrudTrait;

    public function __construct()
    {
        $this->route = 'job';
        $this->title = "Job";
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
            [
                'name'    => 'department',
                'alias'    => 'Nama Department',
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
                'alias'    => 'Job Name',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'departments_id',
                'input'    => 'combo',
                'alias'    => 'Department',
                'value' => $this->combobox('Department', null, null, null, 'name'),
                'validasi'    => ['required'],
            ],
        ];
    }

    public function model()
    {
        return new Job();
    }
}
