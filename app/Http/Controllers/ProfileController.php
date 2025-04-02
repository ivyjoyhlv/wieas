<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantProfile;
use App\Models\Applicant;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Method to store user profile data
    public function storeUserProfile(Request $request)
    {
        $request->validate([
            'salutation' => 'required|string',
            'gender' => 'required|string',
            'marital_status' => 'required|string',
            'experience' => 'required|string',
            'education' => 'required|string',
            'contact' => 'required|string|max:15',
            'region' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'barangay' => 'required|string',
            'street' => 'required|string',
            'place_of_birth' => 'required|string',
            'dob' => 'required|date',
            'religion' => 'required|string',
            'passport_no' => 'nullable|string',
            'passport_date_of_issue' => 'nullable|date',
            'passport_place_of_issue' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:5000',
            'professional_resume' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'valid_id' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'passport' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'birth_certificate' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
        ]);

        // Fetch applicant by ID (ensure the applicant is authenticated or passed as a parameter)
        $applicant = Applicant::find(auth()->id());

        // Handle file uploads
        $profilePicture = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $professionalResume = null;
        if ($request->hasFile('professional_resume')) {
            $professionalResume = $request->file('professional_resume')->store('resumes', 'public');
        }

        $validId = null;
        if ($request->hasFile('valid_id')) {
            $validId = $request->file('valid_id')->store('valid_ids', 'public');
        }

        $passport = null;
        if ($request->hasFile('passport')) {
            $passport = $request->file('passport')->store('passports', 'public');
        }

        $birthCertificate = null;
        if ($request->hasFile('birth_certificate')) {
            $birthCertificate = $request->file('birth_certificate')->store('birth_certificates', 'public');
        }

        // Create or update the applicant profile
        $applicantProfile = $applicant->profile()->updateOrCreate(
            ['applicant_id' => $applicant->id],
            [
                'salutation' => $request->input('salutation'),
                'gender' => $request->input('gender'),
                'marital_status' => $request->input('marital_status'),
                'experience' => $request->input('experience'),
                'education' => $request->input('education'),
                'contact' => $request->input('contact'),
                'region' => $request->input('region'),
                'province' => $request->input('province'),
                'city' => $request->input('city'),
                'barangay' => $request->input('barangay'),
                'street' => $request->input('street'),
                'place_of_birth' => $request->input('place_of_birth'),
                'dob' => $request->input('dob'),
                'religion' => $request->input('religion'),
                'passport_no' => $request->input('passport_no'),
                'passport_date_of_issue' => $request->input('passport_date_of_issue'),
                'passport_place_of_issue' => $request->input('passport_place_of_issue'),
                'profile_picture' => $profilePicture,
                'professional_resume' => $professionalResume,
                'valid_id' => $validId,
                'passport' => $passport,
                'birth_certificate' => $birthCertificate,
            ]
        );

        return redirect()->route('userProfile.show', $applicant->id)->with('success', 'Profile updated successfully!');
    }
}
