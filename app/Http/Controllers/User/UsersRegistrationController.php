<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UsersRegistrationController extends Controller
{
    //
    public function user_registration(Request $data)
    {
		$email=$data['email'];
		$mobile_number=$data['mobile_number'];
		$facility_id=$data['facility_id'];
        $check= User::where('email',$email)
            ->where('mobile_number',$mobile_number)
            ->where('facility_id',$facility_id)
            ->first();
        if(count($check)==1)
        {
            return  $email." "."Already Registered";
        }
        else{
             $user= User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile_number' => $data['mobile_number'],
                'facility_id' => $data['facility_id'],
                'proffesionals_id' => $data['proffesionals_id'],
                'gender' => $data['gender'],
                'password' => bcrypt($data['password']),
            ]);

            return $user->email. " Account Successful Created";
        }

    }
	
	public function alluser_registration(Request $data)
    {
		$email=$data['email'];
		$mobile_number=$data['mobile_number'];
		$facility_id=$data['facility_id'];
        $check= User::where('email',$email)
            ->where('mobile_number',$mobile_number)
            ->where('facility_id',$facility_id)
            ->first();
        if(count($check)==1)
        {
            return  $email." "."Already Registered";
        }
        else{
             $user= User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile_number' => $data['mobile_number'],
                'facility_id' => $data['facility_id'],
                'proffesionals_id' => $data['proffesionals_id'],
                'gender' => $data['gender'],
                'password' => bcrypt($data['password']),
            ]);

            return $user->email. " Account Successful Created";
        }

    }

    public function user_list()
    {
        return User::get();
    }


    public function user_delete($id)
    {

        return User::destroy($id);

    }

    public function user_update(Request $request)
    {
        $id=$request['id'];
        return User::where('id',$id)->update($request->all());
    }


    public function check_password(Request $request)
    {
      return $pass=bcrypt($request['password']);
       $user_id=$request['user_id'];
        $data=User::where('id',$user_id)
            ->where('password',$pass)
            ->get();
        return  count($data);
    }

    public function reset_password(Request $request)
    {
        $user_id=$request['user_id'];
       $password=bcrypt($request['password']) ;
        User::where('id',$user_id)->update(['password'=>$password]);
        return 'Password Changed Successful..';
    }
}
