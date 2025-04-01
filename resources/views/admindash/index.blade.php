<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet" />
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
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
        .posted-jobs .job-card {
            border: 1px solid #ddd;
            padding: 1rem;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .posted-jobs .job-card .job-details {
            flex: 1;
        }
        .posted-jobs .job-card .job-status {
            display: flex;
            gap: 10px;
        }
        .job-status span {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-size: 0.9rem;
        }
        .hired { background-color: green; }
        .on-hold { background-color: red; }
        .applicant-card {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 15px;
        }
        .applicant-card .applicant-details {
            display: flex;
            justify-content: space-between;
        }
        .applicant-card .applicant-status {
            padding: 5px 10px;
            font-size: 0.9rem;
            color: white;
            border-radius: 5px;
        }
        .pending { background-color: #ffcc00; }
        .approved { background-color: #28a745; }
        .to-interview { background-color: #17a2b8; }
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
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admindash.joblist') }}">
                    <i class="fas fa-briefcase"></i> Jobs
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admindash.analythics') }}">
                    <i class="fas fa-chart-line"></i> Analytics
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admindash.conference') }}">
                    <i class="fas fa-calendar-alt"></i> Conference
                </a>
            </li>
            <li class="nav-item mb-5">
                <a href="{{ route('admindash.applicants') }}">
                    <i class="fas fa-users"></i> Applicants
                </a>
            </li>
            <li class="nav-item mt-3">
                <a href="{{ route('admindash.notification') }}">
                    <i class="fas fa-bell"></i> Notifications
                </a>
            </li>   
            <li class="nav-item">
                <a href="#">
                    <i class="fas fa-cogs"></i> Settings
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.signin') }}">
                    <i class="fas fa-sign-out-alt"></i> Logout
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
                    <div>
                        <div class="text">All Applicants</div>
                        <div class="number">{{ $applicantCount }}</div>
                    </div>
                    <img class="icon" src="{{ asset('images/isa.jpg') }}" alt="Icon">
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div>
                        <div class="text">New Applicants</div>
                        <div class="number">{{ $applicantCount }}</div>
                    </div>
                    <img class="icon" src="{{ asset('images/dalawa.jpg') }}" alt="Icon">
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div>
                        <div class="text">Upcoming Interview</div>
                        <div class="number">20</div>
                    </div>
                    <img class="icon" src="{{ asset('images/tatlo.jpg') }}" alt="Icon">
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div>
                        <div class="text">Upcoming Review</div>
                        <div class="number">20</div>
                    </div>
                    <img class="icon" src="{{ asset('images/apat.jpg') }}" alt="Icon">
                </div>
            </div>
        </div>

        <!-- Posted Jobs Section -->
        <div class="row">
            <div class="col-md-8">
                <h3>Posted Jobs</h3>
                <div class="posted-jobs">
                    <div class="job-card">
                        <div class="job-details">
                            <h5>WORKER STEEL STRUCTURE</h5>
                            <p>IREM S.P.A HUNGARY BRANCH</p>
                            <div class="job-status">
                                <span class="badge bg-primary">Total Candidates: 50</span>
                                <span class="badge bg-warning">Review: 20</span>
                                <span class="badge bg-info">Interview: 10</span>
                            </div>
                        </div>
                        <div class="job-status">
                            <span class="hired">Hired: 15</span>
                            <span class="on-hold">On Hold: 5</span>
                        </div>
                        <button class="btn btn-primary mt-3">View Details</button>
                    </div>

                    <div class="job-card">
                        <div class="job-details">
                            <h5>WORKER STEEL STRUCTURE</h5>
                            <p>IREM S.P.A HUNGARY BRANCH</p>
                            <div class="job-status">
                                <span class="badge bg-primary">Total Candidates: 50</span>
                                <span class="badge bg-warning">Review: 20</span>
                                <span class="badge bg-info">Interview: 10</span>
                            </div>
                        </div>
                        <div class="job-status">
                            <span class="hired">Hired: 15</span>
                            <span class="on-hold">On Hold: 5</span>
                        </div>
                        <button class="btn btn-primary mt-3">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Upcoming Section -->
            <div class="col-md-4">
                <h5>Upcoming</h5>
                <div class="card">
                    <div class="card-body">
                        <!-- FullCalendar -->
                        <div id="calendar"></div>

                        <!-- Upcoming Interview List -->
                        <div class="d-flex justify-content-between mt-4">
                            <h3>Upcoming Interview</h3>
                        </div>
                        <br>
                        <div>
                            <p>Bogart Batumbakal - 08:00</p>
                            <p>Bogart Batumbakal - 09:00</p>
                            <p>Bogart Batumbakal - 10:00</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Applicants Section -->
        <div class="row">
            <div class="col-md-8">
                <h3>Applicants</h3>
                <div class="applicant-card">
                    <div class="applicant-details">
                        <span>Bogart Batumbakal</span>
                        <span class="applicant-status pending">Pending</span>
                    </div>
                    <div class="applicant-details">
                        <span>Worker Steel Structure</span>
                        <span class="applicant-status to-interview">To Interview</span>
                    </div>
                    <button class="btn btn-primary">View Applicant</button>
                </div>

                <div class="applicant-card">
                    <div class="applicant-details">
                        <span>Bogart Batumbakal</span>
                        <span class="applicant-status approved">Approved</span>
                    </div>
                    <div class="applicant-details">
                        <span>Worker Steel Structure</span>
                    </div>
                    <button class="btn btn-primary">View Applicant</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    {
                        title: 'Bogart Batumbakal - 08:00',
                        start: '2024-01-02T08:00:00',
                    },
                    {
                        title: 'Bogart Batumbakal - 09:00',
                        start: '2024-01-02T09:00:00',
                    },
                    {
                        title: 'Bogart Batumbakal - 10:00',
                        start: '2024-01-02T10:00:00',
                    },
                ],
            });
            calendar.render();
        });
    </script>
</body>
</html>
