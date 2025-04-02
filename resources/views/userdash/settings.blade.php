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
                <li class="nav-item"><a class="nav-link" href="{{ route('userdash.pinned') }}">Pinned</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('userdash.conference') }}">Conference</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('feedback.create') }}">Feedback</a></li>
            </ul>
        </div>
        <div class="d-flex align-items-center">
            <i class="bi bi-bell me-3 text-primary"></i>
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/bogart.jpg') }}" class="rounded-circle me-2 img-fluid" style="width: 40px; height: 40px;" alt="User Profile">
                <div>
                <span class="d-block fw-bold">{{ session('applicant')->first_name }} {{ session('applicant')->last_name }} </span>                            <small class="text-muted">{{ session('applicant')->email }}</small>
                    </div>
                    <div class="dropdown">
                <i class="ms-2 dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('userdash.settings') }}">Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('signin.index') }}">Logout</a></li>
                </ul>
            </div>
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
                        <i class="bi bi-person-badge"></i> Professional
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
                    <form id="profileForm" action="{{ route('userdash.storeUserProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <form id="form" onsubmit="return validateForm()">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="fw-bold mt-3">Profile Picture</label>
                                <div class="border rounded text-center p-3 mt-3 d-flex flex-column align-items-center justify-content-center" style="height: 150px; position: relative;">
                                    <!-- Restrict file input to images only (JPEG, PNG, GIF) -->
                                    <input type="file" id="profileUpload" class="d-none" accept="image/*" name="profile_picture" required>
                                    <label for="profileUpload" class="w-100 h-100 d-flex flex-column align-items-center justify-content-center cursor-pointer">
                                        <i class="bi bi-cloud-upload fs-3 text-muted"></i>
                                        <p id="uploadText" class="small text-muted">Browse photo or drop here</p>
                                        <small id="uploadInfo" class="text-muted">A photo larger than 400 pixels works best. Max photo size 5 MB.</small>
                                    </label>
                                    <!-- Preview image after uploading -->
                                    <img id="profilePreview" src="" class="img-fluid rounded-circle mt-2 d-none" style="width: 100px; height: 100px; object-fit: cover;">
                                </div>
                                <div id="imageError" class="text-danger mt-2" style="display: none;">Please upload a valid image file (JPG, PNG, GIF) under 5 MB.</div>
                            </div>

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="fw-bold">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" placeholder="Full Name" value="{{ session('applicant')->first_name }} {{ session('applicant')->last_name }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="fw-bold">Salutation</label>
                                        <select name="salutation" class="form-select" required>
                                            <option value="" disabled selected>Select...</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Mrs.">Mrs.</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="fw-bold">Gender</label>
                                        <select name="gender" class="form-select" required>
                                            <option value="" disabled selected>Select...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="fw-bold">Marital Status</label>
                                        <select name="marital_status" class="form-select" required onchange="toggleSpouseFields()">
                                            <option value="" disabled selected>Select...</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Single Parent</option>
                                            <option value="Married">Married</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label class="fw-bold">Experience</label>
                                            <select name="experience" class="form-select" required>
                                                <option value="" disabled selected>Select...</option>
                                                <option value="Less than 1 year">Less than 1 year</option>
                                                <option value="1-3 years">1-3 years</option>
                                                <option value="3-5 years">3-5 years</option>
                                                <option value="5+ years">5+ years</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold">Education</label>
                                            <select name="education" class="form-select" required>
                                                <option value="" disabled selected>Select...</option>
                                                <option value="High School">High School</option>
                                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                                <option value="Master's Degree">Master's Degree</option>
                                                <option value="PhD">PhD</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <!-- Email Address -->
                                        <div class="col-md-6">
                                            <label class="fw-bold">Email Address</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                                <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ session('applicant')->email }}" required>
                                            </div>
                                        </div>

                                        <!-- Contact -->
                                        <div class="col-md-6">
                                            <label class="fw-bold">Contact</label>
                                            <input type="tel" class="form-control" placeholder="Enter contact number" name="contact" required oninput="validatePhoneInput(event)">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-4 mb-3">
                                            <label class="fw-bold">Region *</label>
                                            <select name="region" class="form-control form-control-md" id="region" required>
                                                <option value="" disabled selected>Select Region</option>

                                            </select>
                                        </div>

                                        <!-- Province Dropdown (Initially hidden) -->
                                        <div class="col-md-4 mb-3" id="province-container" style="display:none;">
                                            <label class="fw-bold">Province *</label>
                                            <select name="province" class="form-control form-control-md" id="province" required>
                                                <option value="" disabled selected>Select Province</option>
                                            </select>
                                        </div>

                                        <!-- City / Municipality Dropdown (Initially hidden) -->
                                        <div class="col-md-4 mb-3" id="city-container" style="display:none;">
                                            <label class="fw-bold">City / Municipality *</label>
                                            <select name="city" class="form-control form-control-md" id="city" required>
                                                <option value="" disabled selected>Select City / Municipality</option>
                                            </select>
                                        </div>

                                        <!-- Barangay Dropdown (Initially hidden) -->
                                        <div class="col-md-4 mb-3" id="barangay-container" style="display:none;">
                                            <label class="fw-bold">Barangay *</label>
                                            <select name="barangay" class="form-control form-control-md" id="barangay" required>
                                                <option value="" disabled selected>Select Barangay</option>
                                            </select>
                                        </div>

                                        <!-- Street Input (Initially hidden) -->
                                        <div class="col-md-4 mb-3" id="street-container" style="display:none;">
                                            <label class="fw-bold">Street *</label>
                                            <input type="text" class="form-control form-control-md" name="street" id="street-text" required>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <!-- Place of Birth -->
                                        <div class="col-md-4">
                                            <label class="fw-bold">Place of Birth</label>
                                            <input type="text" class="form-control" name="place_of_birth" id="placeOfBirth" placeholder="e.g. Bulacan" required>
                                        </div>

                                        <!-- Date of Birth -->
                                        <div class="col-md-4">
                                            <label class="fw-bold">Date of Birth</label>
                                            <input type="date" class="form-control" name="dob" id="dob" onchange="calculateAge()" required>
                                        </div>

                                        <!-- Age -->
                                        <div class="col-md-4">
                                            <label class="fw-bold">Age</label>
                                            <input type="text" class="form-control" id="age" placeholder="" readonly>
                                        </div>

                                        <!-- Religion -->
                                        <div class="col-md-4">
                                            <label class="fw-bold">Religion</label>
                                            <input type="text" class="form-control" name="religion" placeholder="e.g. Roman Catholic" required oninput="validateTextInput(event)">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <!-- Passport Number -->
                                        <div class="col-md-4">
                                            <label class="fw-bold">Passport No:</label>
                                            <input type="tel" class="form-control" name="passport_no" placeholder="Enter Passport Number" required oninput="validatePhoneInput(event)">
                                        </div>

                                        <!-- Date of Issue -->
                                        <div class="col-md-4">
                                            <label class="fw-bold">Date of Issue</label>
                                            <input type="date" class="form-control" name="passport_date_of_issue" required>
                                        </div>

                                        <!-- Place of Issue -->
                                        <div class="col-md-4">
                                            <label class="fw-bold">Place of Issue</label>
                                            <input type="text" class="form-control" name="passport_place_of_issue" placeholder="e.g. Pampanga" required oninput="validateTextInput(event)">
                                        </div>
                                    </div>

                                    <div class="row mt-3" id="spouseFieldsContainer">
                                        <!-- Name of Spouse -->
                                        <div class="col-md-4">
                                            <label class="fw-bold">Name of Spouse</label>
                                            <input type="text" class="form-control" name="spouse_name" placeholder="e.g. name of husband or wife" required oninput="validateTextInput(event)">
                                        </div>

                                        <!-- Occupation -->
                                        <div class="col-md-4">
                                            <label class="fw-bold">Occupation</label>
                                            <input type="text" class="form-control" name="spouse_occupation" placeholder="e.g. current work" required oninput="validateTextInput(event)">
                                        </div>

                                        <!-- Name(s) of Children -->
                                        <div class="col-md-4">
                                            <label class="fw-bold">Name(s) of Children</label>
                                            <div id="childrenFields" required>
                                                <!-- Initially no children input field -->
                                            </div>
                                            <button type="button" class="btn btn-primary" onclick="addChild()">+</button>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <!-- Name of Father -->
                                        <div class="col-md-6">
                                            <label class="fw-bold">Name of Father</label>
                                            <input type="text" class="form-control" name="father_name" placeholder="Enter Father's Name" required oninput="validateTextInput(event)">
                                        </div>

                                        <!-- Name of Mother -->
                                        <div class="col-md-6">
                                            <label class="fw-bold">Name of Mother</label>
                                            <input type="text" class="form-control" name="mother_name" placeholder="Enter Mother's Name" required oninput="validateTextInput(event)">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <!-- Emergency Contact Person -->
                                        <div class="col-md-6">
                                            <label class="fw-bold">Person to Notify in Case of Emergency</label>
                                            <input type="text" class="form-control" name="emergency_contact" placeholder="e.g. name of guardian" required oninput="validateTextInput(event)">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold">Relationship</label>
                                            <select name="emergency_relationship" class="form-select" required>
                                                <option value="" disabled selected>Select...</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Spouse">Spouse</option>
                                                <option value="Guardian">Guardian</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <!-- Contact Number -->
                                        <div class="col-md-6">
                                            <label class="fw-bold">Contact</label>
                                            <input type="text" class="form-control" name="emergency_contact_number" placeholder="Contact No:" required id="contact-input" oninput="validatePhoneInput(event)">
                                        </div>

                                        <!-- Address -->
                                        <div class="col-md-6">
                                            <label class="fw-bold">Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="e.g. Cabanatuan City" required oninput="validateTextInput(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CV/Resume Section -->
                            <div class="mt-5">
                                <h5 class="fw-bold">Your CV/Resume, IDs, Birth Certificate, etc.</h5>

                                <div class="row mt-3">
                                    <!-- File Upload for Professional Resume -->
                                    <div class="col-md-6 mb-3">
                                        <div class="border p-3 rounded text-center cursor-pointer" onclick="document.getElementById('fileInput1').click()">
                                            <i class="bi bi-file-earmark-text fs-3"></i>
                                            <p class="mb-1">Professional Resume</p>
                                            <small id="fileName1">No file chosen</small>
                                            <div id="filePreview1"></div>
                                            <input type="file" id="fileInput1" class="file-input" style="display:none" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png" name="professional_resume" required onchange="handleFileUpload(this, 'fileName1', 'filePreview1')" />
                                        </div>
                                    </div>

                                    <!-- File Upload for Valid ID -->
                                    <div class="col-md-6 mb-3">
                                        <div class="border p-3 rounded text-center cursor-pointer" onclick="document.getElementById('fileInput2').click()">
                                            <i class="bi bi-file-earmark-text fs-3"></i>
                                            <p class="mb-1">Valid ID</p>
                                            <small id="fileName2">No file chosen</small>
                                            <div id="filePreview2"></div>
                                            <input type="file" id="fileInput2" class="file-input" style="display:none" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png" name="valid_id" required onchange="handleFileUpload(this, 'fileName2', 'filePreview2')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- File Upload for Passport -->
                                    <div class="col-md-6 mb-3">
                                        <div class="border p-3 rounded text-center cursor-pointer" onclick="document.getElementById('fileInput3').click()">
                                            <i class="bi bi-file-earmark-text fs-3"></i>
                                            <p class="mb-1">Passport</p>
                                            <small id="fileName3">No file chosen</small>
                                            <div id="filePreview3"></div>
                                            <input type="file" id="fileInput3" class="file-input" style="display:none" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png" name="passport" required onchange="handleFileUpload(this, 'fileName3', 'filePreview3')" />
                                        </div>
                                    </div>

                                    <!-- File Upload for Birth Certificate -->
                                    <div class="col-md-6 mb-3">
                                        <div class="border p-3 rounded text-center cursor-pointer" onclick="document.getElementById('fileInput4').click()">
                                            <i class="bi bi-file-earmark-text fs-3"></i>
                                            <p class="mb-1">Birth Certificate</p>
                                            <small id="fileName4">No file chosen</small>
                                            <div id="filePreview4"></div>
                                            <input type="file" id="fileInput4" class="file-input" style="display:none" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png" name="birth_certificate" required onchange="handleFileUpload(this, 'fileName4', 'filePreview4')" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
    <!-- Submit Button with New Name -->
    <div class="mt-4 text-end">
        <button type="submit" id="submitButton" class="btn btn-primary mt-4">Save</button>
    </div>
                </div>

                <div class="tab-pane fade" id="profile">
                    <!-- Combined Professional and Social content here -->
                    <h5 class="fw-bold">Professional Information</h5>
                    <form action="{{ route('userdash.storeApplicantProfession') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label class="fw-bold mb-2">Language Spoken</label>
                                <input type="text" class="form-control" placeholder="Enter language" name="language1" required oninput="validateTextInput(event)">
                            </div>
                        </div>

                        <div id="additional-languages"></div>

                        <button type="button" class="btn btn-primary mt-3" onclick="addLanguageField()">Add Another Language</button>

                        <!-- Work Experience Section -->
                        <div class="mt-5">
                            <h5 class="fw-bold">Work Experience (START FROM PRESENT EMPLOYMENT)</h5>

                            <div id="work-experience-container">
                                <!-- Original Work Experience (This should not have the Remove button initially) -->
                                <div class="row work-experience-item">
                                    <div class="col-md-4">
                                        <label class="fw-bold">Company</label>
                                        <input type="text" class="form-control" placeholder="Company" name="company" required oninput="validateTextInput(event)">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="fw-bold">References</label>
                                        <input type="text" class="form-control" placeholder="References" name="references" required oninput="validateTextInput(event)">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="fw-bold">Contact</label>
                                        <input type="tel" class="form-control" placeholder="Enter contact number" name="contact" required oninput="validatePhoneInput(event)">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="fw-bold">Address</label>
                                        <input type="text" class="form-control" placeholder="Address" name="address" required oninput="validateTextInput(event)">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="fw-bold">Position</label>
                                        <input type="text" class="form-control" placeholder="Position" name="position" required oninput="validateTextInput(event)">
                                    </div>
                                </div>

                                <div class="row mt-3 work-experience-item">
                                    <div class="col-md-3">
                                        <label class="fw-bold">Salary</label>
                                        <input type="tel" class="form-control" placeholder="Salary" name="salary" required oninput="validatePhoneInput(event)">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="fw-bold">Date From</label>
                                        <input type="month" class="form-control" name="date_from" required oninput="validateDate(this)">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="fw-bold">Date To</label>
                                        <input type="month" class="form-control" name="date_to" required oninput="validateDate(this)">
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-primary w-50 ms-2" onclick="addWorkExperience()" id="add-button" disabled>+</button>
                                    </div>
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
                                    <label class="fw-bold">Elementary</label>
                                    <input type="text" class="form-control" placeholder="School" name="school_name" required oninput="validateTextInput(event)">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <input type="text" class="form-control" placeholder="Location" name="location" required oninput="validateTextInput(event)">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <input type="tel" class="form-control" placeholder="YYYY-YYYY" name="inclusive_year" required oninput="formatYearInput(event)">
                                </div>
                            </div>

                            <!-- High School -->
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <label class="fw-bold">High School</label>
                                    <input type="text" class="form-control" placeholder="High School" name="school_name" required oninput="validateTextInput(event)">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <input type="text" class="form-control" placeholder="Location" name="location" required oninput="validateTextInput(event)">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <input type="tel" class="form-control" placeholder="YYYY-YYYY" name="inclusive_year" required oninput="formatYearInput(event)">
                                </div>
                            </div>

                            <!-- College -->
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <label class="fw-bold">College</label>
                                    <input type="text" class="form-control" placeholder="College" name="school_name" required oninput="validateTextInput(event)">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <input type="text" class="form-control" placeholder="Location" name="location" required oninput="validateTextInput(event)">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <input type="tel" class="form-control" placeholder="YYYY-YYYY" name="inclusive_year" required oninput="formatYearInput(event)">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <input type="text" class="form-control" placeholder="Course" name="course" required oninput="validateTextInput(event)">
                                </div>
                            </div>

                            <!-- Others -->
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <label class="fw-bold">Others</label>
                                    <input type="text" class="form-control" placeholder="Others" name="school_name" required oninput="validateTextInput(event)">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <input type="text" class="form-control" placeholder="Location" name="location" name="location" required oninput="validateTextInput(event)">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <input type="tel" class="form-control" placeholder="YYYY-YYYY" name="inclusive_year" required oninput="formatYearInput(event)">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <input type="text" class="form-control" placeholder="Course" name="course" required oninput="validateTextInput(event)">
                                </div>
                            </div>
                        </div>

                        <!-- Social Links Section -->
                        <div class="mt-5">
                            <h5 class="fw-bold">Social Links</h5>
                            <div id="socialLinksContainer">
                                <div class="mb-3 d-flex align-items-center border p-3 rounded">
                                    <i class="bi bi-facebook fs-4 text-primary me-2"></i>
                                    <select class="form-select w-auto me-2" name="social_links[0][platform]">
                                        <option selected>Facebook</option>
                                        <option>Twitter</option>
                                        <option>Instagram</option>
                                        <option>YouTube</option>
                                        <option>LinkedIn</option>
                                    </select>
                                    <input type="text" class="form-control" name="social_links[0][url]" placeholder="Profile link/url..." required>
                                    <button type="button" class="btn btn-light ms-2">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="button" id="addSocialLink" class="btn btn-primary mt-3">Add Another Social Link</button>
                        </div>

                        <!-- Applicant Signature Upload -->
                        <div class="mt-5">
                            <h5 class="fw-bold">Applicant Signature</h5>
                            <div class="border rounded p-3 text-center d-flex flex-column align-items-center justify-content-center" 
                                style="height: 100px; position: relative;">
                                <input type="file" id="signatureUpload" name="signature" class="d-none" accept="image/*">
                                <label for="signatureUpload" class="w-100 h-100 d-flex flex-column align-items-center justify-content-center cursor-pointer">
                                    <i id="uploadIcon" class="bi bi-cloud-upload fs-3 text-muted"></i>
                                    <p id="uploadText" class="small text-muted">Upload your signature</p>
                                </label>
                                <img id="signaturePreview" src="" class="img-fluid mt-2 d-none" style="max-width: 200px;">
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="account">
                    <!-- Account content here -->
                    <h5 class="fw-bold">Account Settings</h5>

                    <!-- Contact Info Section -->
                    <div class="mb-3">
                        <label class="fw-bold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ session('applicant')->email }}" required>
                        </div>
                    </div>
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
                            <div class="mt-4  text-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Updated regions data with complete Central Luzon (Region 3) information
        const regions = {
            "Region 3": {
                "provinces": {
                    "Aurora": {
                        "cities": {
                            "Baler": ["Barangay 1", "Barangay 2", "Barangay 3"],
                            "Casiguran": ["Barangay A", "Barangay B", "Barangay C"],
                            "Dingalan": ["Barangay X", "Barangay Y", "Barangay Z"],
                            "Maria Aurora": ["Barangay P", "Barangay Q", "Barangay R"],
                            "Dilasag": ["Barangay I", "Barangay II", "Barangay III"],
                            "San Luis": ["Barangay L", "Barangay M", "Barangay N"],
                            "Dipaculao": ["Barangay D1", "Barangay D2", "Barangay D3"],
                            "Dinalungan": ["Barangay E1", "Barangay E2", "Barangay E3"]
                        }
                    },
                    "Bataan": {
                        "cities": {
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
                        "cities": {
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
                        "cities": {
                            "Palayan City": ["Barangay 1", "Barangay 2", "Barangay 3"],
                            "Cabanatuan City": [
                                "Aduas Centro", "Aduas Norte", "Aduas Sur", "Bagong Buhay", "Bagong Sikat",
                                "Bakero", "Bakod Bayan", "Balite", "Bangad", "Bantug Bulalo", "Bantug Norte",
                                "Barlis", "Barrera District", "Bernardo District", "Bitas", "Bonifacio District",
                                "Buliran", "Caalibangbangan", "Cabu", "Calawagan", "Campo Tinio", "Caridad",
                                "Caudillo", "Cinco-Cinco", "City Supermarket", "Communal", "Cruz Roja",
                                "Daang Sarile", "Dalampang", "Dicarma", "Dimasalang", "Dionisio S. Garcia",
                                "Fatima", "General Luna", "Hermogenes C. Concepcion, Sr.", "Ibabao-Bana",
                                "Imelda District", "Isla", "Kalikid Norte", "Kalikid Sur", "Kapitan Pepe Subdivision",
                                "Lagare", "Lourdes", "M. S. Garcia", "Mabini Extension", "Mabini Homesite",
                                "Macatbong", "Magsaysay Norte", "Magsaysay Sur", "Maria Theresa", "Matadero",
                                "Mayapyap Norte", "Mayapyap Sur", "Melojavilla", "Nabao", "Obrero",
                                "Padre Burgos", "Padre Crisostomo", "Pagas", "Palagay", "Pamaldan",
                                "Pangatian", "Patalac", "Polilio", "Pula", "Quezon District", "Rizdelis",
                                "Samon", "San Isidro", "San Josef Norte", "San Josef Sur", "San Juan Poblacion",
                                "San Roque Norte", "San Roque Sur", "Sanbermecristi", "Sangitan", "Sangitan East",
                                "Santa Arcadia", "Santo Niño", "Sapang", "Sumacab Este", "Sumacab Norte",
                                "Sumacab South", "Talipapa", "Valdefuente", "Valle Cruz", "Vijandre District",
                                "Villa Ofelia-Caridad", "Zulueta District"
                            ],
                            "San Jose City": ["Barangay 1", "Barangay 2", "Barangay 3"],
                            "Pantabangan": ["Barangay A", "Barangay B", "Barangay C"],
                            "Gapan City": ["Barangay X", "Barangay Y", "Barangay Z"],
                            "Cuyapo": ["Barangay P", "Barangay Q", "Barangay R"],
                            "Cabiao": ["Barangay I", "Barangay II", "Barangay III"],
                            "San Isidro": ["Barangay L", "Barangay M", "Barangay N"],
                            "General Tinio": ["Barangay D1", "Barangay D2", "Barangay D3"],
                            "Bongabon": ["Barangay E1", "Barangay E2", "Barangay E3"],
                            "Aliaga": ["Barangay F1", "Barangay F2", "Barangay F3"],
                            "Licab": ["Barangay G1", "Barangay G2", "Barangay G3"],
                            "Lupao": ["Barangay H1", "Barangay H2", "Barangay H3"],
                            "Gabaldon": ["Barangay J1", "Barangay J2", "Barangay J3"],
                            "Carranglan": ["Barangay K1", "Barangay K2", "Barangay K3"],
                            "Talavera": ["Barangay M1", "Barangay M2", "Barangay M3"],
                            "Guimba": ["Barangay N1", "Barangay N2", "Barangay N3"],
                            "San Leonardo": ["Barangay O1", "Barangay O2", "Barangay O3"],
                            "Jaen": ["Barangay P1", "Barangay P2", "Barangay P3"],
                            "Laur": ["Barangay Q1", "Barangay Q2", "Barangay Q3"],
                            "Nampicuan": ["Barangay R1", "Barangay R2", "Barangay R3"],
                            "Talugtug": ["Barangay S1", "Barangay S2", "Barangay S3"],
                            "San Antonio": ["Barangay T1", "Barangay T2", "Barangay T3"],
                            "Science City of Muñoz": ["Barangay U1", "Barangay U2", "Barangay U3"],
                            "General Mamerto Natividad": ["Barangay V1", "Barangay V2", "Barangay V3"],
                            "Llanera": ["Barangay W1", "Barangay W2", "Barangay W3"],
                            "Rizal": ["Barangay X1", "Barangay X2", "Barangay X3"],
                            "Penaranda": ["Barangay Y1", "Barangay Y2", "Barangay Y3"],
                            "Santa Rosa": ["Barangay Z1", "Barangay Z2", "Barangay Z3"],
                            "Quezon": ["Barangay AA1", "Barangay AA2", "Barangay AA3"],
                            "Zaragoza": ["Barangay BB1", "Barangay BB2", "Barangay BB3"],
                            "Santo Domingo": ["Barangay CC1", "Barangay CC2", "Barangay CC3"],
                            "Maestrang Kikay (Pob.)": ["Barangay DD1", "Barangay DD2", "Barangay DD3"]
                        }
                    },
                    "Pampanga": {
                        "cities": {
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
                        "cities": {
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
                        "cities": {
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
                "provinces": {
                    "Pangasinan": {
                        "cities": {
                            "Lingayen": ["Barangay 1", "Barangay 2", "Barangay 3"],
                            "Dagupan": ["Barangay A", "Barangay B", "Barangay C"],
                            "Alaminos": ["Barangay X", "Barangay Y", "Barangay Z"]
                        }
                    }
                }
            }
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

        // Function to toggle spouse fields based on marital status
        function toggleSpouseFields() {
            const maritalStatus = document.querySelector('select[name="marital_status"]').value;
            const spouseFieldsContainer = document.getElementById('spouseFieldsContainer');
            
            if (maritalStatus === 'Single') {
                spouseFieldsContainer.style.display = 'none';
                // Clear spouse and children fields
                document.querySelector('input[name="spouse_name"]').value = '';
                document.querySelector('input[name="spouse_occupation"]').value = '';
                document.getElementById('childrenFields').innerHTML = '';
            } else {
                spouseFieldsContainer.style.display = 'flex';
            }
        }

        // Initialize the spouse fields based on default marital status
        document.addEventListener('DOMContentLoaded', function() {
            toggleSpouseFields();
        });

        // Function to calculate age from date of birth
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

        // Function to add child input fields
        function addChild() {
            const childrenFields = document.getElementById('childrenFields');
            const inputs = childrenFields.getElementsByTagName('input');

            // Check if the last input field is empty before adding a new one
            if (inputs.length > 0 && inputs[inputs.length - 1].value.trim() === "") {
                alert("Please fill in the existing field before adding another.");
                return;
            }

            // Create new input field and delete button
            const div = document.createElement('div');
            div.classList.add('input-group', 'mb-3');

            const input = document.createElement('input');
            input.type = 'text';
            input.classList.add('form-control');
            input.placeholder = 'Enter child name';
            input.required = true;

            const deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.classList.add('btn', 'btn-danger');
            deleteButton.textContent = '-';

            // Delete the field when the delete button is clicked
            deleteButton.onclick = function() {
                div.remove();
            };

            // Append elements to the div
            div.appendChild(input);
            div.appendChild(deleteButton);

            // Append the div to the container
            childrenFields.appendChild(div);
        }

        // Set the max date for "Date From" and "Date To" to March 2025
        function setMaxDate() {
            // Set max date to March 2025
            const maxDate = "2025-03";  // March 2025
            
            // Set the max attribute for both Date From and Date To fields in the original section
            document.getElementById('date-from').setAttribute('max', maxDate);
            document.getElementById('date-to').setAttribute('max', maxDate);
        }

        // Function for adding new work experience sections
        function addWorkExperience() {
            const workExperienceContainer = document.getElementById('work-experience-container');

            // Create new work experience item (new section)
            const newWorkExperience = document.createElement('div');
            newWorkExperience.innerHTML = `
                <div class="row mt-3 work-experience-item">
                    <div class="col-md-4">
                        <label class="fw-bold">Company</label>
                        <input type="text" class="form-control" oninput="validateText(this)">
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold">Address</label>
                        <input type="text" class="form-control" oninput="validateText(this)">
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold">Position</label>
                        <input type="text" class="form-control" oninput="validateText(this)">
                    </div>
                </div>
                <div class="row mt-3 work-experience-item">
                    <div class="col-md-3">
                        <label class="fw-bold">Salary</label>
                        <input type="text" class="form-control salary" oninput="validateSalary(this)">
                    </div>
                    <div class="col-md-2">
                        <label class="fw-bold">Date From</label>
                        <input type="month" class="form-control" oninput="validateDate(this)">
                    </div>
                    <div class="col-md-2">
                        <label class="fw-bold">Date To</label>
                        <input type="month" class="form-control" oninput="validateDate(this)">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger w-50 remove-btn" onclick="removeWorkExperience(this)">-</button>
                        <button type="button" class="btn btn-primary w-50 ms-2" onclick="addWorkExperience()">+</button>
                    </div>
                </div>
            `;

            // Append the new item to the work-experience-container
            workExperienceContainer.appendChild(newWorkExperience);

            // Enable the remove button for the new section
            document.querySelectorAll('.remove-btn').forEach((btn) => {
                btn.style.display = 'block';
            });

            // Hide the "Add Another" button in the original section
            document.querySelector('#add-button').style.display = 'none';

            // Set max date for the new "Date From" and "Date To" fields
            setMaxDateForNewFields();
        }

        // Function to set max date for "Date From" and "Date To" in newly added sections
        function setMaxDateForNewFields() {
            // Set max date to March 2025 for the newly added fields
            const maxDate = "2025-03";
            const dateFromInputs = document.querySelectorAll('.work-experience-item input[type="month"]:nth-child(2)');
            const dateToInputs = document.querySelectorAll('.work-experience-item input[type="month"]:nth-child(3)');

            // Set max date for all Date From and Date To inputs in the newly added sections
            dateFromInputs.forEach((input) => {
                input.setAttribute('max', maxDate);
            });

            dateToInputs.forEach((input) => {
                input.setAttribute('max', maxDate);
            });
        }

        // Function for removing work experience section
        function removeWorkExperience(button) {
            const workExperienceItem = button.closest('.work-experience-item').parentElement;
            workExperienceItem.remove();

            // Show the "Add Another" button again in the first section
            document.querySelector('#add-button').style.display = 'block';
            validateInputs(); // Revalidate after removal
        }

        // Function to validate text fields (Company, Address, Position) - Allow only alphabetic and spaces
        function validateText(input) {
            // Allow only letters (both uppercase and lowercase) and spaces
            const value = input.value.replace(/[^a-zA-Z\s]/g, ''); // Remove anything that's not a letter or space
            input.value = value;  // Update the value after removing invalid characters
            
            validateInputs(); // Enable/disable Add Another button
        }

        // Function to validate salary input (Only numbers and commas allowed)
        function validateSalary(input) {
            const value = input.value.replace(/[^0-9,]/g, '');  // Allow only numbers and commas
            input.value = value;
        }

        // Function to validate month inputs (Date From, Date To)
        function validateDate(input) {
            if (!input.value) {
                input.setCustomValidity('This field is required.');
            } else {
                input.setCustomValidity('');
            }
            validateInputs(); // Enable/disable Add Another button
        }

        // Function to validate the entire section to enable/disable the "Add Another" button
        function validateInputs() {
            const addButton = document.querySelector('#add-button');
            const fields = document.querySelectorAll('.work-experience-item:last-child input');
            let isValid = true;

            fields.forEach(field => {
                if (field.checkValidity() === false) {
                    isValid = false;
                }
            });

            addButton.disabled = !isValid;  // Enable or disable the "Add Another" button
        }

        // Call setMaxDate when the page loads to set the max date for Date From and Date To fields
        window.onload = setMaxDate;

        // Handle file uploads and previews for general files (CV, ID, Passport, Birth Certificate)
        document.querySelectorAll('.file-input').forEach(inputElement => {
            inputElement.addEventListener('change', function(event) {
                handleFileUpload(event.target);
            });
        });

        // Unified file upload handler for all types of files
        function handleFileUpload(inputElement) {
            const fileNameElementId = inputElement.id.replace('fileInput', 'fileName'); // e.g., fileInput1 -> fileName1
            const filePreviewElementId = inputElement.id.replace('fileInput', 'filePreview'); // e.g., fileInput1 -> filePreview1

            const fileNameElement = document.getElementById(fileNameElementId);
            const filePreviewElement = document.getElementById(filePreviewElementId);
            const file = inputElement.files[0];

            if (file) {
                fileNameElement.textContent = file.name;

                // Clear previous previews
                filePreviewElement.innerHTML = '';

                // Check if the file is an image
                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.style.maxWidth = '100px'; // Set a max width for the image preview
                    img.style.marginTop = '10px';
                    filePreviewElement.appendChild(img);
                } else {
                    // If not an image, show a generic file icon
                    const icon = document.createElement('i');
                    icon.classList.add('bi', 'bi-file-earmark', 'fs-3');
                    filePreviewElement.appendChild(icon);
                }
            }
        }

        // Profile Image Upload Handling
        const profileUpload = document.getElementById("profileUpload");
        const profilePreview = document.getElementById("profilePreview");
        const uploadText = document.getElementById("uploadText");
        const uploadInfo = document.getElementById("uploadInfo");

        profileUpload.addEventListener("change", function() {
            const file = this.files[0];

            // Check if the file is an image
            if (file && file.type.startsWith('image/')) {
                // Create a URL for the selected image
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Show the image preview and update the source
                    profilePreview.src = e.target.result;
                    profilePreview.classList.remove("d-none");

                    // Hide the text and show the preview
                    uploadText.classList.add("d-none");
                    uploadInfo.classList.add("d-none");
                };
                reader.readAsDataURL(file);
            } else {
                alert("Please upload a valid image file.");
            }
        });

        // Signature Image Upload Handling
        const signatureInput = document.getElementById('signatureUpload');
        const signaturePreview = document.getElementById('signaturePreview');
        const uploadIcon = document.getElementById('uploadIcon');
        const uploadTextForSignature = document.getElementById('uploadText'); // Use different name for clarity

        signatureInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Hide the upload icon and text
                uploadIcon.style.display = 'none';
                uploadTextForSignature.style.display = 'none';

                // Show the uploaded image
                const reader = new FileReader();
                reader.onload = function(event) {
                    signaturePreview.src = event.target.result; // Set the src to the uploaded image
                    signaturePreview.classList.remove('d-none'); // Make sure the image is visible
                };
                reader.readAsDataURL(file); // Read the file and trigger the onload function
            }
        });

        function addLanguageField() {
            // Get all input fields
            const inputs = document.querySelectorAll('input[type="text"]');
            let isValid = true;

            // Check if any input field is empty
            inputs.forEach(input => {
                if (input.value.trim() === "") {
                    isValid = false;
                    input.classList.add('is-invalid'); // Add invalid class if empty
                } else {
                    input.classList.remove('is-invalid'); // Remove invalid class if not empty
                }
            });

            // Only add another input field if all fields are filled
            if (isValid) {
                const newField = document.createElement('div');
                newField.classList.add('row', 'mt-2');
                newField.innerHTML = `
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Enter language" required>
                    </div>
                `;
                document.getElementById('additional-languages').appendChild(newField);
            } else {
                alert("Please fill in all fields before adding another language.");
            }
        }

        function submitForm() {
            // Optionally, you can validate the form before submission (check for empty fields, etc.)
            // For example, if you want to validate that certain fields are not empty:
            let fullName = document.querySelector('input[name="full_name"]').value;
            if (!fullName) {
                alert('Please fill in your full name');
                return;
            }

            // Manually submit the form using JavaScript
            document.getElementById('profileForm').submit();
        }

        function formatYearInput(event) {
            let input = event.target.value;
            
            // Remove non-numeric characters
            input = input.replace(/\D/g, '');
            
            // Limit to 8 digits (4 for entry year and 4 for graduation year)
            if (input.length > 8) {
                input = input.slice(0, 8);
            }
            
            // Add hyphen after the first 4 digits
            if (input.length > 4) {
                input = input.slice(0, 4) + '-' + input.slice(4);
            }
            
            // Update the input field with the formatted value
            event.target.value = input;
        }
    </script>
</body>
</html>