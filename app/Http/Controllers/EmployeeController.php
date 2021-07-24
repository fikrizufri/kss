<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use CrudTrait;

    public function __construct()
    {
        $this->route = 'employee';
        $this->title = "Employee";
        $this->plural = 'true';
        $this->sort = 'name';
        $this->nameFile = 'employee';

        $this->middleware('permission:view-' . $this->route, ['only' => ['index', 'show']]);
        $this->middleware('permission:create-' . $this->route, ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-' . $this->route, ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-' . $this->route, ['only' => ['delete']]);
    }


    public function configHeaders()
    {
        return [
            [
                'name'    => 'nip',
                'alias'    => 'NIP',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'name',
            ],
            [
                'name'    => 'gender',
                'alias'    => 'Gender',
            ],
            [
                'name'    => 'birthdate',
                'alias'    => 'Birthdate',
                'input'    => 'date',
            ],
            [
                'name'    => 'address',
                'alias'    => 'Address',
                'input'    => 'textarea',
            ],
            [
                'name'    => 'phone',
                'alias'    => 'Phone',
            ],
            [
                'name'    => 'bank',
                'alias'    => 'Bank',
            ],
            [
                'name'    => 'account_bank',
                'alias'    => 'Account Bank',
            ],
            [
                'name'    => 'tax_id',
                'alias'    => 'TAX ID',
            ],
            [
                'name'    => 'joindate',
                'alias'    => 'Join Date',
            ],
            [
                'name'    => 'marital_status',
                'alias'    => 'Marital Status',
            ]
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
                'name'    => 'position_id',
                'alias'    => 'Position',
                'input'    => 'combo',
                'value' => $this->combobox('Position', null, null, null, 'name'),
            ],
        ];
    }
    public function configForm()
    {
        return [

            [
                'name'    => 'nip',
                'alias'    => 'NIP',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'name',
                'alias'    => 'Name',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'gender',
                'input'    => 'combo',
                'alias'    => 'Gender',
                'value' => [
                    [
                        'id'    => 'male',
                        'value'    => 'Male',
                    ],
                    [
                        'id'    => 'fimale',
                        'value'    => 'Fimale',
                    ],
                ],
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'birthdate',
                'alias'    => 'Birthdate',
                'input'    => 'date',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'address',
                'alias'    => 'Address',
                'input'    => 'textarea',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'phone',
                'alias'    => 'Phone',
                'validasi'    => ['required', 'unique'],
            ],
            [
                'name'    => 'bank',
                'alias'    => 'Bank',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'account_bank',
                'alias'    => 'Account Bank',
                'input'    => 'number',
                'validasi'    => ['required', 'max:14', 'unique'],
            ],
            [
                'name'    => 'tax_id',
                'alias'    => 'TAX ID',
                'validasi'    => ['required', 'max:14'],
            ],
            [
                'name'    => 'joindate',
                'alias'    => 'Join Date',
                'input'    => 'date',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'marital_status',
                'input'    => 'combo',
                'alias'    => 'Marital Status',
                'value' => [
                    [
                        'id'    => 'marriage',
                        'value'    => 'marriage',
                    ],
                    [
                        'id'    => 'single',
                        'value'    => 'single',
                    ],
                    [
                        'id'    => 'single-parent',
                        'value'    => 'single-parent',
                    ],
                ],
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'contract_type',
                'input'    => 'combo',
                'alias'    => 'Contract Type',
                'value' => [
                    [
                        'id'    => 'fulltime',
                        'value'    => 'fulltime',
                    ],
                    [
                        'id'    => 'parttime',
                        'value'    => 'parttime',
                    ]
                ],
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'contract_status',
                'input'    => 'combo',
                'alias'    => 'Contract Status',
                'value' => [
                    [
                        'id'    => 'active',
                        'value'    => 'active',
                    ],
                    [
                        'id'    => 'inactive',
                        'value'    => 'inactive',
                    ]
                ],
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'contract_start_date',
                'alias'    => 'Contract Start Date',
                'input'    => 'date',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'contract_end_date',
                'alias'    => 'Contract End Date',
                'input'    => 'date',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'place_of_emplloyement',
                'input'    => 'combo',
                'alias'    => 'Place of Emplloyement',
                'value' => [
                    [
                        'id'    => 'headoffice',
                        'value'    => 'headoffice',
                    ],
                    [
                        'id'    => 'branch',
                        'value'    => 'branch',
                    ]
                ],
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'employe_level',
                'input'    => 'combo',
                'alias'    => 'Employe Level',
                'value' => [
                    [
                        'id'    => 'junior',
                        'value'    => 'junior',
                    ],
                    [
                        'id'    => 'senior',
                        'value'    => 'senior',
                    ],
                    [
                        'id'    => 'staf',
                        'value'    => 'staf',
                    ],
                ],
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'employe_level',
                'input'    => 'combo',
                'alias'    => 'Employe Level',
                'value' => [
                    [
                        'id'    => 'junior',
                        'value'    => 'junior',
                    ],
                    [
                        'id'    => 'senior',
                        'value'    => 'senior',
                    ],
                    [
                        'id'    => 'staf',
                        'value'    => 'staf',
                    ],
                ],
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'position_id',
                'input'    => 'combo',
                'alias'    => 'Position',
                'value' => $this->combobox('Position', null, "name", null, null,  null,  null,  null,  null, null, "Department"),
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'photo',
                'alias'    => 'Photo',
                'validasi'    => ['required', 'mimes:jpeg,bmp,png,jpg'],
                'input'    => 'img',
            ],
        ];
    }

    public function model()
    {
        return new Employee();
    }
}
