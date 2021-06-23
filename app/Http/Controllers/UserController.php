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
}
