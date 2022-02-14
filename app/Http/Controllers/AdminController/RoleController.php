<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\RoleCreateRequest;
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
            'roles'=>Role::query()->paginate(),
            'permissions'=>Permission::all(),
        ]);
    }

    public function store(RoleCreateRequest $request)
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
       return view('admin.roles.edit',[
           'role'=>$role,
           'permissions'=>Permission::all(),
       ]);
    }


    public function update(RoleCreateRequest $request, Role $role)
    {


        $role->update([
            'title'=> $request->get('title'),
        ]);
        $role->permissions()->sync($request->get('permissions'));
        return back()->with('success','نقش ها با موفقیت به روز رسانی اضافه شد ');
    }


    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();
        return back();
    }
}
