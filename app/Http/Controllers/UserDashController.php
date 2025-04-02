<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicantProfile;
use App\Models\ApplicantProfession;
use App\Models\Job;  // Import the UserInformation model
use App\Models\UserSocialLink;  // Import the UserInformation model
use App\Models\Feedback;
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

    public function storeSocialLinks(Request $request)
{
    // Validate social media links
    $request->validate([
        'social_links' => 'array',
        'social_links.*.platform' => 'required|string',
        'social_links.*.url' => 'required|url',
    ]);

    foreach ($request->social_links as $link) {
        UserSocialLink::create([
            'user_id' => Auth::id(),
            'platform' => $link['platform'],
            'url' => $link['url'],
        ]);
    }

    return redirect()->route('userdash.settings')->with('success', 'Social links saved successfully!');
}

public function applyNow(Request $request, $job_id)
{
    // Get the applicant's id from session or authenticated user
    $applicant_id = session('applicant_id'); // Assuming applicant_id is stored in the session

    // Retrieve the job
    $job = Job::findOrFail($job_id);

    // Check if applicant profile exists
    $applicantProfile = ApplicantProfile::where('applicant_id', $applicant_id)->first();

    // If applicant profile doesn't exist, redirect them to complete their profile
    if (!$applicantProfile) {
        return redirect()->route('userdash.settings')->with('error', 'Please complete your profile before applying!');
    }

    // Store the application in the job_applications table
    \App\Models\JobApplication::create([
        'job_id' => $job->id,
        'applicant_id' => $applicant_id,
        'job_title' => $job->job_title,
        'company_name' => $job->company_name,
        'status' => 'Active', // You can change this based on logic
    ]);

    return redirect()->route('userdash.jobopenings')->with('success', 'You have successfully applied for the job!');
}



    //store Applicant profession
    public function storeApplicantProfession(Request $request)
    {
        // Validate the form inputs for the professional data
        $request->validate([
            'language1' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'references' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'salary' => 'nullable|string|max:255',
            'date_from' => 'nullable|string|max:7',
            'date_to' => 'nullable|string|max:7',
            'school_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'inclusive_year' => 'nullable|string|max:9',
            'course' => 'nullable|string|max:255',
            'signature' => 'nullable|image|max:2048',  // for file upload
        ]);
    
        // Handle file upload for signature
        $signaturePath = null;
        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature')->store('signatures', 'public');  // Store in public disk
        }
    
        // Save the data into the ApplicantProfession model
        ApplicantProfession::create([
            'applicant_id' => session('applicant_id'),  // Make sure applicant_id is stored in the session
            'language_spoken' => $request->input('language1'),
            'company' => $request->input('company'),
            'references' => $request->input('references'),
            'contact' => $request->input('contact'),
            'address' => $request->input('address'),
            'position' => $request->input('position'),
            'salary' => $request->input('salary'),
            'date_from' => $request->input('date_from'),
            'date_to' => $request->input('date_to'),
            'school_name' => $request->input('school_name'),
            'location' => $request->input('location'),
            'inclusive_year' => $request->input('inclusive_year'),
            'course' => $request->input('course'),
            'signature' => $signaturePath,  // Store the file path in the database
        ]);
    
        return redirect()->route('userdash.settings')->with('success', 'Profile updated successfully!');
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
              'applicant_id' => session('applicant_id'), // Retrieve ID from session
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
        // Retrieve applicant's session data
        $applicant = session('applicant'); // Get applicant info from session
        $job = session('job'); // Get job info from session (job title and company)
    
        // Fetch active jobs based on search criteria
        $searchTerm = $request->input('search');
        $activeJobs = Job::where('is_active', true)
                         ->where('is_archived', false)
                         ->where('job_title', 'like', '%' . $searchTerm . '%')
                         ->get(); // Active jobs
    
        // Return the view with applicant and job data
        return view('userdash.jobopenings', compact('activeJobs', 'applicant', 'job'));
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
public function showApplicantData($applicant_id, $job_id)
{
    // Retrieve applicant profile data
    $applicantProfile = ApplicantProfile::where('applicant_id', $applicant_id)->first();
    
    // Retrieve job details (if needed)
    $job = Job::find($job_id);

    // Pass data to the view
    return view('admin.applicants', compact('applicantProfile', 'job'));
}

public function showApplicantById($applicant_id)
{
    // Retrieve the applicant profile based on applicant_id
    $applicantProfile = ApplicantProfile::findOrFail($applicant_id);

    // Optionally, retrieve the jobs the applicant has applied for
    $jobApplications = JobApplication::where('applicant_id', $applicant_id)->get();

    // Pass the applicant's profile and job applications to the view
    return view('admindash.applicants', compact('applicantProfile', 'jobApplications'));
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
    // Show the feedback form (same as the feedback view)
    public function create()
    {
        return view('userdash.feedback');
    }

    // Store the submitted feedback
    public function store(Request $request)
    {
        // Validate the feedback form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'feedback' => 'required|string|max:2000',
            'rating' => 'required|integer|between:1,5',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle file upload if an image is provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('feedback_images', 'public');
        }

        // Store the feedback in the database
        Feedback::create([
            'name' => $request->input('name'),
            'feedback' => $request->input('feedback'),
            'rating' => $request->input('rating'),
            'image' => $imagePath,
        ]);

        // Redirect back with a success message
        return redirect()->route('feedback.create')->with('success', 'Thank you for your feedback!');
    }
}
