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

        .nav-tabs .nav-link {
            border: none;
            padding: 10px 20px;
            font-weight: bold;
        }

        .nav-tabs .nav-link.active {
            color: #007bff;
            background-color: transparent;
        }

        .applicant-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            top: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .status-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            position: absolute;
            top: 10px;
            left: 0;
        }

        .status {
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 12px;
            margin-left: 10px;
        }

        .status.review {
            background-color: #e0f7fa;
            color: #007bff;
        }

        .status.hired {
            background-color: #e8f5e9;
            color: #4caf50;
        }

        .status.interview {
            background-color: #fff3e0;
            color: #ffb74d;
        }

        .applicant-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .applicant-card h6 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .applicant-card p {
            font-size: 14px;
            color: gray;
            margin-bottom: 10px;
            text-align: center;
        }

        .view-profile-btn {
            padding: 6px 20px;
            background-color:#3D9CFB;
            color:  #FFFFFF;
            border-radius: 10px;
            text-decoration: none;
        }

        .view-profile-btn:hover {
            background-color: #0056b3;
        }

        .action-btns {
            position: absolute;
            top: 0px;
            right: 10px;
        }

        .action-btns .btn {
            background: none;
            border: none;
            font-size: 16px;
            color: #999;
            cursor: pointer;
        }

        .action-btns .btn:hover {
            color: #007bff;
        }
        .status-dropdown {
            position: relative;
            cursor: pointer;
            display: inline-block;
        }
        .status-dropdown .dropdown-menu {
            display: none;
            position: absolute;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            list-style: none;
            padding: 5px;
            min-width: 120px;
            z-index: 1000;
        }
        .status-dropdown .dropdown-menu li {
            padding: 5px;
            cursor: pointer;
        }
        .status-dropdown .dropdown-menu li:hover {
            background: #f1f1f1;
        }
        .pagination .page-link {
            border-radius: 20px;
            margin: 0 5px;
            border: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        .status-dropdown {
            border: none;
            background: none;
            cursor: pointer;
            padding: 5px;
        }
        .status-dropdown:focus {
            outline: none;
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
                    Applicants
                </a>
            </li>
            <li class="nav-item mt-3">
                <a href="{{ route('admindash.notification') }}">
                    <i class="fas fa-bell"></i>
                    Notifications
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

    <div class="content bg-light p-3 rounded">
    <h2 class="fw-bold">Applicants</h2>
    <div class="d-flex align-items-center mb-3">
            <div class="d-flex">
            <input type="text" class="form-control me-2" placeholder="Applicant"  style="width: 400px;">
            <input type="text" class="form-control me-2" placeholder="Category" style="width: 400px;">
            </div>

            <button class="btn btn-secondary me-2 d-flex align-items-center">
                <i class="fas fa-filter me-2"></i> Filter
            </button>
            <button class="btn btn-primary d-flex align-items-center">
                <i class="fas fa-search me-2"></i> Find Applicant
            </button>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-2">
    <div class="d-flex align-items-center flex-grow-1">
        <p class="text-secondary mb-0 me-4 flex-shrink-0">120 Applying for Construction & Engineering Jobs</p>
        <div class="d-flex flex-wrap">
        <select class="form-select me-2" style="width: 200px;">
            <option>Job Type</option>
        </select>
        <select class="form-select me-2" style="width: 200px;">
            <option>Application Status</option>
        </select>
        <select class="form-select" style="width: 200px;">
            <option>Experience Level</option>
        </select>
    </div>
    </div>
    <a href="#" class="text-primary">Clear All</a>
</div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Applicant Name</th>
                <th>Applying at</th>
                <th>Job Type</th>
                <th>Applicant Status</th>
                <th>Date</th>
                <th>Application Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample Row -->
            <tr>
                <td><img src="profile.jpg" class="rounded-circle" width="30"> {{ session('applicant')->first_name }} {{ session('applicant')->last_name }}</td>
                <td>Worker Steel Structure</td>
                <td><span class="badge bg-success">Construction & Engineering</span></td>
                <td>
                    <div class="status-dropdown" onclick="toggleStatusDropdown(this)">
                        <span class="badge bg-success">Active</span>
                        <ul class="dropdown-menu">
                            <li onclick="changeStatus(this, 'Active', 'bg-success')">Active</li>
                            <li onclick="changeStatus(this, 'In-active', 'bg-danger')">In-active</li>
                        </ul>
                    </div>
                </td>
                <td>03/11/2024</td>
                <td>
                    <div class="status-dropdown" onclick="toggleStatusDropdown(this)">
                        <span class="badge bg-warning">To Review</span>
                        <ul class="dropdown-menu">
                            <li onclick="changeStatus(this, 'To Review', 'bg-warning')">To Review</li>
                            <li onclick="changeStatus(this, 'Approved', 'bg-info')">Approved</li>
                            <li onclick="changeStatus(this, 'To Interview', 'bg-danger')">To Interview</li>
                            <li onclick="changeStatus(this, 'Passed', 'bg-success')">Passed</li>
                            <li onclick="changeStatus(this, 'To Deploy', 'bg-secondary text-white')">To Deploy</li>
                        </ul>
                    </div>
                </td>
                <td>
                <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#viewApplicantModal">View Applicant</button>
                    </td>
            </tr>
        </tbody>
        
    </table>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link rounded-pill" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link rounded-pill bg-primary text-white" href="#">1</a></li>
            <li class="page-item"><a class="page-link rounded-pill" href="#">2</a></li>
            <li class="page-item"><a class="page-link rounded-pill" href="#">3</a></li>
            <li class="page-item"><a class="page-link rounded-pill" href="#">...</a></li>
            <li class="page-item"><a class="page-link rounded-pill" href="#">10</a></li>
            <li class="page-item"><a class="page-link rounded-pill" href="#">&raquo;</a></li>
        </ul>
    </nav>
</div>
<!-- View Applicant Modal -->
<div class="modal fade" id="viewApplicantModal" tabindex="-1" aria-labelledby="viewApplicantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewApplicantModalLabel">Applicant Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Left Section: Profile -->
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('images/bogart.jpg') }}" class="rounded-circle mb-3" width="120" height="120" alt="Applicant">
                        <h5>{{ session('applicant')->first_name }} {{ session('applicant')->last_name }}</h5>
                        <p class="text-muted">Applicant Status: <span class="badge bg-success">Active</span></p>
                        <p class="text-muted">Application Status: <span class="badge bg-warning">Pending</span></p>
                        <p><i class="bi bi-telephone"></i> (+63) 9123456789</p>
                        <p><i class="bi bi-envelope"></i>{{ session('applicant')->email }}</p>
                        <div>
                            <i class="bi bi-facebook me-2"></i>
                            <i class="bi bi-linkedin me-2"></i>
                            <i class="bi bi-github"></i>
                        </div>
                    </div>
                    
                    <!-- Right Section: Details -->
                    <div class="col-md-8">
                        <ul class="nav nav-tabs" id="applicantTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab">Personal</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab">Documents</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3">
                            <!-- Personal Info Tab -->
