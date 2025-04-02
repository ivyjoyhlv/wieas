<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEA.S | Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3a7bd5;
            --sidebar-bg: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding-left: 250px;
        }
        
        .sidebar {
            background-color: white;
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            color: black;
            border-right: 1px solid #ddd;
            z-index: 1000;
        }
        
        .sidebar .nav-link {
            color: #324054;
            margin-bottom: 5px;
            padding: 8px 15px;
        }
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: var(--primary-color);
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .logo-area {
            padding: 20px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }
        
        /* Main Content Area */
        .main-content {
            padding: 20px;
        }
        
        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .stat-header {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 5px;
        }
        
        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        /* Posted Jobs Section */
        .posted-jobs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .posted-jobs .stat-card {
            padding: 12px 15px;
        }
        
        /* Job Cards */
        .jobs-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .job-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .job-header {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }
        
        .job-subheader {
            padding: 10px 15px;
            font-size: 0.9rem;
            color: #666;
            border-bottom: 1px solid #eee;
        }
        
        .job-body {
            padding: 15px;
        }
        
        .number-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
            margin-bottom: 10px;
        }
        
        .number-item {
            font-size: 1.2rem;
            font-weight: 600;
            text-align: center;
        }
        
        .label-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }
        
        .label-item {
            font-size: 0.7rem;
            color: #666;
            text-align: center;
        }
        
        .view-details {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.8rem;
            display: inline-block;
            margin-top: 10px;
        }
        
        /* Calendar Section */
        .calendar-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        #calendar {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            height: 350px;
        }
        
        .fc .fc-toolbar-title {
            font-size: 1.1rem;
        }
        
        .fc .fc-daygrid-day-frame {
            min-height: 40px;
        }
        
        .upcoming-interviews {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            padding: 15px;
        }
        
        .interview-item {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .interview-time {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .view-all {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.8rem;
            display: block;
            text-align: right;
            margin-top: 10px;
        }
        
        /* Applicants Table */
        .applicants-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .applicants-header {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }
        
        .applicant-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .applicant-table th {
            background-color: #f8f9fa;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.8rem;
            color: #555;
        }
        
        .applicant-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            font-size: 0.9rem;
        }
        
        .status-badge {
            padding: 4px 8px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }
        
        .status-review {
            background-color: rgba(23, 162, 184, 0.1);
            color: #17a2b8;
        }
        
        .status-approved {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        
        .status-interview {
            background-color: rgba(111, 66, 193, 0.1);
            color: #6f42c1;
        }
        
        .view-applicant {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.8rem;
        }
        
        /* Profile Section */
        .profile-section {
            padding: 15px;
            border-top: 1px solid #eee;
            margin-top: auto;
        }
        
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="sidebar d-flex flex-column">
                <div class="logo-area">
                    <h4>W.I.E.A.S</h4>
                </div>
                                   
                <ul class="nav nav-pills flex-column mb-auto p-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-briefcase"></i>
                            Jobs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-chart-line"></i>
                            Analytics
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-alt"></i>
                            Schedules
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i>
                            Applicants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-bell"></i>
                            Notifications
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-cog"></i>
                            Settings
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <a href="#" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                    
                    <!-- Profile Section -->
                    <li class="nav-item mt-3">
                        <div class="d-flex align-items-center ps-3">
                            <img src="https://via.placeholder.com/40" alt="Profile" class="profile-img me-2">
                            <div>
                                <p class="mb-0 fw-bold">Bogart Batumbakal</p>
                                <small class="text-muted">bogartb66@gmail.com</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- Main Content -->
            <div class="col main-content">
                <!-- Stats Cards -->
                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-header">Total Applicants</div>
                        <div class="stat-number">130</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">New Applicants</div>
                        <div class="stat-number">20</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">Upcoming Interview</div>
                        <div class="stat-number">20</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">Upcoming Review</div>
                        <div class="stat-number">20</div>
                    </div>
                </div>
                                
                <!-- Job Cards NOTE REPLACE CLASS NAME -->
                <div class="applicants-container"> 
                    <div class="applicants-header">Job List</div>
                    <table class="applicant-table">
                        <thead>
                            <tr>
                                <th>Job Name</th>
                                <th>Job Location</th>
                                <th>Job Type</th>
                                <th>Applicants</th>
                                <th>Date Posted</th>
                                <th>Job Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>WORKER STEEL STRUCTURE</strong></td>
                                <td>Worker Steel Structure</td>
                                <td>Contractors & Engineering</td>
                                <td>30</td>
                                <td>03/11/2024</td>
                                <td><span class="status-badge status-pending">Archive</span></td>
                                <td><a href="#" class="view-applicant">View</a></td>
                            </tr>
                            <tr>
                                <td><strong>WORKER STEEL STRUCTURE</strong></td>
                                <td>Worker Steel Structure</td>
                                <td>Contractors & Engineering</td>
                                <td>30</td>
                                <td>03/11/2024</td>
                                <td><span class="status-badge status-approved">Active</span></td>
                                <td><a href="#" class="view-applicant">View</a></td>
                            </tr>
                            <tr>
                                <td><strong>WORKER STEEL STRUCTURE</strong></td>
                                <td>Worker Steel Structure</td>
                                <td>Contractors & Engineering</td>
                                <td>30</td>
                                <td>03/11/2024</td>
                                <td><span class="status-badge status-approved">Active</span></td>
                                <td><a href="#" class="view-applicant">View</a></td>
                            </tr>
                            <tr>
                                <td><strong>WORKER STEEL STRUCTURE</strong></td>
                                <td>Worker Steel Structure</td>
                                <td>Contractors & Engineering</td>
                                <td>30</td>
                                <td>03/11/2024</td>
                                <td><span class="status-badge status-approved">Active</span></td>
                                <td><a href="#" class="view-applicant">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Calendar Section -->
                <div class="calendar-section">
                    <div id="calendar"></div>
                    
                    <div class="upcoming-interviews">
                        <h5>Upcoming Interviews</h5>
                        <div class="interview-item">
                            <span>Bogart Batumbakal</span>
                            <span class="interview-time">0800</span>
                        </div>
                        <div class="interview-item">
                            <span>Bogart Batumbakal</span>
                            <span class="interview-time">0800</span>
                        </div>
                        <div class="interview-item">
                            <span>Bogart Batumbakal</span>
                            <span class="interview-time">1000</span>
                        </div>
                        <div class="interview-item">
                            <span>Bogart Batumbakal</span>
                            <span class="interview-time">1400</span>
                        </div>
                        <a href="#" class="view-all">View All</a>
                    </div>
                </div>
                
                <!-- Applicants Table -->
                <div class="applicants-container">
                    <div class="applicants-header">Applicants</div>
                    <table class="applicant-table">
                        <thead>
                            <tr>
                                <th>Applicant Name</th>
                                <th>Applying at</th>
                                <th>Job Type</th>
                                <th>Applicant Status</th>
                                <th>Date</th>
                                <th>Application Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Bogart Batumbakal</strong></td>
                                <td>Worker Steel Structure</td>
                                <td>Contractors & Signatures</td>
                                <td>Admin</td>
                                <td>03/11/2024</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td><a href="#" class="view-applicant">View</a></td>
                            </tr>
                            <tr>
                                <td><strong>Bogart Batumbakal</strong></td>
                                <td>Worker Steel Structure</td>
                                <td>Contractors & Signatures</td>
                                <td>Admin</td>
                                <td>03/11/2024</td>
                                <td><span class="status-badge status-review">To Review</span></td>
                                <td><a href="#" class="view-applicant">View</a></td>
                            </tr>
                            <tr>
                                <td><strong>Bogart Batumbakal</strong></td>
                                <td>Worker Steel Structure</td>
                                <td>Contractors & Signatures</td>
                                <td>Admin</td>
                                <td>03/11/2024</td>
                                <td><span class="status-badge status-approved">Approved</span></td>
                                <td><a href="#" class="view-applicant">View</a></td>
                            </tr>
                            <tr>
                                <td><strong>Bogart Batumbakal</strong></td>
                                <td>Worker Steel Structure</td>
                                <td>Contractors & Signatures</td>
                                <td>Admin</td>
                                <td>03/11/2024</td>
                                <td><span class="status-badge status-interview">To Interview</span></td>
                                <td><a href="#" class="view-applicant">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize calendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                height: '100%',
                aspectRatio: 1.5,
                dayMaxEventRows: 2,
                events: [
                    {
                        title: 'Interview: John Doe',
                        start: new Date().toISOString().split('T')[0],
                        color: '#3a7bd5'
                    },
                    {
                        title: 'Technical Screening',
                        start: new Date(new Date().setDate(new Date().getDate() + 2)).toISOString().split('T')[0],
                        color: '#00d2ff'
                    },
                    {
                        title: 'HR Meeting',
                        start: new Date(new Date().setDate(new Date().getDate() + 5)).toISOString().split('T')[0],
                        color: '#6f42c1'
                    }
                ],
                dateClick: function(info) {
                    alert('Clicked on: ' + info.dateStr);
                    // You can add functionality to create new events/interviews here
                },
                eventClick: function(info) {
                    alert('Event: ' + info.event.title + '\n' +
                          'Date: ' + info.event.start.toLocaleDateString());
                    // You can add more detailed event handling here
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>