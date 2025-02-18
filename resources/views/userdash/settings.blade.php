    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Settings</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    </head>
    <body>

    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/workforce.png') }}" class="rounded-circle me-2 img-fluid" style="width: 35px; height: 35px;" alt="Logo">
                <strong>WIEAS</strong>
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link fw-bold text-primary" href="{{ route('userdash.index') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.jobopenings') }}">Find Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Saved Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">...</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-bell me-3 text-primary"></i>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/bogart.jpg') }}" class="rounded-circle me-2 img-fluid" style="width: 40px; height: 40px;" alt="User Profile">
                    <div>
                            <span class="d-block fw-bold">{{ session('applicant')->first_name }}</span>
                            <small class="text-muted">{{ session('applicant')->email }}</small>
                        </div>
                    <i class="bi bi-chevron-down ms-2"></i>
                </div>
            </div>
        </div>
    </nav>


        <div class="container mt-5">
            <div class="card p-4 shadow-sm">
                <h3 class="fw-bold">Settings</h3>

                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs mt-3" id="settingsTab">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" data-bs-toggle="tab" href="#personal">
                            <i class="bi bi-person"></i> Personal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile">
                            <i class="bi bi-person-badge"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#social">
                            <i class="bi bi-globe"></i> Social Links
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#account">
                            <i class="bi bi-gear"></i> Account Setting
                        </a>
                    </li>
                </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-4">
                    
                    <!-- Personal Settings Tab -->
    <div class="tab-pane fade show active" id="personal">
        <h5 class="fw-bold">Basic Information</h5>

        <div class="row">
            <!-- Profile Picture Upload -->
            <div class="col-md-3">
                <label class="fw-bold">Profile Picture</label>
                <div class="border rounded text-center p-3 d-flex flex-column align-items-center justify-content-center" style="height: 150px; position: relative;">
                    <input type="file" id="profileUpload" class="d-none">
                    <label for="profileUpload" class="w-100 h-100 d-flex flex-column align-items-center justify-content-center cursor-pointer">
                        <i class="bi bi-cloud-upload fs-3 text-muted"></i>
                        <p class="small text-muted">Browse photo or drop here</p>
                        <small class="text-muted">A photo larger than 400 pixels works best. Max photo size 5 MB.</small>
                    </label>
                    <img id="profilePreview" src="" class="img-fluid rounded-circle mt-2 d-none" style="width: 100px; height: 100px; object-fit: cover;">
                </div>
            </div>

            <div class="col-md-9">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="fw-bold">Full Name</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Title/Headline</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Experience</label>
                            <select class="form-select">
                                <option selected>Select...</option>
                                <option>Less than 1 year</option>
                                <option>1-3 years</option>
                                <option>3-5 years</option>
                                <option>5+ years</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Education</label>
                            <select class="form-select">
                                <option selected>Select...</option>
                                <option>High School</option>
                                <option>Bachelor's Degree</option>
                                <option>Master's Degree</option>
                                <option>PhD</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Contact</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="fw-bold">City Address</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold">Provincial Address</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold">Citizenship</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="fw-bold">Age</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold">Place of Birthdate</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold">Religion</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="fw-bold">Passport No.</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold">Date of Issue</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold">Place of Issue</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="fw-bold">Name of Spouse</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold">Occupation</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold">Name(s) of Children</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="row mt-3">

                        <div class="col-md-6">
                            <label class="fw-bold">Name of Father</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Name of Mother</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Person to Notify in Case of Emergency</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Relationship</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-6">
                            <label class="fw-bold">Contact No.</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Address</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>


                </form>
            </div>
        </div>

        <!-- CV/Resume Section -->
        <div class="mt-5">
            <h5 class="fw-bold">Your CV/Resume</h5>

            <div class="row">
                <div class="col-md-4">
                    <div class="border p-3 rounded">
                        <i class="bi bi-file-earmark-text fs-3"></i>
                        <p class="mb-1">Professional Resume</p>
                        <small>3.5 MB</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-3 rounded position-relative">
                        <i class="bi bi-file-earmark-text fs-3"></i>
                        <p class="mb-1">Product Designer</p>
                        <small>4.7 MB</small>
                        <div class="dropdown position-absolute top-0 end-0">
                            <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit Resume</a></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-3 rounded">
                        <i class="bi bi-file-earmark-text fs-3"></i>
                        <p class="mb-1">Visual Designer</p>
                        <small>1.3 MB</small>
                    </div>
                </div>
            </div>
            <!-- Add CV/Resume -->
            <div class="mt-3">
                <input type="file" id="cvUpload" hidden>
                <label for="cvUpload" class="border p-3 rounded d-block text-center w-100 bg-light cursor-pointer" 
                    style="border: 2px dashed #ccc;">
                    <i class="bi bi-plus-circle fs-3 text-primary"></i>
                    <p class="mb-1 fw-bold">Add CV/Resume</p>
                    <small class="text-muted">Browse file or drop here. Only PDF.</small>
                </label>
            </div>
            <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
        </div>
    </div>


    <!-- Profile Settings Tab -->
    <div class="tab-pane fade show active" id="profile">
        <h5 class="fw-bold">Profile Information</h5>

        <div class="row">
            <div class="col-md-6">
                <label class="fw-bold">Language Spoken</label>
                <select class="form-select">
                    <option selected>Select...</option>
                    <option>English</option>
                    <option>Spanish</option>
                    <option>French</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Date of Birth</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="dd/mm/yyyy">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label class="fw-bold">Gender</label>
                <select class="form-select">
                    <option selected>Select...</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Marital Status</label>
                <select class="form-select">
                    <option selected>Select...</option>
                    <option>Single</option>
                    <option>Married</option>
                    <option>Divorced</option>
                </select>
            </div>
        </div>

        <!-- Work Experience Section -->
        <div class="mt-5">
            <h5 class="fw-bold">Work Experience (START FROM PRESENT EMPLOYMENT)</h5>

            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bold">Company</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Address</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Position</label>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label class="fw-bold">Salary</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="fw-bold">Date From</label>
                    <input type="text" class="form-control" placeholder="MM YYYY">
                </div>
                <div class="col-md-2">
                    <label class="fw-bold">Date To</label>
                    <input type="text" class="form-control" placeholder="MM YYYY">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-primary w-100">+ Add Another</button>
                </div>
            </div>
        </div>

        <!-- Educational Attainment Section -->
        <div class="mt-5">
            <h5 class="fw-bold">Educational Attainment</h5>

            <div class="row fw-bold">
                <div class="col-md-3">Name of School</div>
                <div class="col-md-3">Location</div>
                <div class="col-md-3">Inclusive Year From - To</div>
                <div class="col-md-3">Course</div>
            </div>

            <!-- Elementary -->
            <div class="row mt-2">
                <div class="col-md-3">
                    <label class="fw-bold text-danger">Elementary *</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="YYYY - YYYY">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
            </div>

            <!-- High School -->
            <div class="row mt-2">
                <div class="col-md-3">
                    <label class="fw-bold text-danger">High School *</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="YYYY - YYYY">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
            </div>

            <!-- College -->
            <div class="row mt-2">
                <div class="col-md-3">
                    <label class="fw-bold">College</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="YYYY - YYYY">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
            </div>

            <!-- Others -->
            <div class="row mt-2">
                <div class="col-md-3">
                    <label class="fw-bold">Others</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="YYYY - YYYY">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>

        <!-- Applicant Signature Upload -->
        <div class="mt-5">
            <h5 class="fw-bold">Applicant Signature</h5>
            <div class="border rounded p-3 text-center d-flex flex-column align-items-center justify-content-center" 
                style="height: 100px; position: relative;">
                <input type="file" id="signatureUpload" class="d-none">
                <label for="signatureUpload" class="w-100 h-100 d-flex flex-column align-items-center justify-content-center cursor-pointer">
                    <i class="bi bi-cloud-upload fs-3 text-muted"></i>
                    <p class="small text-muted">Upload your signature</p>
                </label>
                <img id="signaturePreview" src="" class="img-fluid mt-2 d-none" style="max-width: 200px;">
            </div>
        </div>

        <!-- Save Changes Button at the End -->
        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </div>


                    <!-- Social Links Tab -->
                    <div class="tab-pane fade" id="social">
                        <h5 class="fw-bold">Social Links</h5>

                        <form id="socialLinksForm">
                            <div id="socialLinksContainer">
                                <!-- Social Link 1 -->
                                <div class="mb-3 d-flex align-items-center border p-3 rounded">
                                    <i class="bi bi-facebook fs-4 text-primary me-2"></i>
                                    <select class="form-select w-auto me-2">
                                        <option selected>Facebook</option>
                                        <option>Twitter</option>
                                        <option>Instagram</option>
                                        <option>YouTube</option>
                                        <option>LinkedIn</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Profile link/url...">
                                    <button type="button" class="btn btn-light ms-2">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>

                                <!-- Social Link 2 -->
                                <div class="mb-3 d-flex align-items-center border p-3 rounded">
                                    <i class="bi bi-twitter fs-4 text-info me-2"></i>
                                    <select class="form-select w-auto me-2">
                                        <option>Facebook</option>
                                        <option selected>Twitter</option>
                                        <option>Instagram</option>
                                        <option>YouTube</option>
                                        <option>LinkedIn</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Profile link/url...">
                                    <button type="button" class="btn btn-light ms-2">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>

                                <!-- Social Link 3 -->
                                <div class="mb-3 d-flex align-items-center border p-3 rounded">
                                    <i class="bi bi-instagram fs-4 text-danger me-2"></i>
                                    <select class="form-select w-auto me-2">
                                        <option>Facebook</option>
                                        <option>Twitter</option>
                                        <option selected>Instagram</option>
                                        <option>YouTube</option>
                                        <option>LinkedIn</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Profile link/url...">
                                    <button type="button" class="btn btn-light ms-2">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>

                                <!-- Social Link 4 -->
                                <div class="mb-3 d-flex align-items-center border p-3 rounded">
                                    <i class="bi bi-youtube fs-4 text-danger me-2"></i>
                                    <select class="form-select w-auto me-2">
                                        <option>Facebook</option>
                                        <option>Twitter</option>
                                        <option>Instagram</option>
                                        <option selected>YouTube</option>
                                        <option>LinkedIn</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Profile link/url...">
                                    <button type="button" class="btn btn-light ms-2">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Add New Social Link Button -->
                            <div class="text-center border p-3 rounded bg-light" id="addSocialLink">
                                <i class="bi bi-plus-circle"></i> Add New Social Link
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>


                    <!-- Account Settings Tab -->
    <div class="tab-pane fade" id="account">
        <h5 class="fw-bold">Account Settings</h5>

        <!-- Contact Info Section -->
        <div class="mt-4">
            <h6 class="fw-bold">Contact Info</h6>
            <div class="mb-3">
                <label class="fw-bold">Map Location</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="mb-3 d-flex align-items-center">
                <label class="fw-bold me-2">Phone</label>
                <select class="form-select w-auto me-2">
                    <option selected>+880</option>
                    <option>+63</option>
                    <option>+91</option>
                    <option>+44</option>
                </select>
                <input type="text" class="form-control" placeholder="Phone number..">
            </div>
            <div class="mb-3">
                <label class="fw-bold">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Email address">
                </div>
            </div>
            <button class="btn btn-primary">Save Changes</button>
        </div>

        <!-- Notification Section -->
        <div class="mt-5">
            <h6 class="fw-bold">Notification</h6>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" checked>
                <label class="form-check-label">Notify me when employers shortlisted me</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">Notify me when employers saved my profile</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" checked>
                <label class="form-check-label">Notify me when my applied jobs are expired</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" checked>
                <label class="form-check-label">Notify me when I have up to 5 job alerts</label>
            </div>
            <button class="btn btn-primary mt-3">Save Changes</button>
        </div>

        <!-- Job Alerts Section -->
        <div class="mt-5">
            <h6 class="fw-bold">Job Alerts</h6>
            <div class="row">
                <div class="col-md-6">
                    <label class="fw-bold">Role</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                        <input type="text" class="form-control" placeholder="Your job roles">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Location</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                        <input type="text" class="form-control" placeholder="City, state, country name">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Save Changes</button>
        </div>

        <!-- Privacy Section -->
        <div class="mt-5">
            <h6 class="fw-bold">Profile Privacy</h6>
            <div class="d-flex align-items-center">
                <span class="me-2">YES</span>
                <input type="checkbox" class="form-check-input me-2" checked>
                <span>Your profile is public now</span>
            </div>

            <h6 class="fw-bold mt-3">Resume Privacy</h6>
            <div class="d-flex align-items-center">
                <span class="me-2">NO</span>
                <input type="checkbox" class="form-check-input me-2">
                <span>Your resume is private now</span>
            </div>
        </div>

        <!-- Change Password Section -->
        <div class="mt-5">
            <h6 class="fw-bold">Change Password</h6>
            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bold">Current Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Password">
                        <span class="input-group-text"><i class="bi bi-eye"></i></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Password">
                        <span class="input-group-text"><i class="bi bi-eye"></i></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Password">
                        <span class="input-group-text"><i class="bi bi-eye"></i></span>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Save Changes</button>
        </div>

        <!-- Delete Account Section -->
        <div class="mt-5">
            <h6 class="fw-bold">Delete Your Account</h6>
            <p class="text-muted">
                If you delete your JobPilot account, you will no longer be able to get information about the matched jobs, 
                following employers, and job alerts. You will be abandoned from all services.
            </p>
            <button class="btn btn-danger"><i class="bi bi-x-circle"></i> Close Account</button>
        </div>
    </div>



                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            <!-- JavaScript for Dynamic Social Links -->
        <script>
            document.getElementById("addSocialLink").addEventListener("click", function () {
                const socialLinksContainer = document.getElementById("socialLinksContainer");

                // Create a new social link input group
                const newSocialLink = document.createElement("div");
                newSocialLink.classList.add("social-link", "mb-3", "d-flex", "align-items-center", "border", "p-3", "rounded");

                newSocialLink.innerHTML = `
                    <i class="bi bi-facebook fs-4 text-primary me-2"></i>
                    <select class="form-select w-auto me-2 social-platform">
                        <option selected>Facebook</option>
                        <option>Twitter</option>
                        <option>Instagram</option>
                        <option>YouTube</option>
                        <option>LinkedIn</option>
                    </select>
                    <input type="text" class="form-control" placeholder="Profile link/url...">
                    <button type="button" class="btn btn-light ms-2 remove-social-link">
                        <i class="bi bi-x"></i>
                    </button>
                `;

                // Append to the container
                socialLinksContainer.appendChild(newSocialLink);

                // Add event listener for removing links
                newSocialLink.querySelector(".remove-social-link").addEventListener("click", function () {
                    newSocialLink.remove();
                });

                // Add event listener for updating the icon dynamically
                newSocialLink.querySelector(".social-platform").addEventListener("change", function () {
                    updateSocialIcon(newSocialLink);
                });
            });

            // Function to update the icon based on selected platform
            function updateSocialIcon(container) {
                const select = container.querySelector(".social-platform");
                const icon = container.querySelector("i");

                const socialIcons = {
                    "Facebook": "bi-facebook text-primary",
                    "Twitter": "bi-twitter text-info",
                    "Instagram": "bi-instagram text-danger",
                    "YouTube": "bi-youtube text-danger",
                    "LinkedIn": "bi-linkedin text-primary"
                };

                icon.className = `bi fs-4 me-2 ${socialIcons[select.value]}`;
            }

            // Enable removal of existing social links
            document.querySelectorAll(".remove-social-link").forEach(button => {
                button.addEventListener("click", function () {
                    this.parentElement.remove();
                });
            });

            // Enable updating icons for existing select elements
            document.querySelectorAll(".social-platform").forEach(select => {
                select.addEventListener("change", function () {
                    updateSocialIcon(select.parentElement);
                });
            });
        </script>
    </body>
    </html>
