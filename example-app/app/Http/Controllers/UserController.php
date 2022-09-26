<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;
use App\User;

class UserController extends Controller
{
    //

    public function index(){
        return view('users.index');
    }
    public function insertRecord()
    {
        $phone = new Phone();
        $phone->phone = "1234567890";
        $user = new User();
        $user->name = "Jennifer";
        $user->email = "jennifer@gmail.com";
        $user->password=encrypt('secret');
        $user->save();

        $user->phone()->save($phone);
        return "Record has been created successfully!";
    }

    public function fethPhoneByUser(){
        $phone = User::find(2)->phone;
        return $phone;
    }
}
