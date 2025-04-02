<?php
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

        // Verify the reCAPTCHA response
        $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));
        $resp = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

        if (!$resp->isSuccess()) {
            return redirect()->route('signin.index')
                ->with('error', 'reCAPTCHA verification failed. Please try again.')
                ->withInput($request->except('password'));
        }

        // Attempt to authenticate using Laravel's Auth system
        if (Auth::guard('applicant')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $applicant = Auth::guard('applicant')->user();
            
            // Check if email is verified
            if (!$applicant->is_verified) {
                Auth::guard('applicant')->logout();
                return redirect()->route('signin.index')
                    ->with('error', 'Please verify your email address first.')
                    ->withInput($request->except('password'));
            }

            // Store user data in session (if still needed)
            Session::put('applicant', $applicant);
            
            return redirect()->intended(route('userdash.index'))
                ->with('success', 'You have successfully logged in!');
        }

        // If authentication fails
        return redirect()->route('signin.index')
            ->with('error', 'Invalid email or password!')
            ->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        Auth::guard('applicant')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('signin.index')
            ->with('success', 'You have been logged out successfully.');
    }
}