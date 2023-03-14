<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    

    public function login(Request $request)
 { 
    $user= User::where(['email'=>$request->email])->first();
    if(!$user || !Hash::check($request->password, $user->password))
    {    
        return view('login')->with('error', 'Username or password is not matched');
    }
    else{
        $request->session()->put('user',$user);
        return redirect('/');
    }
 }
}
