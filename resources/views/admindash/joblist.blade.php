<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
        }

        .sidebar {
            background-color: white;
            width: 250px;
            color: black;
            padding-top: 20px;
            height: 100%;
            position: fixed;
            left: 0;
            border-right: 1px solid #ddd;
            overflow-y: auto;
        }

        .sidebar .logo {
            text-align: center;
            padding: 20px;
            font-size: 24px;
            color: #007bff;
            display: flex;
            justify-content: left;
            align-items: center;
        }

        .sidebar .logo i {
            margin-right: 10px;
        }

        .sidebar .nav-item {
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
        }

        .sidebar .nav-item a {
            color: black;
            text-decoration: none;
            font-size: 16px;
        }

        .sidebar .nav-item a:hover {
            color: #007bff;
        }

        .sidebar .nav-item.active a:hover {
            color: #007bff;
        }

        .sidebar .nav-item.active a {
            color: black;
        }

        .sidebar .nav-item i {
            margin-right: 10px;
        }

        .sidebar .profile {
            padding: 10px;
            background-color: #f1f1f1;
            text-align: left;
            border-top: 1px solid #ddd;
            display: flex;
            align-items: center;
            margin-top: auto;
        }

        .sidebar .profile img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .sidebar .profile .info {
            display: block;
        }

        .sidebar .profile .info p {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }

        .sidebar .profile .info small {
            font-size: 12px;
            color: gray;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .content h4 {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content .tab-content {
            margin-top: 20px;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            background-color: white;
        }

        .card-header {
            background-color: #f7f8fa;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 0;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .filter-btn,
        .sort-btn {
            border: none;
            background: transparent;
        }

        .job-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
        }

        .job-card-footer .edit-btn {
            border: none;
            background-color: transparent;
            color: #007bff;
            font-size: 14px;
        }

        .search-bar {
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .job-card {
            border-radius: 8px;
            padding: 16px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .job-card h5 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .job-card p {
            margin: 4px 0;
            color: #666;
        }

        .job-card .toggle-btn {
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 50%;
            padding: 8px;
            cursor: pointer;
        }

        .job-card-footer {
            margin-top: 12px;
        }

        .job-card-footer .edit-btn {
            color: #007bff;
            font-size: 14px;
            cursor: pointer;
            border: none;
            background-color: transparent;
        }

        .toggle-button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .job-toggle {
            display: flex;
            align-items: center;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 20px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 12px;
            width: 12px;
            border-radius: 50%;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
        }

        input:checked + .toggle-slider {
            background-color: #007bff;
        }

        input:checked + .toggle-slider:before {
            transform: translateX(14px);
        }

        .job-title-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .job-title-container h5 {
            margin-bottom: 0;
        }

        /* Styling for the file upload area */
        .upload-section {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .upload-container {
            width: 48%;
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
        }

        .upload-container input {
            display: none;
        }

        .upload-container span {
            font-size: 16px;
            color: #555;
        }

        .upload-container .form-text {
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
<div class="sidebar">
        <div class="logo">
            <i class="fas fa-circle"></i> 
            <span>WIEAS</span>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item active">
            <a href="{{ route('admindash.index') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admindash.joblist') }}">
                    <i class="fas fa-briefcase"></i>
                    Jobs
                </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('admindash.analythics') }}">
                    <i class="fas fa-chart-line"></i>
                    Analytics
                </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('admindash.conference') }}">
                    <i class="fas fa-calendar-alt"></i>
                    Conference
                </a>
            </li>
            <li class="nav-item mb-5">
                <a href="{{ route('admindash.applicants') }}">
                    <i class="fas fa-users"></i>
                    Applicants <span class="badge bg-danger"></span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <a href="#">
                    <i class="fas fa-bell"></i>
                    Notifications <span class="badge bg-danger">2</span>
                </a>
            </li>   
            <li class="nav-item">
                <a href="#">
                    <i class="fas fa-cogs"></i>
                    Settings
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.signin') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>
        <div class="profile">
            <img src="https://via.placeholder.com/40" alt="Profile">
            <div class="info">
                <p>Bogart Batumbakal</p>
                <small>bogartb69@gmail.com</small>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="nav nav-tabs mt-4" id="jobTabs">
            <a class="nav-link active" data-bs-toggle="tab" href="#newJobs">New Jobs</a>
            <a class="nav-link" data-bs-toggle="tab" href="#activeJobs">Active Jobs</a>
            <a class="nav-link" data-bs-toggle="tab" href="#archiveJobs">Archive Jobs</a>
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addJobModal">Add New Jobs</a>
        </div>

<!-- joblist.blade.php -->
<div class="tab-content mt-4">
    <!-- New Jobs Tab -->
    <div class="tab-pane active" id="newJobs">
        <div class="d-flex justify-content-between mt-3">
            <button class="filter-btn">More Filter</button>
            <button class="sort-btn">From newest to last</button>
        </div>
        <div class="row mt-4">
        @foreach ($newJobs->concat($activeJobs) as $job)
        <div class="col-md-4 mb-3 job-card-container" data-new-job="{{ $job->created_at > now()->subDays(7) ? 'true' : 'false' }}">
            <div class="job-card">
                <div class="job-title-container">
                    <h5>{{ $job->job_title }}</h5>
                    <label class="toggle-switch">
                        <input type="checkbox" class="toggle-job-status" data-job-id="{{ $job->id }}" {{ $job->is_active ? 'checked' : '' }}>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                <p>Company: {{ $job->company_name }}</p>
                <p>Date: {{ $job->year_of_establishment }}</p>
                <p>Location: {{ $job->country_origin }}</p>
                <div class="job-card-footer">
                    <span></span>
                    <button class="edit-btn">Edit</button>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
<!-- Active Jobs Tab -->
<div class="tab-pane" id="activeJobs">
    <form method="GET" action="{{ route('joblist') }}" id="searchForm">
        <input class="form-control search-bar" type="text" placeholder="Search by Job Title..." name="search" id="jobSearch" value="{{ $searchTerm }}">
    </form>    <div class="row mt-4">
        @foreach ($activeJobs as $job)
            <div class="col-md-4 mb-3 job-card-container">
                <div class="job-card">
                    <div class="job-title-container">
                        <h5>{{ $job->job_title }}</h5>
                        <label class="toggle-switch">
                            <input type="checkbox" class="toggle-job-status" data-job-id="{{ $job->id }}" {{ $job->is_active ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <p>Company: {{ $job->company_name }}</p>
                    <p>Date: {{ $job->year_of_establishment }}</p>
                    <p>Location: {{ $job->country_origin }}</p>
                    <div class="job-card-footer">
                        <span></span>
                        <button class="edit-btn">Edit</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Archive jobs -->
<div class="tab-pane" id="archiveJobs">
    <div class="row mt-4">
        @foreach ($archivedJobs as $job)
            <div class="col-md-4 mb-3">
                <div class="job-card">
                    <div class="job-title-container">
                        <h5>{{ $job->job_title }}</h5>
                        <label class="toggle-switch">
                            <input type="checkbox" class="toggle-job-status" data-job-id="{{ $job->id }}" {{ $job->is_active ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <p>Company: {{ $job->company_name }}</p>
                    <p>Date: {{ $job->year_of_establishment }}</p>
                    <p>Location: {{ $job->country_origin }}</p>
                    <div class="job-card-footer">
                        <span></span>
                        <button class="edit-btn">Edit</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.querySelectorAll('.toggle-job-status').forEach(toggle => {
        toggle.addEventListener('change', function() {
            let jobId = this.getAttribute('data-job-id');
            let isActive = this.checked ? 1 : 0;

            fetch(`/toggle-job-status/${jobId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ is_active: isActive })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Show success message
                location.reload(); // Reload the page to update the job status
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>


    <form id="jobForm" enctype="multipart/form-data" method="POST" action="{{ route('store.job') }}">
    @csrf
    <div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJobModalLabel">Add New Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Job Form Content -->
                    <ul class="nav nav-tabs" id="addJobTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="company-info-tab" data-bs-toggle="tab" href="#companyInfo" role="tab" aria-controls="companyInfo" aria-selected="true">Company Info</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="founding-info-tab" data-bs-toggle="tab" href="#foundingInfo" role="tab" aria-controls="foundingInfo" aria-selected="false">Founding Info</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="social-media-profile-tab" data-bs-toggle="tab" href="#socialMediaProfile" role="tab" aria-controls="socialMediaProfile" aria-selected="false">Social Media Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="addJobTabContent">
                        <!-- Company Info Tab -->
                        <div class="tab-pane fade show active" id="companyInfo" role="tabpanel" aria-labelledby="company-info-tab">
                        <!-- Profile Image Upload -->
                        <div class="upload-section mt-3">
                            <label for="profileImage" style="display: flex; flex-direction: column; align-items: center; text-align: center; cursor: pointer;">
                                <img src="{{ asset('images/upload.jpg') }}" alt="Upload Icon" style="width: 40px; height: 40px; margin-bottom: 10px;">
                                <strong>Upload Profile Image</strong>
                                <p>Profile images optimal dimension 1502x400. Supported formats: JPEG, PNG. Max photo size 5MB.</p>                            </label>
                            <input type="file" id="profileImage" name="profileImage" accept="image/png, image/jpeg" style="display: none;" onchange="previewImage('profileImage', 'profilePreview')" />
                            <img id="profilePreview" style="max-width: 100%; max-height: 200px; display: none;" />
                        </div>

                        <!-- Banner Image Upload -->
                        <div class="upload-section mt-3">
                            <label for="bannerImage" style="display: flex; flex-direction: column; align-items: center; text-align: center; cursor: pointer;">
                                <img src="{{ asset('images/upload.jpg') }}" alt="Upload Icon" style="width: 40px; height: 40px; margin-bottom: 10px;">
                                <strong>Upload Banner Image</strong>
                                <p>Banner images optimal dimension 1502x400. Supported formats: JPEG, PNG. Max photo size 5MB.</p>
                            </label>
                            <input type="file" id="bannerImage" name="bannerImage" accept="image/png, image/jpeg" style="display: none;" onchange="previewImage('bannerImage', 'bannerPreview')" />
                            <img id="bannerPreview" style="max-width: 100%; max-height: 200px; display: none;" />
                        </div>
                        <div class="form-group mt-3">
                                <label for="companyName">Job Title</label>
                                <input type="text" class="form-control" id="companyName" name="jobtitle" placeholder="Job Title" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="companyName">Company Name</label>
                                <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="aboutUs">About Us</label>
                                <textarea class="form-control" id="aboutUs" name="aboutUs" rows="4" placeholder="Write down about the company here..." required></textarea>
                            </div>
                        </div>

                        <!-- Founding Info Tab -->
                        <div class="tab-pane fade" id="foundingInfo" role="tabpanel" aria-labelledby="founding-info-tab">
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="countryOrigin">Country Origin</label>
                                    <select class="form-control" id="countryOrigin" name="countryOrigin" required>
                                        <option value="" selected>Select...</option>
                                        <option value="HUNGARY">HUNGARY</option>
                                        <option value="POLAND">POLAND</option>
                                        <option value="SAUDI ARABIA">SAUDI ARABIA</option>
                                        <option value="TAIWAN">TAIWAN</option>
                                        <option value="UNITED ARAB EMIRATES">UNITED ARAB EMIRATES</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="industryTypes">Industry Types</label>
                                    <select class="form-control" id="industryTypes" name="industryTypes" required>
                                        <option value="" selected>Select...</option>
                                        <option value="IT">Information Technology</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Manufacturing">Manufacturing</option>
                                        <option value="Retail">Retail</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="additionalField">Additional Field</label>
                                    <select class="form-control" id="additionalField" name="additionalField">
                                        <option value="" selected>Select...</option>
                                        <option value="Contractual">Contractual</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="yearOfEstablishment">Year of Establishment</label>
                                    <input type="date" class="form-control" id="yearOfEstablishment" name="yearOfEstablishment" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="companyWebsite">Company Website</label>
                                    <input type="url" class="form-control" id="companyWebsite" name="companyWebsite" placeholder="Website URL...">
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="companyVision">Company Vision</label>
                                <textarea class="form-control" id="companyVision" name="companyVision" rows="4" placeholder="Tell us about your company vision..."></textarea>
                            </div>
                        </div>

                        <!-- Social Media Profile Tab -->
                        <div class="tab-pane fade" id="socialMediaProfile" role="tabpanel" aria-labelledby="social-media-profile-tab">
                            <div id="socialLinksContainer">
                                <div class="row mt-3" id="socialLink1">
                                    <div class="col-md-4">
                                        <label for="socialLink1Select">Social Link 1</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="socialLink1Icon"><i class="fab fa-facebook"></i></span>
                                            <select class="form-control" id="socialLink1Select" name="socialLink1Select" onchange="updateSocialLinkIcon(this, 'socialLink1Icon')">
                                                <option value="facebook">Facebook</option>
                                                <option value="twitter">Twitter</option>
                                                <option value="instagram">Instagram</option>
                                                <option value="youtube">YouTube</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="socialLink1Url">Profile link/url</label>
                                        <div class="input-group">
                                            <input type="url" class="form-control" id="socialLink1Url" name="socialLink1Url" placeholder="Profile link/url...">
                                            <button class="btn btn-outline-secondary remove-social-link" type="button" onclick="removeSocialLink('socialLink1')"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add New Social Link Button -->
                            <div class="mt-3 text-center">
                                <button class="btn btn-light" style="border-radius: 8px; background-color: #f0f0f0; width: 750px;" id="addSocialLinkBtn" onclick="addSocialLink()">
                                    <i class="fas fa-plus"></i> Add Social Link
                                </button>
                            </div>
                        </div>

                        <!-- Contact Tab -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row mt-3">

                                <div class="form-group col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone number...">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address...">
                                </div>
                            </div>
                            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Job</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function previewImage(inputId, previewId) {
        const fileInput = document.getElementById(inputId);
        const file = fileInput.files[0];

        // Check if the selected file is an image
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                preview.src = e.target.result;
                preview.style.display = 'block'; // Show the preview image
            };
            reader.readAsDataURL(file);
        } else {
            alert("Only PNG, JPG, and JPEG images are allowed.");
            fileInput.value = ''; // Clear the selected file input
        }
    }
</script>

        <script>
            $(document).ready(function() {
    // Set the CSRF token for every AJAX request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
            $(document).ready(function() {
    $('#jobForm').on('submit', function(event) {
        event.preventDefault();  // Prevent the default form submission

        // Create FormData object to send files along with other data
        var formData = new FormData(this);

        $.ajax({
            url: '/submit-job',  // Your route to store the job
            method: 'POST',  // HTTP method
            data: formData,  // Form data (including files)
            contentType: false,  // Important for file upload
            processData: false,  // Important for file upload
            success: function(response) {
                alert(response.message);  // Show success message
                $('#addJobModal').modal('hide');  // Close the modal
                $('#jobForm')[0].reset();  // Reset the form after successful submission
            },
            error: function(xhr, status, error) {
                // Handle error case
                alert('There was an error while submitting the job.');
            }
        });
    });
});

        </script>
    <script>
            function previewImage(inputId, previewId) {
        const file = document.getElementById(inputId).files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById(previewId);
            preview.src = e.target.result;
            preview.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
</script>

    <script>
        let socialLinkCount = 1; // Track the number of social links added

        function addSocialLink() {
            socialLinkCount++; // Increment the counter
            const newLinkId = 'socialLink' + socialLinkCount; // Generate a new ID for the social link

            // Create new social link HTML dynamically
            const newSocialLink = `
                <div class="row mt-3" id="${newLinkId}">
                    <div class="col-md-4">
                        <label for="${newLinkId}Select">Social Link ${socialLinkCount}</label>
                        <div class="input-group">
                            <span class="input-group-text" id="${newLinkId}Icon"><i class="fab fa-facebook"></i></span>
                            <select class="form-control" id="${newLinkId}Select" onchange="updateSocialLinkIcon(this, '${newLinkId}Icon')">
                                <option value="facebook">Facebook</option>
                                <option value="twitter">Twitter</option>
                                <option value="instagram">Instagram</option>
                                <option value="youtube">Youtube</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="${newLinkId}Url">Profile link/url</label>
                        <div class="input-group">
                            <input type="url" class="form-control" id="${newLinkId}Url" placeholder="Profile link/url...">
                            <button class="btn btn-outline-secondary remove-social-link" type="button" onclick="removeSocialLink('${newLinkId}')"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </div>
            `;
            
            // Append the new link to the social links container
            document.getElementById('socialLinksContainer').insertAdjacentHTML('beforeend', newSocialLink);
        }

        function removeSocialLink(linkId) {
            const linkElement = document.getElementById(linkId);
            linkElement.remove(); // Remove the social link element
        }

        // Update the social media icon based on the selected platform
        function updateSocialLinkIcon(selectElement, iconId) {
            const iconClass = selectElement.value; // Get the selected platform
            const iconElement = document.getElementById(iconId);
            iconElement.innerHTML = `<i class="fab fa-${iconClass}"></i>`; // Change icon based on the platform
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
