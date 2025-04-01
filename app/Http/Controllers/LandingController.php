<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback; // Ensure Feedback model is imported

class LandingController extends Controller
{
    public function index(){
        $feedbacks = Feedback::latest()->take(6)->get(); // You can limit if you want
    
        return view('landingpage.index', compact('feedbacks'));
    }
    public function jobs(){
        return view('landingpage.jobs');
    }
    public function about(){
        return view('landingpage.about');
    }

    public function contacts(){
        return view('landingpage.contacts');
    }
}
