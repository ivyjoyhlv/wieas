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
    <!-- Top Row for Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <h2 class="text">All Applicants</h2>
                <h1 class="number">{{ $applicantCount }}</h1> <!-- Display total applicants -->
                <img class="icon" src="{{ asset('images/isa.jpg') }}" alt="Icon">
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <h2 class="text">New Applicants</h2>
                <h1 class="number">{{ $newApplicantCount }}</h1> <!-- Display new applicants count -->
                <img class="icon" src="{{ asset('images/dalawa.jpg') }}" alt="Icon">
            </div>
        </div>
    </div>

    <!-- You can continue adding more stat cards or any other content below -->
</div>


            </div>
        </div>
    </div>
    <script>
 // Image swapping logic with navigation
 let images = [
            "https://cdn.dribbble.com/userupload/31681946/file/original-4c2b0adb8741fb2c952e186b9bf7072e.gif"
        ];
        let index = 0;

        function updateImage() {
            document.getElementById("conferenceImage").src = images[index];
        }

        function nextImage() {
            index = (index + 1) % images.length;
            updateImage();
        }

        function prevImage() {
            index = (index - 1 + images.length) % images.length;
            updateImage();
        }

        setInterval(nextImage, 2000);
    </script>
    <script src="https://sdk.zujonow.com/zujon-builder-0.0.1.dev.min.js">
    </script>
    <script src="https://source.zoom.us/2.14.0/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/2.14.0/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/2.14.0/zoom-meeting-embedded-2.14.0.min.js"></script>

        </body>
        </html>