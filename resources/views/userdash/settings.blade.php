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

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/workforce.png') }}" class="rounded-circle me-2 img-fluid" style="width: 35px; height: 35px;" alt="Logo">
                <strong>WIEAS</strong>
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.index') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.jobopenings') }}">Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pinned</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.conference') }}">Conference</a></li>
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
<div class="tab-content mt-4">
    <div class="tab-pane fade show active" id="personal">
        <!-- Personal content here -->
        <h4 class="fw-bold">Basic Information</h4>

<div class="row">
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
                    <input type="text" class="form-control" placeholder="Full Name">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Salutation</label>
                    <select class="form-select">
                        <option selected>Select...</option>
                        <option>Mr.</option>
                        <option>Ms.</option>
                        <option>Mrs.</option>
                    </select>
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
                <input type="tel" class="form-control" placeholder="Enter contact number" oninput="validatePhoneInput(event)">
            </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-4 mb-3">
                    <label class="fw-bold">Region *</label>
                    <select name="region" class="form-control form-control-md" id="region" required>
                        <option value="">Select Region</option>
                        <!-- Region Options will be populated here -->
                    </select>
                </div>
                <div class="col-md-4 mb-3" id="province-container" style="display:none;">
                    <label class="fw-bold">Province *</label>
                    <select name="province" class="form-control form-control-md" id="province" required>
                        <option value="">Select Province</option>
                        <!-- Province Options will be populated here -->
                    </select>
                </div>
                <div class="col-md-4 mb-3" id="city-container" style="display:none;">
                    <label class="fw-bold">City / Municipality *</label>
                    <select name="city" class="form-control form-control-md" id="city" required>
                        <option value="">Select City / Municipality</option>
                        <!-- City Options will be populated here -->
                    </select>
                </div>
                <div class="col-md-4 mb-3" id="barangay-container" style="display:none;">
                    <label class="fw-bold">Barangay *</label>
                    <select name="barangay" class="form-control form-control-md" id="barangay" required>
                        <option value="">Select Barangay</option>
                        <!-- Barangay Options will be populated here -->
                    </select>
                </div>
                <div class="col-md-4 mb-3" id="street-container" style="display:none;">
                    <label class="fw-bold">Street (Optional)</label>
                    <input type="text" class="form-control form-control-md" name="street_text" id="street-text">
                </div>
            </div>


            <div class="row mt-3">
            <div class="col-md-4">
                <label class="fw-bold">Place of Birth</label>
                <input type="text" class="form-control" id="placeOfBirth" placeholder="ex// Marilao">
            </div>
            <div class="col-md-4">
                <label class="fw-bold">Date of Birth</label>
                <input type="date" class="form-control" id="dob" onchange="calculateAge()" placeholder="">
            </div>
            <div class="col-md-4">
                <label class="fw-bold">Age</label>
                <input type="text" class="form-control" id="age" placeholder="" readonly>
            </div>
                <div class="col-md-4">
                <label class="fw-bold">Religion</label>
                    <select class="form-select">
                        <option selected>Select...</option>
                        <option>Roman Catholic</option>
                        <option>Islam</option>
                        <option>Iglesia ni Cristo</option>
                        <option>Seventh Day Adventist</option>
                        <option>Aglipay</option>
                        <option>Iglesia Filipina Independiente</option>
                        <option>Bible Baptist Church</option>
                        <option>Jehovah's Witness</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                <label class="fw-bold">Passport No:</label>
                <input type="tel" class="form-control" placeholder="Enter Passport Number" oninput="validatePhoneInput(event)">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Date of Issue</label>
                    <input type="date" class="form-control" placeholder="">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Place of Issue</label>
                    <input type="text" class="form-control" placeholder="ex// Cabanatuan" oninput="validateTextInput(event)">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label class="fw-bold">Name of Spouse</label>
                    <input type="text" class="form-control" placeholder="ex// wife/partner" oninput="validateTextInput(event)">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Occupation</label>
                    <input type="text" class="form-control" placeholder="ex// work" oninput="validateTextInput(event)">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Name(s) of Children</label>
                    <div id="childrenFields">
                        <!-- Initially no children input field -->
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addChild()">+</button>
                </div>


            <div class="row mt-3">

                <div class="col-md-6">
                    <label class="fw-bold">Name of Father</label>
                    <input type="text" class="form-control" placeholder="Enter Father's Name" oninput="validateTextInput(event)">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Name of Mother</label>
                    <input type="text" class="form-control" placeholder="Enter Mother's Name" oninput="validateTextInput(event)">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="fw-bold">Person to Notify in Case of Emergency</label>
                    <input type="text" class="form-control" placeholder="ex// Father name">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Relationship</label>
                    <select class="form-select">
                        <option selected>Select...</option>
                        <option>Father</option>
                        <option>Mother</option>
                        <option>Guardian</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
            <div class="col-md-6">
                <label class="fw-bold">Contact</label>
                <input type="text" class="form-control" placeholder="Contact No:" required id="contact-input">
            </div>
                <div class="col-md-6">
                    <label class="fw-bold">Address</label>
                    <input type="text" class="form-control" placeholder="ex// Cabanatuan">
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
    </div>
    <div class="tab-pane fade" id="profile">
        <!-- Profile content here -->
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

    
    </div>
    <div class="tab-pane fade" id="social">
        <!-- Social content here -->
        <div class="tab-pane fade show active" id="social">
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


    </div>
    <div class="tab-pane fade" id="account">
        <!-- Account content here -->
        <div class="tab-pane fade show active" id="account">
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

            document.getElementById('contact-input').addEventListener('input', function(e) {
    // Only allow numbers
    this.value = this.value.replace(/[^0-9]/g, '');
});

