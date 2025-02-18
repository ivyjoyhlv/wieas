<?php
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('signin.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $applicant = Applicant::where('email', $request->email)->first();

        if ($applicant && Hash::check($request->password, $applicant->password)) {
            // Store user data in session
            Session::put('applicant', $applicant);
            return redirect()->route('userdash.index');
        } else {
            return redirect()->route('signin.index')->with('error', 'Invalid credentials');
        }
    }
}

