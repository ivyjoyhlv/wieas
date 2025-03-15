<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Applicant;

class AdminDashController extends Controller
{
    // Method to handle the job submission and save to database
    public function storeJob(Request $request)
    {
        $request->validate([
            'companyName' => 'required|string|max:255',
            'jobtitle' => 'required|string|max:255',
            'aboutUs' => 'required|string',
            'countryOrigin' => 'required|string',
            'industryTypes' => 'required|string',
            'additionalField' => 'nullable|string',
            'yearOfEstablishment' => 'required|date',
            'companyWebsite' => 'nullable|url',
            'companyVision' => 'nullable|string',
            'profileImage' => 'nullable|image|max:5000',
            'bannerImage' => 'nullable|image|max:5000',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        // Handle the profile image upload
        $profileImagePath = null;
        if ($request->hasFile('profileImage')) {
            $profileImagePath = $request->file('profileImage')->store('profile_images', 'public');
        }

        // Handle the banner image upload
        $bannerImagePath = null;
        if ($request->hasFile('bannerImage')) {
            $bannerImagePath = $request->file('bannerImage')->store('banner_images', 'public');
        }

        // Create a new Job record in the database
        $job = new Job();
        $job->company_name = $request->input('companyName');
        $job->job_title = $request->input('jobtitle');
        $job->about_us = $request->input('aboutUs');
        $job->country_origin = $request->input('countryOrigin');
        $job->industry_types = $request->input('industryTypes');
        $job->additional_field = $request->input('additionalField');
        $job->year_of_establishment = $request->input('yearOfEstablishment');
        $job->company_website = $request->input('companyWebsite');
        $job->company_vision = $request->input('companyVision');
        $job->profile_image = $profileImagePath;
        $job->banner_image = $bannerImagePath;
        $job->phone = $request->input('phone');
        $job->email = $request->input('email');
        $job->is_active = true; // Default to active
        $job->is_archived = false; // Default to not archived

        // Save the job data
        $job->save();

        return redirect()->back()->with('success', 'Job added successfully!');
    }

    // Method to toggle the active status and archive/unarchive a job
    public function toggleActive(Request $request, $id)
    {
        $job = Job::find($id);
        if ($job->is_active) {
            // If it's active, deactivate and archive it
            $job->is_active = false;
            $job->is_archived = true;
        } else {
            // If it's inactive (archived), activate and unarchive it
            $job->is_active = true;
            $job->is_archived = false;
        }
        $job->save();

        return response()->json([
            'status' => $job->is_active ? 'active' : 'archived',
            'message' => $job->is_active ? 'Job activated and moved to Active Jobs!' : 'Job archived!',
        ]);
    }

    // Fetch active jobs (for Active Jobs and New Jobs tab)
    public function joblist(Request $request)
    {
        $searchTerm = $request->input('search'); // Get the search term from the request
    
        // Fetch jobs that are inactive but not archived (New Jobs)
        $newJobs = Job::where('is_active', false)->where('is_archived', false)->get(); // New jobs (inactive but not archived)
    
        // Fetch active jobs (Active Jobs)
        $activeJobs = Job::where('is_active', true)->where('is_archived', false)
            ->where('job_title', 'like', '%' . $searchTerm . '%') // Apply search filter to job title
            ->get(); // Active jobs
    
        // Fetch archived jobs
        $archivedJobs = Job::where('is_archived', true)->get(); // Archived jobs
    
        return view('admindash.joblist', compact('newJobs', 'activeJobs', 'archivedJobs', 'searchTerm'));
    }

    // Fetch archived jobs (for Archive Jobs tab)
    public function archivedJobs()
    {
        $archivedJobs = Job::where('is_archived', true)->get(); // Fetch archived jobs
        return view('admindash.archivedJobs', compact('archivedJobs'));
    }
    public function analythics(){
        return view('admindash.analythics');
    }
    public function conference(){
        return view('admindash.conference');
    }
    public function applicants(){
        return view('admindash.applicants');
    }
    public function index()
    {
        // Get the total count of applicants using the model method
        $applicantCount = Applicant::count();

        // Pass the applicant count to the view
        return view('admindash.index', compact('applicantCount'));
    }

    
}