const regions = {
    "Region 3": {
        provinces: {
            "Aurora": {
                cities: {
                    "Baler": ["Barangay 1", "Barangay 2", "Barangay 3"],
                    "Casiguran": ["Barangay A", "Barangay B", "Barangay C"],
                    "Dingalan": ["Barangay X", "Barangay Y", "Barangay Z"],
                    "Maria Aurora": ["Barangay P", "Barangay Q", "Barangay R"],
                    "Dilasag": ["Barangay I", "Barangay II", "Barangay III"],
                    "San Luis": ["Barangay L", "Barangay M", "Barangay N"],
                    "Dipaculao": ["Barangay D1", "Barangay D2", "Barangay D3"],
                    "Dinalungan": ["Barangay E1", "Barangay E2", "Barangay E3"],
                    "Aurora": ["Barangay F1", "Barangay F2", "Barangay F3"]
                }
            },
            "Bataan": {
                cities: {
                    "Balanga": ["Barangay 1", "Barangay 2", "Barangay 3"],
                    "Mariveles": ["Barangay A", "Barangay B", "Barangay C"],
                    "Bagac": ["Barangay X", "Barangay Y", "Barangay Z"],
                    "Dinalupihan": ["Barangay P", "Barangay Q", "Barangay R"],
                    "Moron": ["Barangay I", "Barangay II", "Barangay III"],
                    "Orion": ["Barangay L", "Barangay M", "Barangay N"],
                    "Pilar": ["Barangay D1", "Barangay D2", "Barangay D3"]
                }
            },
            "Bulacan": {
                cities: {
                    "Malolos": ["Barangay 1", "Barangay 2", "Barangay 3"],
                    "Baliuag": ["Barangay A", "Barangay B", "Barangay C"],
                    "Meycauayan": ["Barangay X", "Barangay Y", "Barangay Z"],
                    "Marilao": ["Barangay P", "Barangay Q", "Barangay R"],
                    "Calumpit": ["Barangay I", "Barangay II", "Barangay III"],
                    "Doña Remedios Trinidad": ["Barangay L", "Barangay M", "Barangay N"],
                    "San Ildefonso": ["Barangay D1", "Barangay D2", "Barangay D3"],
                    "San Miguel": ["Barangay E1", "Barangay E2", "Barangay E3"],
                    "San Rafael": ["Barangay F1", "Barangay F2", "Barangay F3"]
                }
            },
            "Nueva Ecija": {
                cities: {
                    "Aliaga": ["Barangay 1", "Barangay 2", "Barangay 3"],
                    "Palayan City": ["Barangay A", "Barangay B", "Barangay C"],
                    "Gapan City": ["Barangay X", "Barangay Y", "Barangay Z"],
                    "Cabanatuan City": ["Bitas", "Daan Sarile", "Valdefuente"],
                    "Bungabon": ["Barangay I", "Barangay II", "Barangay III"],
                    "Carranglan": ["Barangay L", "Barangay M", "Barangay N"],
                    "Talavera": ["Barangay D1", "Barangay D2", "Barangay D3"],
                    "San Antonio": ["Barangay E1", "Barangay E2", "Barangay E3"]
                }
            },
            "Pampanga": {
                cities: {
                    "Angeles": ["Barangay 1", "Barangay 2", "Barangay 3"],
                    "Arayat": ["Barangay A", "Barangay B", "Barangay C"],
                    "Bacolor": ["Barangay X", "Barangay Y", "Barangay Z"],
                    "San Fernando": ["Barangay P", "Barangay Q", "Barangay R"],
                    "Mabalacat": ["Barangay I", "Barangay II", "Barangay III"],
                    "Guagua": ["Barangay L", "Barangay M", "Barangay N"],
                    "Porac": ["Barangay D1", "Barangay D2", "Barangay D3"]
                }
            },
            "Tarlac": {
                cities: {
                    "Anao": ["Barangay 1", "Barangay 2", "Barangay 3"],
                    "Bamban": ["Barangay A", "Barangay B", "Barangay C"],
                    "Camiling": ["Barangay X", "Barangay Y", "Barangay Z"],
                    "Capas": ["Barangay P", "Barangay Q", "Barangay R"],
                    "Concepcion": ["Barangay I", "Barangay II", "Barangay III"],
                    "Gerona": ["Barangay L", "Barangay M", "Barangay N"],
                    "La Paz": ["Barangay D1", "Barangay D2", "Barangay D3"],
                    "Mayantoc": ["Barangay E1", "Barangay E2", "Barangay E3"]
                }
            },
            "Zambales": {
                cities: {
                    "Botolan": ["Barangay 1", "Barangay 2", "Barangay 3"],
                    "Palauig": ["Barangay A", "Barangay B", "Barangay C"],
                    "San Antonio": ["Barangay X", "Barangay Y", "Barangay Z"],
                    "Santa Cruz": ["Barangay P", "Barangay Q", "Barangay R"],
                    "Olongapo": ["Barangay I", "Barangay II", "Barangay III"],
                    "Calapacuan": ["Barangay L", "Barangay M", "Barangay N"],
                    "Cabangan": ["Barangay D1", "Barangay D2", "Barangay D3"],
                    "Mansiloc": ["Barangay E1", "Barangay E2", "Barangay E3"]
                }
            }
        }
    },
    "Region 1": {
        provinces: {
            "Pangasinan": {
                cities: {
                    "Lingayen": ["Barangay 1", "Barangay 2", "Barangay 3"],
                    "Dagupan": ["Barangay A", "Barangay B", "Barangay C"],
                    "Alaminos": ["Barangay X", "Barangay Y", "Barangay Z"]
                }
            }
        }
    },
};

