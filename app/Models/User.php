<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;
use App\Mail\OtpMail;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
      return  $this->belongsTo(Role::class);
    }

    public static function generateOtp(Request $request){
        $otp=random_int(11111,99999);
        $userQurwy=User::query()->where('email',$request->email)->first();
        if($userQurwy->exists){
            $user=$userQurwy;
            $user->update([
                'password'=>bcrypt($otp),
            ]);
        }else{
            $user=User::query()->create([
                'email'=>$request->get('email'),
                'password'=>bcrypt($otp),
                'role_id'=> Role::findByTitle('normal-user')->id,
            ]);
        }


        //send otp by email to user
        Mail::to($user->email)->send(new OtpMail($otp));

        return $user;
    }
}
