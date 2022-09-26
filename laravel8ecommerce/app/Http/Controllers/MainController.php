<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class MainController extends Controller
{
    //
    public function index()
    {
        return view('NewLogin.login');
    }
    public function checklogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('/main/successlogin');
        }else{
            return back()->with('error', 'Wrong Login Details');
        }

    }

    public function successlogin()
    {
        return view('NewLogin.successlogin');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/main');
    }

    //SignUp
    public function signup()
    {
        return view('NewLogin.signup');
    }

    public function custom_registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|alphaNum|min:3'
        ]);

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'Admin',
        ]);

        return redirect('/main')->with('success', 'Registration Complete');
    }
    
}
