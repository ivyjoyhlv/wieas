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
    public function jobopenings(){
        return view('userdash.jobopenings');
    }
    public function jobdesc(){
        return view('userdash.jobdesc');
    }
    public function conference(){
        return view('userdash.conference');
    }
}

