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
        <h2> Applicants </h2>
        <!-- Tabs for sorting -->
        <ul class="nav nav-tabs" id="applicantTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="total-candidates-tab" data-bs-toggle="tab" href="#total-candidates" role="tab" aria-controls="total-candidates" aria-selected="true">Total Candidates</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="review-tab" data-bs-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Review</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="interview-tab" data-bs-toggle="tab" href="#interview" role="tab" aria-controls="interview" aria-selected="false">Interview</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="hired-tab" data-bs-toggle="tab" href="#hired" role="tab" aria-controls="hired" aria-selected="false">Hired</a>
            </li>
        </ul>
        <div class="tab-content" id="applicantTabsContent">
            <div class="tab-pane fade show active" id="total-candidates" role="tabpanel" aria-labelledby="total-candidates-tab">
                <div class="row">
                    <!-- Applicant Card Example -->
                    <div class="col-md-3">
                        <div class="applicant-card">
                            <img src="{{ asset('images/workforce.png') }}" alt="Applicant">
                            <div class="status-container">
                                <div class="status review">Review</div>
                                <div class="action-btns">
                                    <button class="btn"><i class="fas fa-ellipsis-v"></i></button>
                                </div>
                            </div>
                            <h6>Bogart Batumbakal</h6>
                            <p>Former Welder at Worker Steel Structure</p>
                            <a href="#" class="view-profile-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="applicant-card">
                            <img src="{{ asset('images/workforce.png') }}" alt="Applicant">
                            <div class="status-container">
                                <div class="status interview">Interview</div>
                                <div class="action-btns">
                                    <button class="btn"><i class="fas fa-ellipsis-v"></i></button>
                                </div>
                            </div>
                            <h6>Jane Doe</h6>
                            <p>FFormer Welder at Worker Steel Structure</p>
                            <a href="#" class="view-profile-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="applicant-card">
                            <img src="{{ asset('images/workforce.png') }}" alt="Applicant">
                            <div class="status-container">
                                <div class="status hired">Hired</div>
                                <div class="action-btns">
                                    <button class="btn"><i class="fas fa-ellipsis-v"></i></button>
                                </div>
                            </div>
                            <h6>John Smith</h6>
                            <p>Former Welder at Worker Steel Structure</p>
                            <a href="#" class="view-profile-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="applicant-card">
                            <img src="{{ asset('images/workforce.png') }}" alt="Applicant">
                            <div class="status-container">
                                <div class="status review">Review</div>
                                <div class="action-btns">
                                    <button class="btn"><i class="fas fa-ellipsis-v"></i></button>
                                </div>
                            </div>
                            <h6>Bogart Batumbakal</h6>
                            <p>Former Welder at Worker Steel Structure</p>
                            <a href="#" class="view-profile-btn">View Profile</a>
                        </div>
                    </div>

                    <!-- Repeat this block for more applicants -->
                </div>
            </div>
            <!-- Add similar blocks for 'review', 'interview', 'hired' tabs -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
