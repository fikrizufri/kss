<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    use CrudTrait;

    public function __construct()
    {
        $this->route = 'position';
        $this->title = "Position";
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
                'alias'    => 'Department',
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
            [
                'name'    => 'department_id',
                'alias'    => 'Department',
                'input'    => 'combo',
                'value' => $this->combobox('Department', null, null, null, 'name'),
            ],
        ];
    }
    public function configForm()
    {
        return [

            [
                'name'    => 'name',
                'alias'    => 'Position Name',
                'validasi'    => ['required', 'unique'],
            ],
            [
                'name'    => 'department_id',
                'input'    => 'combo',
                'alias'    => 'Department',
                'value' => $this->combobox('Department', null, null, null, 'name'),
                'validasi'    => ['required'],
            ],
        ];
    }

    public function model()
    {
        return new position();
    }
}
