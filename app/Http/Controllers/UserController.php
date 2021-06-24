<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    
    function register(Request $req){
        $user=new User;
        $user->name=$req->input("name");
        $user->email=$req->input("email");
        $user->password=Hash::make($req->input("password"));
        $user->save();

        // this will also work,as we are extracting values from Json fields
        // $user=new User;
        // $user->name=$req->name;
        // $user->email=$req->email;
        // $user->password=Hash::make($req->password);
        // $user->save();

        // return   $req;  OR  return   $req->input(); both will give same result
        
        return   $user;
    }

    function login(Request $req){
        //  $user=User::where('email',$req->email)->first(); will  give direct json object of requested data 
        // $user=User::where('email',$req->email)->get(); will return array of requested data

        $user=User::where('email',$req->email)->first();
        // !$user means if $user is not available
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return response([
                'error'=>["user name or password incorrect"]
            ]);
        }
        return $user;

    }
}