// Populate the region dropdown
document.addEventListener("DOMContentLoaded", function () {
    const regionSelect = document.getElementById("region");

    Object.keys(regions).forEach(region => {
        const option = document.createElement("option");
        option.value = region;
        option.textContent = region;
        regionSelect.appendChild(option);
    });

    regionSelect.addEventListener("change", function () {
        const selectedRegion = this.value;
        const provinceContainer = document.getElementById("province-container");
        const cityContainer = document.getElementById("city-container");
        const barangayContainer = document.getElementById("barangay-container");
        const streetContainer = document.getElementById("street-container");

        // Hide all dependent fields initially
        provinceContainer.style.display = "none";
        cityContainer.style.display = "none";
        barangayContainer.style.display = "none";
        streetContainer.style.display = "none";

        // Clear existing options
        document.getElementById("province").innerHTML = '<option value="">Select Province</option>';
        document.getElementById("city").innerHTML = '<option value="">Select City / Municipality</option>';
        document.getElementById("barangay").innerHTML = '<option value="">Select Barangay</option>';

        if (selectedRegion) {
            // Show province dropdown
            provinceContainer.style.display = "block";
            const provinces = regions[selectedRegion].provinces;
            Object.keys(provinces).forEach(province => {
                const option = document.createElement("option");
                option.value = province;
                option.textContent = province;
                document.getElementById("province").appendChild(option);
            });
        }
    });

    document.getElementById("province").addEventListener("change", function () {
        const selectedRegion = document.getElementById("region").value;
        const selectedProvince = this.value;
        const cityContainer = document.getElementById("city-container");
        const barangayContainer = document.getElementById("barangay-container");
        const streetContainer = document.getElementById("street-container");

        // Hide city and barangay fields initially
        cityContainer.style.display = "none";
        barangayContainer.style.display = "none";
        streetContainer.style.display = "none";

        // Clear existing options
        document.getElementById("city").innerHTML = '<option value="">Select City / Municipality</option>';
        document.getElementById("barangay").innerHTML = '<option value="">Select Barangay</option>';

        if (selectedProvince) {
            // Show city dropdown
            cityContainer.style.display = "block";
            const cities = regions[selectedRegion].provinces[selectedProvince].cities;
            Object.keys(cities).forEach(city => {
                const option = document.createElement("option");
                option.value = city;
                option.textContent = city;
                document.getElementById("city").appendChild(option);
            });
        }
    });

    document.getElementById("city").addEventListener("change", function () {
        const selectedRegion = document.getElementById("region").value;
        const selectedProvince = document.getElementById("province").value;
        const selectedCity = this.value;
        const barangayContainer = document.getElementById("barangay-container");
        const streetContainer = document.getElementById("street-container");

        // Hide barangay and street fields initially
        barangayContainer.style.display = "none";
        streetContainer.style.display = "none";

        // Clear existing options
        document.getElementById("barangay").innerHTML = '<option value="">Select Barangay</option>';

        if (selectedCity) {
            // Show barangay dropdown
            barangayContainer.style.display = "block";
            const barangays = regions[selectedRegion].provinces[selectedProvince].cities[selectedCity];
            barangays.forEach(barangay => {
                const option = document.createElement("option");
                option.value = barangay;
                option.textContent = barangay;
                document.getElementById("barangay").appendChild(option);
            });
        }
    });

    document.getElementById("barangay").addEventListener("change", function () {
        const selectedBarangay = this.value;
        const streetContainer = document.getElementById("street-container");

        // Show street input if barangay is selected
        if (selectedBarangay) {
            streetContainer.style.display = "block";
        }
    });
});


