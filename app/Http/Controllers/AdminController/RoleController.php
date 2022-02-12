<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        return view('admin.roles.index',[
            'roles'=>Role::all(),
            'permissions'=>Permission::all(),
        ]);
    }

    public function store(Request $request)
    {
        $role=Role::query()->create([
            'title'=>$request->get('title'),
        ]);
        $role->permissions()->attach($request->get('permissions'));
        return redirect(route('role.create'));
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        //
    }


    public function update(Request $request, Role $role)
    {
        //
    }


    public function destroy(Role $role)
    {
        //
    }
}
