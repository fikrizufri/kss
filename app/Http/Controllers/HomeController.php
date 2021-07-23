<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Auth;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title =  "Dashboard";

        $department = Department::count();
        $position = Position::count();
        $employee = Employee::count();
        return view('home.index', compact(
            'title',
            'department',
            'employee',
            'position'
        ));
    }
}
