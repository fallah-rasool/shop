<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view('client.register.create');
    }

    public function sendmail(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|unique:users,email',
        ]);
        $otp=random_int(11111,99999);
      $user=User::query()->create([
            'email'=>$request->get('email'),
            'password'=>bcrypt($otp),
            'role_id'=> Role::findByTitle('normal-user')->id,
        ]);
        //send otp by email to user
        Mail::to($user->email)->send(new OtpMail($otp));

        return redirect(route('register.otp',$user));
    }


    public function Otp(User $user )
    {
        return view('client.register.verifyOtp',[
            'user'=>$user,
        ]);
    }
    public function verifyOtp(Request $request,User $user)
    {
        $this->validate($request,[
            'otp' => 'required|max:5|min:5|lte:99999|gte:11111'
        ]);

        if (!Hash::check($request->get('otp'),$user->password)) {
            return back()->withErrors(['otp' => 'کد وارد شده صحیح نیست!!']);
        }

        auth()->login($user);
        return redirect(route('index.page'));
    }



}
