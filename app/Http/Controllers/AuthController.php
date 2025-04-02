<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('custom-auth.login');
    }
    public function signup(){
        return view('custom-auth.signup  ');
    }
}
