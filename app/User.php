<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use OAuthProvider;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract
{

    use Authenticatable, Authorizable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /*
     * This method is for validate user token
     *
     * */
    public static function checkToken($token){
       $token_count =  DB::table('users')->where('token',$token)->count();
        if($token_count==0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function generateToken($email,$password){
        $userdata  = DB::table('users')->select('EMAIL','CREATED_AT')
            ->where('email',$email)
            ->where('password',$password)
            ->get();
        $userdata =json_decode(json_encode($userdata),true);

        $token_string = $userdata[0]['EMAIL'].preg_replace('/\s+/', '',  $userdata[0]['CREATED_AT']);
        $token_string = md5($token_string);
        return $token_string;

    }
}
