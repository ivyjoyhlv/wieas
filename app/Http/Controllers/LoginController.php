<?php
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use ReCaptcha\ReCaptcha;

class LoginController extends Controller
{
    public function index()
    {
        return view('signin.index');
    }

    public function login(Request $request)
    {
        // Validate the form data, including reCAPTCHA response
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'g-recaptcha-response' => 'required', // Validate reCAPTCHA field
        ]);

        // Check if the reCAPTCHA field is missing
        if (empty($request->input('g-recaptcha-response'))) {
            return redirect()->route('signin.index')->with('error', 'Please complete the reCAPTCHA to proceed.');
        }

        // Verify the reCAPTCHA response
        $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY')); // Use the Secret Key from the .env file
        $resp = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

        if (!$resp->isSuccess()) {
            // If reCAPTCHA verification fails, redirect back with an error message
            return redirect()->route('signin.index')->with('error', 'reCAPTCHA verification failed. Please try again.');
        }

        // Continue with the normal login process if reCAPTCHA is valid
        $applicant = Applicant::where('email', $request->email)->first();

        if ($applicant && Hash::check($request->password, $applicant->password)) {
            // Store user data in session
            Session::put('applicant', $applicant);
            return redirect()->route('userdash.index')->with('success', 'You have successfully logged in!');
        } else {
            return redirect()->route('signin.index')->with('error', 'Invalid email or password!');
        }
    }
}
