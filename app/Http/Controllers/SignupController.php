<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\VerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use Carbon\Carbon;

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
            'password' => 'required|min:8|confirmed',
        ]);

        $applicant = Applicant::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $this->generateAndSendVerificationCode($applicant->email);

        return redirect()->route('signup.verification', ['email' => $applicant->email]);
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $exists = Applicant::where('email', $email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function showVerificationForm(Request $request)
    {
        if (!$request->email) {
            return redirect()->route('signup.index');
        }

        return view('signup.verification', ['email' => $request->email]);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);

        $verification = VerificationCode::where('email', $request->email)
            ->where('code', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if (!$verification) {
            return back()->withErrors(['otp' => 'Invalid or expired verification code']);
        }

        $applicant = Applicant::where('email', $request->email)->firstOrFail();
        $applicant->email_verified_at = now();
        $applicant->save();
        $verification->delete();

        return redirect()->route('dashboard')->with('success', 'Email verified successfully!');
    }

    public function resend(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        
        $this->generateAndSendVerificationCode($request->email);
        
        return back()->with('success', 'A new verification code has been sent to your email.');
    }

    private function generateAndSendVerificationCode($email)
    {
        VerificationCode::where('email', $email)->delete();

        $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        VerificationCode::create([
            'email' => $email,
            'code' => $code,
            'expires_at' => Carbon::now()->addMinutes(15),
        ]);

        Mail::to($email)->send(new VerificationEmail($code));

        return $code;
    }
}