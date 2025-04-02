<?php
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        // Generate OTP
        $otp = Str::random(6); // Or use rand(100000, 999999) for numeric OTP

        // Create applicant but mark as unverified
        $applicant = new Applicant();
        $applicant->first_name = $request->first_name;
        $applicant->last_name = $request->last_name;
        $applicant->email = $request->email;
        $applicant->password = Hash::make($request->password);
        $applicant->otp = $otp;
        $applicant->otp_expires_at = now()->addMinutes(15);
        $applicant->save();

        // Send verification email
        Mail::to($applicant->email)->send(new VerificationEmail($otp));

        // Redirect to OTP verification page
        return redirect()->route('verify.index')->with('email', $applicant->email);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string|size:6',
        ]);

        $applicant = Applicant::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('otp_expires_at', '>', now())
            ->first();

        if ($applicant) {
            // Mark as verified
            $applicant->is_verified = true;
            $applicant->otp = null;
            $applicant->otp_expires_at = null;
            $applicant->save();

            return redirect()->route('signin.index')->with('success', 'Account verified successfully! Please log in.');
        }

        return back()->with('error', 'Invalid or expired OTP.');
    }

    public function resend(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:applicants,email',
    ]);

    $applicant = Applicant::where('email', $request->email)->first();

    if ($applicant && $applicant->is_verified) {
        return response()->json(['error' => 'Account is already verified.'], 400);
    }

    // Generate new OTP
    $otp = Str::random(6);
    $applicant->otp = $otp;
    $applicant->otp_expires_at = now()->addMinutes(15);
    $applicant->save();

    // Resend email
    Mail::to($applicant->email)->send(new VerificationEmail($otp));

    return response()->json(['message' => 'OTP resent successfully.']);
}
}