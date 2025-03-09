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

        .content .card {
            margin-bottom: 20px;
        }

        .card-body {
            padding: 1.5rem;
        }

        .stat-card {
            background-color: white;
            color: black;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .stat-card .text {
            font-size: 1.2rem;
            display: block;
            margin-bottom: 5px;
        }

        .stat-card .number {
            font-size: 3rem;
            font-weight: bold;
        }

        .stat-card .icon {
            width: 35px;
            height: 35px;
            object-fit: contain;
            margin-left: 10px;
        }

        .upcoming-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .upcoming-section .card {
            width: 48%;
        }

        .posted-jobs {
            margin-top: 20px;
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
                    Applicants <span class="badge bg-danger">2</span>
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
        <!-- Top Row for Stats -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="text">Total Applicants</div>
                    <div class="number">130</div>
                    <img class="icon" src="{{ asset('images/isa.jpg') }}" alt="Icon">
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="text">New Applicants</div>
                    <div class="number">20</div>
                    <img class="icon" src="{{ asset('images/dalawa.jpg') }}" alt="Icon">
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="text">Upcoming Interview</div>
                    <div class="number">20</div>
                    <img class="icon" src="{{ asset('images/tatlo.jpg') }}" alt="Icon">
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="text">Upcoming Review</div>
                    <div class="number">20</div>
                    <img class="icon" src="{{ asset('images/apat.jpg') }}" alt="Icon">
                </div>
            </div>
        </div>

        <!-- Posted Jobs Section (55% width) and Upcoming Section (35% width) -->
        <div class="row">
            <div class="col-md-8">  <!-- 55% width -->
                <h5>Posted Jobs</h5>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="postedJobsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="active-jobs-tab" data-bs-toggle="tab" href="#active-jobs" role="tab" aria-controls="active-jobs" aria-selected="true">Active Jobs</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="archived-jobs-tab" data-bs-toggle="tab" href="#archived-jobs" role="tab" aria-controls="archived-jobs" aria-selected="false">Archived Jobs</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="postedJobsTabContent">
                            <div class="tab-pane fade show active" id="active-jobs" role="tabpanel" aria-labelledby="active-jobs-tab">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">WORKER STEEL STRUCTURE</h5>
                                                <p class="card-text">IREM S.P.A HUNGARY BRANCH</p>
                                                <div class="d-flex justify-content-between">
                                                    <span>Total Candidates: 50</span>
                                                    <span>Review: 20</span>
                                                    <span>Interview: 10</span>
                                                </div>
                                                <div class="d-flex justify-content-between mt-3">
                                                    <span class="badge bg-success">Hired: 15</span>
                                                    <span class="badge bg-danger">On Hold: 5</span>
                                                </div>
                                                <button class="btn btn-primary mt-3">View Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="archived-jobs" role="tabpanel" aria-labelledby="archived-jobs-tab">
                                <p>No archived jobs available.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">  <!-- 35% width -->
                <h5>Upcoming</h5>
                <div class="card">
                    <div class="card-body">
                    <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Calendar view</h6>
                                        <div class="calendar"> 
                                            <!-- Calendar integration -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card p-3">
                                    <h6>January</h6>
                                    <div class="d-flex justify-content-between">
                                        <span>02</span>
                                        <span>Upcoming Interview</span>
                                    </div>
                                    <div class="list-group mt-3">
                                        <a href="#" class="list-group-item list-group-item-action">Bogart Batumbakal 08:00</a>
                                        <a href="#" class="list-group-item list-group-item-action">Bogart Batumbakal 09:00</a>
                                        <a href="#" class="list-group-item list-group-item-action">Bogart Batumbakal 10:00</a>
                                        <a href="#" class="list-group-item list-group-item-action">Bogart Batumbakal 11:00</a>
                                        <a href="#" class="list-group-item list-group-item-action">Bogart Batumbakal 12:00</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Applicants Section -->
        <div class="row">
            <div class="col-md-8">
                <h5>Applicants</h5>
                <div class="card">
                    <div class="card-body">
                        <h6>To Review</h6>
                        <ul class="list-group">
                            <li class="list-group-item">Bogart Batumbakal</li>
                        </ul>
                        <h6 class="mt-3">Hired</h6>
                        <ul class="list-group">
                            <li class="list-group-item">Bogart Batumbakal</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
