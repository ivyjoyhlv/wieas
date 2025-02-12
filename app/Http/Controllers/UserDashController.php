<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashController extends Controller
{
    public function index(){
        return view('userdash.index');
    }
    public function settings(){
        return view('userdash.settings');
    }
}

