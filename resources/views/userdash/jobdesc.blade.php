<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Jobs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .job-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 10px;
            background: white;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .job-logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            margin-bottom: 100px;
        }

        .job-content {
            flex-grow: 1;
        }

        .job-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn-apply {
            border-radius: 8px;
            padding: 6px 12px;
            font-weight: bold;
            background-color: white;
            color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-apply:hover {
            background-color: #007bff;
            color: white;
        }

        .job-details-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background: white;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/workforce.png') }}" class="rounded-circle me-2 img-fluid" style="width: 35px; height: 35px;" alt="Logo">
                <strong>WIEAS</strong>
            </a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('userdash.index') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-primary" href="{{ route('userdash.jobopenings') }}">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Pinned</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('userdash.conference') }}">Conference</a></li>
            </ul>
        </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-bell me-3 text-primary" id="notificationIcon" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <div class="dropdown-menu p-4" aria-labelledby="notificationIcon">
                    <h5 class="text-center mb-3">Notifications</h5> 
                </div>
                <div class="d-flex align-items-center ms-3">
                    <img src="{{ asset('images/bogart.jpg') }}" class="rounded-circle me-2 img-fluid" style="width: 40px; height: 40px;" alt="User Profile">
                    <div>
                        <span class="d-block fw-bold">{{ session('applicant')->first_name }}</span>
                        <small class="text-muted">{{ session('applicant')->email }}</small>
                    </div>
                    <div class="dropdown">
                        <i class="ms-2 dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="{{ route('userdash.settings') }}">Settings</a></li>
                            <li><a class="dropdown-item" href="{{ route('signin.index') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="job-card">
                    <div class="job-logo">
                        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" style="width: 40px; height: 40px;">
                    </div>
                    <div class="job-content">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">LOGO</span>
                            <span class="text-muted" style="font-size: 12px;">1 day ago</span>
                        </div>
                        <h6 class="fw-bold mb-0">WORKER STEEL STRUCTURE</h6>
                        <p class="text-muted mb-0" style="font-size: 14px;">IREM S.P.A HUNGARY BRANCH</p>
                        <p class="mb-2" style="font-size: 13px;"><i class="bi bi-geo-alt-fill"></i> Hungary</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="bi bi-bookmark" style="margin-left: 135px;"></i>
                            <button class="btn btn-apply">Apply Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="job-details-card">
    <div class="d-flex align-items-center mb-3">
        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" style="width: 100px; height: 100px; margin-right: 10px;">
        <h3 class="fw-bold mb-0" style="margin-top: -30px;">WORKER STEEL STRUCTURE</h3>
    </div>
    <p class="text-muted mb-0" style="margin-left: 110px; margin-top: -65px;">IREM S.P.A HUNGARY BRANCH</p>
    <p><i class="bi bi-geo-alt-fill mb-2" style="margin-left: 110px;"></i> Hungary</p>
    <div class="d-flex justify-content-end align-items-center my-3">
        <i class="bi bi-share me-3"></i>
        <i class="bi bi-bookmark me-3"></i>
        <button class="btn btn-apply">Apply Now</button>
    </div>
    <hr>
    <h5 class="fw-bold">Job Details</h5>
    <hr>
    <h5 class="fw-bold">Job Description</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <h5 class="fw-bold">Requirements</h5>
    <ul>
        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
        labore et dolore magna aliqua</li>
        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. </li>
        <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
        id est laborum.</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
        labore et dolore magna aliqua</li>
        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. </li>
        <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
        id est laborum.</li>
    </ul>
    <div class="d-flex justify-content-end">
        <i class="bi bi-share me-3"></i>
        <i class="bi bi-bookmark me-3"></i>
        <button class="btn btn-apply">Apply Now</button>
    </div>
</div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
