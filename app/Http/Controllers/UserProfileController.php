<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\ApplicantProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function showProfileForm()
    {
        $applicant = Auth::guard('applicant')->user();
        $profile = $applicant->profile;
        
        return view('userdash.profile', compact('profile', 'applicant'));
    }

    public function storeUserProfile(Request $request)
    {
        $applicant = Auth::guard('applicant')->user();
        
        $validated = $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'full_name' => 'required|string|max:255',
            'salutation' => 'required|string|max:10',
            'gender' => 'required|string|max:10',
            'marital_status' => 'required|string|max:20',
            'experience' => 'required|string|max:50',
            'education' => 'required|string|max:50',
            'contact' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'dob' => 'required|date',
            'religion' => 'required|string|max:100',
            'passport_no' => 'required|string|max:50',
            'passport_date_of_issue' => 'required|date',
            'passport_place_of_issue' => 'required|string|max:255',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_occupation' => 'nullable|string|max:255',
            'children_names.*' => 'nullable|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'emergency_contact' => 'required|string|max:255',
            'emergency_relationship' => 'required|string|max:50',
            'emergency_contact_number' => 'required|string|max:20',
            'emergency_address' => 'required|string|max:255',
            'professional_resume' => 'required|file|mimes:pdf,doc,docx,txt,jpg,jpeg,png|max:5120',
            'valid_id' => 'required|file|mimes:pdf,doc,docx,txt,jpg,jpeg,png|max:5120',
            'passport' => 'required|file|mimes:pdf,doc,docx,txt,jpg,jpeg,png|max:5120',
            'birth_certificate' => 'required|file|mimes:pdf,doc,docx,txt,jpg,jpeg,png|max:5120',
        ]);

        // Handle file uploads
        $profilePicturePath = $this->handleFileUpload($request->file('profile_picture'), $applicant->profile->profile_picture ?? null, 'profile_pictures');
        $resumePath = $this->handleFileUpload($request->file('professional_resume'), $applicant->profile->professional_resume ?? null, 'resumes');
        $validIdPath = $this->handleFileUpload($request->file('valid_id'), $applicant->profile->valid_id ?? null, 'ids');
        $passportPath = $this->handleFileUpload($request->file('passport'), $applicant->profile->passport_file ?? null, 'passports');
        $birthCertPath = $this->handleFileUpload($request->file('birth_certificate'), $applicant->profile->birth_certificate ?? null, 'birth_certs');

        // Process children names
        $childrenNames = [];
        if ($request->has('children_names')) {
            foreach ($request->children_names as $child) {
                if (!empty($child)) {
                    $childrenNames[] = $child;
                }
            }
        }

        // Split full name
        $nameParts = explode(' ', $validated['full_name'], 2);
        $firstName = $nameParts[0];
        $lastName = $nameParts[1] ?? '';

        // Update applicant name
        $applicant->update([
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);

        // Create or update profile
        $profileData = [
            'salutation' => $validated['salutation'],
            'gender' => $validated['gender'],
            'marital_status' => $validated['marital_status'],
            'experience' => $validated['experience'],
            'education' => $validated['education'],
            'contact' => $validated['contact'],
            'region' => $validated['region'],
            'province' => $validated['province'],
            'city' => $validated['city'],
            'barangay' => $validated['barangay'],
            'street' => $validated['street'],
            'place_of_birth' => $validated['place_of_birth'],
            'dob' => $validated['dob'],
            'age' => now()->diffInYears($validated['dob']),
            'religion' => $validated['religion'],
            'passport_no' => $validated['passport_no'],
            'passport_date_of_issue' => $validated['passport_date_of_issue'],
            'passport_place_of_issue' => $validated['passport_place_of_issue'],
            'spouse_name' => $validated['spouse_name'] ?? null,
            'spouse_occupation' => $validated['spouse_occupation'] ?? null,
            'children_names' => !empty($childrenNames) ? json_encode($childrenNames) : null,
            'father_name' => $validated['father_name'],
            'mother_name' => $validated['mother_name'],
            'emergency_contact' => $validated['emergency_contact'],
            'emergency_relationship' => $validated['emergency_relationship'],
            'emergency_contact_number' => $validated['emergency_contact_number'],
            'emergency_address' => $validated['emergency_address'],
            'professional_resume' => $resumePath,
            'valid_id' => $validIdPath,
            'passport_file' => $passportPath,
            'birth_certificate' => $birthCertPath,
        ];

        if ($profilePicturePath) {
            $profileData['profile_picture'] = $profilePicturePath;
        }

        $applicant->profile()->updateOrCreate(
            ['applicant_id' => $applicant->id],
            $profileData
        );

        return redirect()->route('userdash.profile')->with('success', 'Profile saved successfully!');
    }

    private function handleFileUpload($file, $existingPath, $folder)
    {
        if ($file) {
            // Delete old file if exists
            if ($existingPath && Storage::disk('public')->exists($existingPath)) {
                Storage::disk('public')->delete($existingPath);
            }
            
            return $file->store($folder, 'public');
        }
        
        return $existingPath;
    }
}