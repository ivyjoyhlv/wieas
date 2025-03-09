<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function index(){
        return view('admindash.index');
    }

    public function joblist(){
        return view('admindash.joblist');
    }
    public function analythics(){
        return view('admindash.analythics');
    }
    public function conference(){
        return view('admindash.conference');
    }
    public function applicants(){
        return view('admindash.applicants');
    }
}
