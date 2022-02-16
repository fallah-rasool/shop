<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        return view('admin.users.index',[
            'users'=>User::query()->paginate(),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',[
            'user'=>$user,
            'roles'=>Role::all(),
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {

        $isEmailUnique=User::query()
            ->where('email',$request->get('email'))
            ->where('id','!=',$request->get('id'))
            ->exists();
        if($isEmailUnique){
             return back()->withErrors('ایمیل تکراری است ');
        }
        $user->update([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'role_id'=>$request->get('role_id'),
        ]);
        return redirect(route('user.create'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
