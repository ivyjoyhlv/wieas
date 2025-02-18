<?php
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $applicant = new Applicant();
        $applicant->first_name = $request->first_name;
        $applicant->last_name = $request->last_name;
        $applicant->email = $request->email;
        $applicant->password = Hash::make($request->password);
        $applicant->save();

        return redirect()->route('signin.index')->with('success', 'Account created successfully! Please log in.');
    }
}
