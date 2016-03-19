<?php
/**
 * Created by PhpStorm.
 * User: IshanFx
 * Date: 3/19/2016
 * Time: 5:08 PM
 */

namespace App\Http\Controllers;


use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class UserController
{


    public function tokencheck(Request $request){
        $username = $request->username;
        $password = $request->password;
        $password = md5($password);

        if($this->checkUserAvailability($username,$password)){
            $usertoken = DB::table('users')->select('token')->where('email',$username)
                ->where('password',$password)
                ->get();
            $usertoken = json_decode(json_encode($usertoken),true);
            return response()->json(['token'=>$usertoken[0]['token']]);
        }
        else{
            return response()->json(['message'=>'User Not found']);
        }
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),
            [
                'username' => 'required',
                'password' => 'required',
                'firstname' => 'required',
                'lastname' => 'required'
            ]
        );
        if ($validator->fails()) {
            return json_encode(
                [
                    "Message"=>"Fill All required Parameters"
                ]
            );
        }
        else{
            $useremail = $request->username;
            $password = $request->password;
            $firstname = $request->firstname;
            $lastname = $request->lastname;
            $password = md5($password);

            if($this->checkUserAvailability($useremail,$password)){
                $usertoken = DB::table('users')->select('token')->where('email',$useremail)
                    ->where('password',$password)
                    ->get();
                $usertoken = json_decode(json_encode($usertoken),true);
                return response()->json(['token'=>$usertoken[0]['token']]);
            }
            else
            {
                DB::table('users')->insert(
                    [
                        'email' => $useremail,
                        'firstname' => $firstname,
                        'lastname'=>$lastname,
                        'password'=>$password,
                        'CREATED_AT'=>Carbon::now(),
                        'UPDATED_AT'=>Carbon::now()
                    ]
                );

                $token = User::generateToken($useremail,$password);

                DB::table('users')
                    ->where('email', $useremail)
                    ->where('password',$password)
                    ->update(['token' => $token]);

                return response()->json(['token'=>$token]);
            }


        }

    }
    public function checkUserAvailability($username,$password){
        $userstatus = DB::table('users')->where('email',$username)
            ->where('password',$password)->count();
        if($userstatus==1){
            return true;
        }
        else{
            return false;
        }
    }
}