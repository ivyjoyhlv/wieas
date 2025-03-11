<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class AdminDashController extends Controller
{
    public function index(){
        return view('admindash.index');
    }

    public function joblist()
    {
        $jobs = Job::all(); // Fetch all jobs from the database
        return view('admindash.joblist', compact('jobs'));
    }
    
        // Method to handle the job submission and save to database
        public function storeJob(Request $request)
        {
            // Validate the form data
            $request->validate([
                'companyName' => 'required|string|max:255',
                'jobtitle' => 'required|string|max:255',
                'aboutUs' => 'required|string',
                'countryOrigin' => 'required|string',
                'industryTypes' => 'required|string',
                'additionalField' => 'nullable|string', // Additional field
                'yearOfEstablishment' => 'required|date',
                'companyWebsite' => 'nullable|url',
                'companyVision' => 'nullable|string',
                'profileImage' => 'nullable|image|max:5000', // Validate profile image upload
                'bannerImage' => 'nullable|image|max:5000', // Validate banner image upload
                'mapLocation' => 'nullable|string',
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
            $job->profile_image = $profileImagePath; // Store the file path
            $job->banner_image = $bannerImagePath; // Store the file path
            $job->map_location = $request->input('mapLocation');
            $job->phone = $request->input('phone');
            $job->email = $request->input('email');
    
            // Save the job data
            $job->save();
    
            // Redirect back with success message
            return redirect()->back()->with('success', 'Job added successfully!');
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
    
}
