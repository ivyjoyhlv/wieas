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
        .notification-card {
            background-color: white;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .notification-card .notification-details {
            flex: 1;
        }
        .notification-card .notification-actions {
            display: flex;
            gap: 10px;
        }
        .notification-actions button {
            padding: 5px 15px;
        }
        .notification-card .notification-status {
            font-size: 14px;
            color: #888;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .notification-card .status-read {
            background-color: #007bff;
            color: white;
        }
        .notification-card .status-unread {
            background-color: #ccc;
        }
        .pagination {
            justify-content: center;
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
        <h2>Notification</h2>
        <div class="search-bar">
            <input type="text" class="form-control" placeholder="Search Notifications...">
        </div>

        <!-- Notification Cards -->
        <div class="notification-card">
            <div class="notification-details">
                <h5>New Applicant: Bogart Batumbakal</h5>
                <p>Category: New Applicant</p>
                <p class="notification-status">2 mins ago - Applied for Worker Steel Structure</p>
            </div>
            <div class="notification-actions">
                <button class="btn btn-primary status-read">Mark as Read</button>
                <button class="btn btn-outline-info">View Details</button>
                <button class="btn btn-danger">Delete</button>
            </div>
        </div>

        <div class="notification-card status-unread">
            <div class="notification-details">
                <h5>New Applicant: Bogart Batumbakal</h5>
                <p>Category: New Applicant</p>
                <p class="notification-status">2 mins ago - Applied for Worker Steel Structure</p>
            </div>
            <div class="notification-actions">
                <button class="btn btn-primary status-read">Mark as Read</button>
                <button class="btn btn-outline-info">View Details</button>
                <button class="btn btn-danger">Delete</button>
            </div>
        </div>

        <div class="notification-card">
            <div class="notification-details">
                <h5>Application Review: Bogart Batumbakal</h5>
                <p>Category: Application Review</p>
                <p class="notification-status">3 days ago - Pending review</p>
            </div>
            <div class="notification-actions">
                <button class="btn btn-primary status-read">Mark as Read</button>
                <button class="btn btn-outline-info">View Details</button>
                <button class="btn btn-danger">Delete</button>
            </div>
        </div>

        <div class="notification-card">
            <div class="notification-details">
                <h5>Schedule Update</h5>
                <p>Category: Schedule Change</p>
                <p class="notification-status">2 mins ago - Interview rescheduled</p>
            </div>
            <div class="notification-actions">
                <button class="btn btn-primary status-read">Mark as Read</button>
                <button class="btn btn-outline-info">View Details</button>
                <button class="btn btn-danger">Delete</button>
            </div>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