@if(session('applicant_profile'))
    <div class="card p-3">
        <h5 class="mt-4"><i class="bi bi-person-circle"></i> Personal Information</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Fullname:</strong> {{ session('applicant_profile')['full_name'] }}</p>
                <p><strong>Age:</strong> {{ session('applicant_profile')['age'] }}</p>
                <p><strong>Date of Birth:</strong> {{ session('applicant_profile')['dob'] }}</p>
                <p><strong>Place of Birth:</strong> {{ session('applicant_profile')['place_of_birth'] }}</p>
                <p><strong>Nationality:</strong> Filipino</p>
                <p><strong>Gender:</strong> {{ session('applicant_profile')['gender'] }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Religion:</strong> {{ session('applicant_profile')['religion'] }}</p>
                <p><strong>Marital Status:</strong> {{ session('applicant_profile')['marital_status'] }}</p>
                <p><strong>Email Address:</strong> {{ session('applicant_profile')['email'] }}</p>
                <p><strong>Phone Number:</strong> {{ session('applicant_profile')['contact'] }}</p>
            </div>
        </div>
    </div>

    <h5 class="mt-4"><i class="bi bi-geo-alt"></i> Address</h5>
    <div class="card p-3 mt-3">
        <p><strong>Primary Address:</strong> {{ session('applicant_profile')['address'] }}</p>
        <p><strong>Country:</strong> Philippines</p>
        <p><strong>State/Province:</strong> {{ session('applicant_profile')['province'] }}</p>
        <p><strong>City:</strong> {{ session('applicant_profile')['city'] }}</p>
    </div>

    <!-- You can similarly display other fields here -->

@else
    <p>No applicant profile found in session.</p>
@endif


                            <!-- Documents Tab -->
                            <div class="tab-pane fade" id="documents" role="tabpanel">
                                <h5><i class="bi bi-folder"></i> Supporting Documents</h5>
                                <div class="card p-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>Date Uploaded</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><i class="bi bi-file-earmark-pdf text-danger"></i> CV_Bogart_Batumbakal.pdf</td>
                                                <td>01 MARCH 2024</td>
                                                <td><button class="btn btn-outline-primary btn-sm"><i class="bi bi-download"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-file-earmark-pdf text-danger"></i> CV_Bogart_Batumbakal.pdf</td>
                                                <td>01 MARCH 2024</td>
                                                <td><button class="btn btn-outline-primary btn-sm"><i class="bi bi-download"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <h5 class="mt-4"><i class="bi bi-folder"></i> CVs/Resume Documents</h5>
                                <div class="card p-3 mt-3">
                                    
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>Date Uploaded</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><i class="bi bi-file-earmark-pdf text-danger"></i> CV_Bogart_Batumbakal.pdf</td>
                                                <td>01 MARCH 2024</td>
                                                <td><button class="btn btn-outline-primary btn-sm"><i class="bi bi-download"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-file-earmark-pdf text-danger"></i> CV_Bogart_Batumbakal.pdf</td>
                                                <td>01 MARCH 2024</td>
                                                <td><button class="btn btn-outline-primary btn-sm"><i class="bi bi-download"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-file-earmark-pdf text-danger"></i> CV_Bogart_Batumbakal.pdf</td>
                                                <td>01 MARCH 2024</td>
                                                <td><button class="btn btn-outline-primary btn-sm"><i class="bi bi-download"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-file-earmark-pdf text-danger"></i> CV_Bogart_Batumbakal.pdf</td>
                                                <td>01 MARCH 2024</td>
                                                <td><button class="btn btn-outline-primary btn-sm"><i class="bi bi-download"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <h5 class="mt-4"><i class="bi bi-folder"></i> eSignature</h5>
                                <div class="card p-3 mt-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>Date Uploaded</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><i class="bi bi-file-earmark-pdf text-danger"></i> CV_Bogart_Batumbakal.pdf</td>
                                                <td>01 MARCH 2024</td>
                                                <td><button class="btn btn-outline-primary btn-sm"><i class="bi bi-download"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Schedule Interview</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleStatusDropdown(element) {
        let dropdown = element.querySelector(".dropdown-menu");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }
    
    function changeStatus(element, text, colorClass) {
        let statusSpan = element.closest(".status-dropdown").querySelector("span");
        statusSpan.textContent = text;
        statusSpan.className = "badge " + colorClass;
        element.closest(".dropdown-menu").style.display = "none";
    }
    
    document.addEventListener("click", function(event) {
        if (!event.target.closest(".status-dropdown")) {
            document.querySelectorAll(".dropdown-menu").forEach(menu => menu.style.display = "none");
        }
    });
</script>
</body>
</html>
