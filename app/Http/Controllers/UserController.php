<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //

    public function register()
    {
        return view('register');
    }

    public function register_store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        $user=new User();
        $user->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return redirect('/')->with('message','new user has been created');
    }

    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
}
