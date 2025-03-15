<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicantProfile;
use App\Models\Region;
use App\Models\Province;
use App\Models\Barangay;
use App\Models\City;
use App\Models\Job;  // Import the UserInformation model
use App\Models\UserInformation;  // Import the UserInformation model
use Illuminate\Support\Facades\Storage;  // For file storage

class UserDashController extends Controller
{
    // Display different views
    public function index()
    {
        return view('userdash.index');
    }

    public function settings()
    {
        return view('userdash.settings');
    }

     // Store user profile
     public function storeApplicantProfile(Request $request)
     {
         // Validate the form inputs
         $request->validate([
             'full_name' => 'required|string|max:255',
             'profile_picture' => 'nullable|image|max:5120',
             'professional_resume' => 'nullable|mimes:pdf,doc,docx|max:10240',
             'valid_id' => 'nullable|mimes:jpg,jpeg,png,pdf|max:10240',
             'passport' => 'nullable|mimes:jpg,jpeg,png,pdf|max:10240',
             'birth_certificate' => 'nullable|mimes:jpg,jpeg,png,pdf|max:10240',
             'place_of_birth' => 'nullable|string|max:255',
             'dob' => 'nullable|date',
             'age' => 'nullable|integer',
             'religion' => 'nullable|string|max:255',
             'passport_no' => 'nullable|string|max:255',
             'passport_place_of_issue' => 'nullable|string|max:255',
             'passport_date_of_issue' => 'nullable|date',
             'spouse_name' => 'nullable|string|max:255',
             'spouse_occupation' => 'nullable|string|max:255',
             'children_names' => 'nullable|string|max:1000',
             'father_name' => 'nullable|string|max:255',
             'mother_name' => 'nullable|string|max:255',
             'emergency_contact' => 'nullable|string|max:255',
             'emergency_relationship' => 'nullable|string|max:255',
             'emergency_contact_number' => 'nullable|string|max:255',
             'address' => 'nullable|string|max:255',
         ]);
     
         // Handle file uploads
         $profilePicturePath = $this->uploadFile($request, 'profile_picture', 'profile_pictures');
         $professionalResumePath = $this->uploadFile($request, 'professional_resume', 'documents/resumes');
         $validIdPath = $this->uploadFile($request, 'valid_id', 'documents/ids');
         $passportPath = $this->uploadFile($request, 'passport', 'documents/passports');
         $birthCertificatePath = $this->uploadFile($request, 'birth_certificate', 'documents/birth_certificates');
     
         // Get the date of birth from the request
         $dob = $request->input('dob');
         $age = null;
     
         if ($dob) {
             // Ensure dob is in the correct format using Carbon
             $dob = \Carbon\Carbon::parse($dob)->format('Y-m-d');
             $age = \Carbon\Carbon::parse($dob)->age; // Calculate age from DOB
         }
     
         // Store the applicant profile
         ApplicantProfile::create([
             'applicant_id' => Auth::id(),
             'full_name' => $request->input('full_name'),
             'salutation' => $request->input('salutation', 'N/A'),
             'gender' => $request->input('gender', 'N/A'),
             'marital_status' => $request->input('marital_status', 'N/A'),
             'experience' => $request->input('experience', 'N/A'),
             'education' => $request->input('education', 'N/A'),
             'email' => $request->input('email', 'N/A'),
             'contact' => $request->input('contact', 'N/A'),
             'region' => $request->input('region', 'N/A'),
             'province' => $request->input('province', 'N/A'),
             'city' => $request->input('city', 'N/A'),
             'barangay' => $request->input('barangay', 'N/A'),
             'street' => $request->input('street', 'N/A'),
             'place_of_birth' => $request->input('place_of_birth', 'N/A'),
             'dob' => $dob, // Store the date of birth directly
             'age' => $age, // Store the calculated age, or null if dob is not provided
             'religion' => $request->input('religion', 'N/A'),
             'passport_no' => $request->input('passport_no', 'N/A'),
             'passport_place_of_issue' => $request->input('passport_place_of_issue', 'N/A'),
             'passport_date_of_issue' => $request->input('passport_date_of_issue'),
             'spouse_name' => $request->input('spouse_name', 'N/A'),
             'spouse_occupation' => $request->input('spouse_occupation', 'N/A'),
             'children_names' => $request->input('children_names', 'N/A'),
             'father_name' => $request->input('father_name', 'N/A'),
             'mother_name' => $request->input('mother_name', 'N/A'),
             'emergency_contact' => $request->input('emergency_contact', 'N/A'),
             'emergency_relationship' => $request->input('emergency_relationship', 'N/A'),
             'emergency_contact_number' => $request->input('emergency_contact_number', 'N/A'),
             'address' => $request->input('address', 'N/A'),
             'profile_picture' => $profilePicturePath,
             'professional_resume' => $professionalResumePath,
             'valid_id' => $validIdPath,
             'passport' => $passportPath,
             'birth_certificate' => $birthCertificatePath,
         ]);
     
         return redirect()->route('userdash.settings')->with('success', 'Profile updated successfully!');
     }
 
     // Helper function to handle file uploads
     private function uploadFile(Request $request, $fileInput, $folder)
     {
         if ($request->hasFile($fileInput)) {
             return $request->file($fileInput)->store($folder, 'public');
         }
 
         return null;
     }

    // Display job openings
    public function jobopenings(Request $request)
    {
        $searchTerm = $request->input('search'); // Get the search term if any
    
        // Fetch active jobs (Active Jobs)
        $activeJobs = Job::where('is_active', true)
                         ->where('is_archived', false)
                         ->where('job_title', 'like', '%' . $searchTerm . '%') // Apply search filter to job title if search is entered
                         ->get(); // Active jobs
    
        // Return the user-side job openings view with the active jobs
        return view('userdash.jobopenings', compact('activeJobs'));
    }

    public function pinJob($job_id)
{
    // Retrieve the job using the provided job ID
    $job = Job::findOrFail($job_id);

    // Get the current pinned jobs from session
    $pinnedJobs = session()->get('pinned_jobs', []);

    // Check if the job is already pinned to avoid duplicates
    if (!in_array($job->id, array_column($pinnedJobs, 'id'))) {
        // Add the job to the pinned jobs array
        $pinnedJobs[] = $job;
        session()->put('pinned_jobs', $pinnedJobs);
    }

    // Redirect back to the job openings page
    return redirect()->route('userdash.jobopenings');
}

public function removePin($job_id)
{
    // Get the pinned jobs from the session
    $pinnedJobs = session()->get('pinned_jobs', []);

    // Find the index of the job to remove
    $pinnedJobs = collect($pinnedJobs)->filter(function ($job) use ($job_id) {
        return $job->id != $job_id;
    })->values()->all();  // Remove the job with the given job_id

    // Update the pinned jobs in the session
    session()->put('pinned_jobs', $pinnedJobs);

    // Redirect back to the pinned jobs page
    return redirect()->route('userdash.pinned');
}


    public function jobdesc()
    {
        return view('userdash.jobdesc');
    }

    public function pinned()
    {
        return view('userdash.pinned');
    }

    public function conference()
    {
        return view('userdash.conference');
    }
}