</script>

<script>
    function calculateAge() {
        var dob = document.getElementById('dob').value;
        if (dob) {
            var birthDate = new Date(dob);
            var currentDate = new Date();
            var age = currentDate.getFullYear() - birthDate.getFullYear();
            var month = currentDate.getMonth() - birthDate.getMonth();
            if (month < 0 || (month === 0 && currentDate.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        }
    }
    // Function to validate text input (prevent numbers)
function validateTextInput(event) {
    const input = event.target;
    // Remove any non-alphabetical characters
    input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
}
// Function to validate phone input (only allow numbers)
function validatePhoneInput(event) {
    const input = event.target;
    // Allow only numbers
    input.value = input.value.replace(/[^0-9]/g, '');
}


</script>

<script>
    // Function to add a new child input field
    function addChild() {
        const childrenFields = document.getElementById('childrenFields');
        
        // Create the new input field and delete button
        const div = document.createElement('div');
        div.classList.add('input-group', 'mb-3');
        
        const input = document.createElement('input');
        input.type = 'text';
        input.classList.add('form-control');
        input.placeholder = 'Enter child name';
        
        const deleteButton = document.createElement('button');
        deleteButton.type = 'button';
        deleteButton.classList.add('btn', 'btn-danger');
        deleteButton.textContent = '-';
        
        // Delete the field when the delete button is clicked
        deleteButton.onclick = function() {
            div.remove();
        };
        
        // Append the input field and delete button to the div
        const inputGroupAppend = document.createElement('div');
        inputGroupAppend.classList.add('input-group-append');
        inputGroupAppend.appendChild(deleteButton);
        
        // Append elements to the input group div
        div.appendChild(input);
        div.appendChild(inputGroupAppend);
        
        // Append the div to the container
        childrenFields.appendChild(div);
    }
</script>

    </body>
    </html>
