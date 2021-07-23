<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-roles', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-roles', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-roles', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-roles', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title =  "Roles";
        $dataRole = Role::where('slug', '!=', 'superadmin')->paginate(5);
        $route = 'role';
        return view('role.index', compact(
            "title",
            "route",
            "dataRole"
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  "Create Roles";
        $action = route('role.store');
        $tasks = Task::all();
        return view('role.create', compact(
            "title",
            "tasks",
            "action"
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute can not be empty',
            'unique' => ":attribute can't be the same",
            'same' => 'Password and confirmation password must be the same',
        ];

        $this->validate(request(), [
            'name' => 'required|unique:roles',
        ], $messages);

        $role = new Role();
        $role->slug = Str::slug($request->name);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->attach($request->izin_akses);
        return redirect()->route('role.index')->with('message', 'Roles berhasil diCreate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $title =  "Edit Roles " . $role->nama;
        $action = route('role.update', $role->id);
        $tasks = Task::all();
        $izin = $role->permissions->pluck('name')->toArray();
        return view('role.edit', compact(
            'action',
            'tasks',
            'title',
            'izin',
            'role'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $messages = [
            'required' => ':attribute can not be empty',
            'unique' => ":attribute can't be the same",
            'same' => 'Password and confirmation password must be the same',
        ];

        $this->validate(request(), [
            'name' => 'required|unique:roles,name,' . $role->id,
        ], $messages);


        $role->slug = Str::slug($request->name);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->izin_akses);
        return redirect()->route('role.index')->with('message', 'Roles berhasil diEdit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $role->permissions()->detach();
        return redirect()->route('role.index')->with('message', 'Roles berhasil dihapus');
    }
}
