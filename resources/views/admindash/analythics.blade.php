<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #3a7bd5;
            --secondary-color: #00d2ff;
            --sidebar-bg: #2c3e50;
            --card-hover: rgba(58, 123, 213, 0.1);
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
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
        }
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: var(--primary-color);
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
        }
               
        .stat-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .stat-title {
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .progress {
            height: 8px;
            border-radius: 4px;
        }
        
        .progress-bar {
            background-color: var(--primary-color);
        }
        
        .chart-container {
            position: relative;
            height: 250px;
            width: 100%;
        }
        
        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 1.5rem;
        }
        
        .gender-badge {
            font-size: 0.8rem;
            padding: 5px 10px;
            border-radius: 20px;
        }
        
        .male-badge {
            background-color: rgba(58, 123, 213, 0.1);
            color: var(--primary-color);
        }
        
        .female-badge {
            background-color: rgba(255, 99, 132, 0.1);
            color: #ff6384;
        }
        
        .other-badge {
            background-color: rgba(75, 192, 192, 0.1);
            color: #4bc0c0;
        }
        
        .main-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        
        .main-card-header {
            padding: 15px 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .main-card-body {
            padding: 20px;
        }
        
        .sub-card {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 15px;
            height: 100%;
        }
        
        .view-all-btn {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .view-all-btn:hover {
            background-color: #2c5fb3;
            color: white;
            text-decoration: none;
        }
        
        .view-all-btn i {
            margin-left: 5px;
            font-size: 0.7rem;
        }

        /* Modal Styles */
        .analytics-modal .modal-dialog {
            max-width: 95%;
        }
        
        .analytics-modal .modal-content {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .analytics-modal .modal-header {
            border-bottom: 1px solid #eee;
            padding: 20px;
        }
        
        .analytics-modal .modal-title {
            font-size: 20px;
            font-weight: 600;
        }
        
        .analytics-modal .exit-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: bold;
        }
        
        .analytics-modal .nav-tabs {
            display: flex;
            padding: 0 20px;
            border-bottom: 1px solid #eee;
        }
        
        .analytics-modal .nav-tab {
            padding: 12px 16px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            margin-right: 5px;
            color: #666;
            font-weight: 500;
        }
        
        .analytics-modal .nav-tab.active {
            border-bottom: 2px solid #4CAF50;
            color: #333;
            font-weight: 600;
        }
        
        .analytics-modal .analytics-content {
            padding: 20px;
            display: none;
        }
        
        .analytics-modal .analytics-content.active {
            display: block;
        }
        
        .analytics-modal .search-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .analytics-modal .search-bar input, 
        .analytics-modal .search-bar select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            min-width: 120px;
        }
        
        .analytics-modal .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 20px;
        }
        
        .analytics-modal .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .analytics-modal .stat-card {
            background-color: #f8f8f8;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
        }
        
        .analytics-modal .stat-card h3 {
            margin: 0 0 5px 0;
            font-size: 14px;
            color: #666;
        }
        
        .analytics-modal .stat-card p {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        
        .analytics-modal table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .analytics-modal th, 
        .analytics-modal td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .analytics-modal th {
            background-color: #f8f8f8;
            font-weight: bold;
        }
        
        .analytics-modal .view-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="d-flex flex-column p-3 h-100">
                    <div class="text-center mb-4">
                        <h4>W.I.E.A.S</h4>
                    </div>
                                       
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('admindash.index') }}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admindash.joblist') }}" class="nav-link">
                                <i class="fas fa-briefcase"></i>
                                Jobs
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="{{ route('admindash.analythics') }}" class="nav-link active">
                                <i class="fas fa-chart-line"></i>
                                Analytics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admindash.conference') }}" class="nav-link">
                                <i class="fas fa-calendar-alt"></i>
                                Schedules
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admindash.applicants') }}" class="nav-link">
                                <i class="fas fa-users"></i>
                                Applicants
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admindash.notification') }}" class="nav-link">
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
                            <a href="{{ route('admin.signin') }}" class="nav-link">
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
                                    <small class="text-muted">bogartb68@gmail.com</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-15 ms-sm-auto p-4">
                <!-- Applicants Summary Main Card -->
                <div class="main-card">
                    <div class="main-card-header">
                        <h5 class="mb-0">Applicants Summary</h5>
                        <button type="button" class="view-all-btn" data-bs-toggle="modal" data-bs-target="#applicantsModal">
                            View All
                        </button>
                    </div>
                    <div class="main-card-body">
                        <div class="row">
                            <!-- Age Profile Sub Card -->
                            <div class="col-md-4 mb-4">
                                <div class="sub-card">
                                    <h6>Age Profile</h6>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>20-30</span>
                                            <span>35%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 35%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>30-40</span>
                                            <span>19%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 19%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>40-50</span>
                                            <span>63%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 63%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>50-60</span>
                                            <span>38%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 38%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Gender Profile Sub Card -->
                            <div class="col-md-4 mb-4">
                                <div class="sub-card">
                                    <h6>Gender Profile</h6>
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="gender-badge male-badge me-2">Male</span>
                                        <span>65%</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="gender-badge female-badge me-2">Female</span>
                                        <span>30%</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="gender-badge other-badge me-2">Others</span>
                                        <span>25%</span>
                                    </div>
                                    <div class="chart-container mt-3">
                                        <canvas id="genderChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Location Profile Sub Card -->
                            <div class="col-md-4 mb-4">
                                <div class="sub-card">
                                    <h6>Location Profile</h6>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Luzon</span>
                                            <span>66%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 66%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Visayas</span>
                                            <span>56%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 56%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Mindanao</span>
                                            <span>64%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 64%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Subject Breakdown and Experience Level -->
                        <div class="row mt-3">
                            <!-- Subject Breakdown Sub Card -->
                            <div class="col-md-6 mb-3">
                                <div class="sub-card">
                                    <h6>Subject Breakdown</h6>
                                    <div class="chart-container">
                                        <canvas id="subjectChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Experience Level Sub Card -->
                            <div class="col-md-6 mb-3">
                                <div class="sub-card">
                                    <h6>Experience Level</h6>
                                    <div class="chart-container">
                                        <canvas id="experienceChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Job Application Analytics Main Card -->
                <div class="main-card">
                    <div class="main-card-header">
                        <h5 class="mb-0">Job Application Analytics</h5>
                        <button type="button" class="view-all-btn" data-bs-toggle="modal" data-bs-target="#jobsModal">
                            View All
                        </button>
                    </div>
                    <div class="main-card-body">
                        <div class="row">
                            <!-- Application Trends Sub Card -->
                            <div class="col-md-6 mb-4">
                                <div class="sub-card">
                                    <h6>Application Trends</h6>
                                    <div class="chart-container">
                                        <canvas id="applicationTrendsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Job Popularity Insights Sub Card -->
                            <div class="col-md-6 mb-4">
                                <div class="sub-card">
                                    <h6>Job Popularity Insights</h6>
                                    <div class="chart-container">
                                        <canvas id="jobPopularityChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Approved vs Disapproved and Job Category Insights -->
                        <div class="row mt-3">
                            <!-- Approved vs Disapproved Sub Card -->
                            <div class="col-md-6 mb-3">
                                <div class="sub-card">
                                    <h6>Approved vs. Disapproved</h6>
                                    <div class="chart-container">
                                        <canvas id="approvalChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Job Category Insights Sub Card -->
                            <div class="col-md-6 mb-3">
                                <div class="sub-card">
                                    <h6>Job Category Insights</h6>
                                    <div class="chart-container">
                                        <canvas id="jobCategoryChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Applicants Summary Modal -->
    <div class="modal fade analytics-modal" id="applicantsModal" tabindex="-1" aria-labelledby="applicantsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="applicantsModalLabel">Applicants Analytics Overview</h5>
                    <button type="button" class="exit-btn" data-bs-dismiss="modal">Exit</button>
                </div>
                
                <div class="nav-tabs">
                    <div class="nav-tab active" data-tab="age">Age Profile</div>
                    <div class="nav-tab" data-tab="gender">Gender Profile</div>
                    <div class="nav-tab" data-tab="location">Applicant Location</div>
                    <div class="nav-tab" data-tab="experience">Experience Level</div>
                </div>
                
                <!-- Age Profile Content -->
                <div class="analytics-content active" id="ageContent">
                    <div class="search-bar">
                        <input type="text" placeholder="Search by Name">
                        <select>
                            <option>All Age</option>
                            <option>18-24</option>
                            <option>25-34</option>
                            <option>35-44</option>
                            <option>45+</option>
                        </select>
                        <select>
                            <option>All Status</option>
                            <option>Pending</option>
                            <option>Approved</option>
                            <option>Rejected</option>
                        </select>
                    </div>
                    
                    <div class="chart-container">
                        <canvas id="applicantsAgeChart"></canvas>
                    </div>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <h3>18-24</h3>
                            <p>15%</p>
                        </div>
                        <div class="stat-card">
                            <h3>25-34</h3>
                            <p>35%</p>
                        </div>
                        <div class="stat-card">
                            <h3>35-44</h3>
                            <p>30%</p>
                        </div>
                        <div class="stat-card">
                            <h3>45+</h3>
                            <p>20%</p>
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Applicant Name</th>
                                <th>Position</th>
                                <th>Age</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bogart Batumbakal</td>
                                <td>Worker Steel Structure</td>
                                <td>34</td>
                                <td>Pending</td>
                                <td><button class="view-button">View</button></td>
                            </tr>
                            <tr>
                                <td>Juan Dela Cruz</td>
                                <td>Senior Developer</td>
                                <td>28</td>
                                <td>Approved</td>
                                <td><button class="view-button">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Gender Profile Content -->
                <div class="analytics-content" id="genderContent">
                    <div class="search-bar">
                        <input type="text" placeholder="Search by Name">
                        <select>
                            <option>All Genders</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    
                    <div class="chart-container">
                        <canvas id="applicantsGenderChart"></canvas>
                    </div>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <h3>Male</h3>
                            <p>65%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Female</h3>
                            <p>30%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Other</h3>
                            <p>5%</p>
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Maria Santos</td>
                                <td>Female</td>
                                <td>HR Manager</td>
                                <td>Approved</td>
                                <td><button class="view-button">View</button></td>
                            </tr>
                            <tr>
                                <td>John Smith</td>
                                <td>Male</td>
                                <td>Software Engineer</td>
                                <td>Pending</td>
                                <td><button class="view-button">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Applicant Location Content -->
                <div class="analytics-content" id="locationContent">
                    <div class="search-bar">
                        <input type="text" placeholder="Search by Location">
                        <select>
                            <option>All Regions</option>
                            <option>Luzon</option>
                            <option>Visayas</option>
                            <option>Mindanao</option>
                        </select>
                    </div>
                    
                    <div class="chart-container">
                        <canvas id="applicantsLocationChart"></canvas>
                    </div>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <h3>Luzon</h3>
                            <p>66%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Visayas</h3>
                            <p>56%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Mindanao</h3>
                            <p>64%</p>
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Location</th>
                                <th>Applicants</th>
                                <th>Approval Rate</th>
                                <th>Top Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Luzon</td>
                                <td>312</td>
                                <td>72%</td>
                                <td>Technician</td>
                            </tr>
                            <tr>
                                <td>Visayas</td>
                                <td>374</td>
                                <td>65%</td>
                                <td>Developer</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Experience Level Content -->
                <div class="analytics-content" id="experienceContent">
                    <div class="search-bar">
                        <input type="text" placeholder="Search by Experience">
                        <select>
                            <option>All Experience Levels</option>
                            <option>Entry Level (0-2 yrs)</option>
                            <option>Mid Level (3-5 yrs)</option>
                            <option>Senior Level (5+ yrs)</option>
                        </select>
                    </div>
                    
                    <div class="chart-container">
                        <canvas id="applicantsExperienceChart"></canvas>
                    </div>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <h3>Entry Level</h3>
                            <p>35%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Mid Level</h3>
                            <p>19%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Senior Level</h3>
                            <p>63%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Executive</h3>
                            <p>38%</p>
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Experience Level</th>
                                <th>Applicants</th>
                                <th>Avg. Salary</th>
                                <th>Hire Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Entry Level</td>
                                <td>120</td>
                                <td>$45,000</td>
                                <td>22%</td>
                            </tr>
                            <tr>
                                <td>Mid Level</td>
                                <td>80</td>
                                <td>$75,000</td>
                                <td>35%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Application Analytics Modal -->
    <div class="modal fade analytics-modal" id="jobsModal" tabindex="-1" aria-labelledby="jobsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jobsModalLabel">Job Application Analytics Overview</h5>
                    <button type="button" class="exit-btn" data-bs-dismiss="modal">Exit</button>
                </div>
                
                <div class="nav-tabs">
                    <div class="nav-tab active" data-tab="trends">Application Trends</div>
                    <div class="nav-tab" data-tab="popularity">Job Popularity</div>
                    <div class="nav-tab" data-tab="approval">Approval Status</div>
                    <div class="nav-tab" data-tab="categories">Job Categories</div>
                </div>
                
                <!-- Application Trends Content -->
                <div class="analytics-content active" id="trendsContent">
                    <div class="search-bar">
                        <select>
                            <option>Last 6 Months</option>
                            <option>Last Year</option>
                            <option>Last 2 Years</option>
                        </select>
                        <select>
                            <option>All Positions</option>
                            <option>Technical</option>
                            <option>Administrative</option>
                            <option>Management</option>
                        </select>
                    </div>
                    
                    <div class="chart-container">
                        <canvas id="jobsTrendsChart"></canvas>
                    </div>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <h3>Total Applications</h3>
                            <p>1,245</p>
                        </div>
                        <div class="stat-card">
                            <h3>Avg. Monthly</h3>
                            <p>208</p>
                        </div>
                        <div class="stat-card">
                            <h3>Peak Month</h3>
                            <p>March</p>
                        </div>
                        <div class="stat-card">
                            <h3>Lowest Month</h3>
                            <p>December</p>
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Applications</th>
                                <th>Approved</th>
                                <th>Rejected</th>
                                <th>Pending</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>January</td>
                                <td>210</td>
                                <td>120</td>
                                <td>60</td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>February</td>
                                <td>195</td>
                                <td>110</td>
                                <td>55</td>
                                <td>30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Job Popularity Content -->
                <div class="analytics-content" id="popularityContent">
                    <div class="search-bar">
                        <select>
                            <option>By Applications</option>
                            <option>By Approval Rate</option>
                            <option>By Completion Rate</option>
                        </select>
                    </div>
                    
                    <div class="chart-container">
                        <canvas id="jobsPopularityChart"></canvas>
                    </div>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <h3>Most Popular</h3>
                            <p>Developer</p>
                        </div>
                        <div class="stat-card">
                            <h3>Least Popular</h3>
                            <p>HR Assistant</p>
                        </div>
                        <div class="stat-card">
                            <h3>Highest Approval</h3>
                            <p>Data Analyst</p>
                        </div>
                        <div class="stat-card">
                            <h3>Fastest Hiring</h3>
                            <p>Customer Support</p>
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Position</th>
                                <th>Applications</th>
                                <th>Approval Rate</th>
                                <th>Avg. Time to Hire</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Software Developer</td>
                                <td>320</td>
                                <td>65%</td>
                                <td>14 days</td>
                                <td><button class="view-button">View</button></td>
                            </tr>
                            <tr>
                                <td>HR Manager</td>
                                <td>85</td>
                                <td>72%</td>
                                <td>21 days</td>
                                <td><button class="view-button">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Approval Status Content -->
                <div class="analytics-content" id="approvalContent">
                    <div class="search-bar">
                        <select>
                            <option>All Time</option>
                            <option>Last Month</option>
                            <option>Last Quarter</option>
                        </select>
                        <select>
                            <option>All Positions</option>
                            <option>Technical</option>
                            <option>Non-Technical</option>
                        </select>
                    </div>
                    
                    <div class="chart-container">
                        <canvas id="jobsApprovalChart"></canvas>
                    </div>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <h3>Approved</h3>
                            <p>75%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Rejected</h3>
                            <p>20%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Pending</h3>
                            <p>5%</p>
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Count</th>
                                <th>Percentage</th>
                                <th>Avg. Process Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Approved</td>
                                <td>935</td>
                                <td>75%</td>
                                <td>7 days</td>
                            </tr>
                            <tr>
                                <td>Rejected</td>
                                <td>249</td>
                                <td>20%</td>
                                <td>5 days</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Job Categories Content -->
                <div class="analytics-content" id="categoriesContent">
                    <div class="search-bar">
                        <select>
                            <option>All Categories</option>
                            <option>Technical</option>
                            <option>Administrative</option>
                            <option>Management</option>
                        </select>
                    </div>
                    
                    <div class="chart-container">
                        <canvas id="jobsCategoriesChart"></canvas>
                    </div>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <h3>Technical</h3>
                            <p>65%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Administrative</h3>
                            <p>20%</p>
                        </div>
                        <div class="stat-card">
                            <h3>Management</h3>
                            <p>15%</p>
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Open Positions</th>
                                <th>Applications</th>
                                <th>Approval Rate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Technical</td>
                                <td>24</td>
                                <td>810</td>
                                <td>70%</td>
                                <td><button class="view-button">View</button></td>
                            </tr>
                            <tr>
                                <td>Administrative</td>
                                <td>12</td>
                                <td>250</td>
                                <td>65%</td>
                                <td><button class="view-button">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all charts on the main page
            initMainPageCharts();
            
            // Initialize modal functionality
            initModals();
            
            // Set up tab navigation for both modals
            setupModalTabs('#applicantsModal');
            setupModalTabs('#jobsModal');
        });
        
        function initMainPageCharts() {
            // Gender Chart (Pie)
            new Chart(document.getElementById('genderChart').getContext('2d'), {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female', 'Others'],
                    datasets: [{
                        data: [65, 30, 5],
                        backgroundColor: [
                            'rgba(58, 123, 213, 0.7)',
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(75, 192, 192, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } }
                }
            });
            
            // Subject Breakdown Chart (Horizontal Bar)
            new Chart(document.getElementById('subjectChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Wider', 'Hello', 'Education', 'Wider', 'Hello', 'Education'],
                    datasets: [{
                        label: '2023',
                        data: [35, 19, 63, 38, 26, 15],
                        backgroundColor: 'rgba(58, 123, 213, 0.7)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { x: { beginAtZero: true, max: 100 } }
                }
            });
            
            // Experience Level Chart (Horizontal Bar)
            new Chart(document.getElementById('experienceChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Major', 'Home', 'Education', 'Wider', 'Home', 'Education'],
                    datasets: [{
                        label: '2023',
                        data: [35, 66, 56, 64, 68, 15],
                        backgroundColor: 'rgba(0, 210, 255, 0.7)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { x: { beginAtZero: true, max: 100 } }
                }
            });
            
            // Application Trends Chart (Line)
            new Chart(document.getElementById('applicationTrendsChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Applications',
                        data: [1000, 800, 600, 400, 200, 0],
                        backgroundColor: 'rgba(58, 123, 213, 0.2)',
                        borderColor: 'rgba(58, 123, 213, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
            
            // Job Popularity Chart (Bar)
            new Chart(document.getElementById('jobPopularityChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Job Popularity',
                        data: [100, 80, 60, 40, 20, 0],
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
            
            // Approval Chart (Doughnut)
            new Chart(document.getElementById('approvalChart').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Approved', 'Disapproved'],
                    datasets: [{
                        data: [75, 25],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 99, 132, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: 'bottom' } }
                }
            });
            
            // Job Category Chart (Bar)
            new Chart(document.getElementById('jobCategoryChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Job Categories',
                        data: [100, 80, 60, 40, 20, 0],
                        backgroundColor: 'rgba(153, 102, 255, 0.7)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        }
        
        function initModals() {
            // Applicants Modal
            const applicantsModal = document.getElementById('applicantsModal');
            applicantsModal.addEventListener('show.bs.modal', function() {
                initApplicantsModalCharts();
            });
            
            // Jobs Modal
            const jobsModal = document.getElementById('jobsModal');
            jobsModal.addEventListener('show.bs.modal', function() {
                initJobsModalCharts();
            });
        }
        
        function initApplicantsModalCharts() {
            // Age Chart
            new Chart(document.getElementById('applicantsAgeChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['18-24', '25-34', '35-44', '45-54', '55+'],
                    datasets: [{
                        label: 'Applicants by Age',
                        data: [15, 35, 30, 15, 5],
                        backgroundColor: 'rgba(58, 123, 213, 0.7)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } }
                }
            });
            
            // Gender Chart
            new Chart(document.getElementById('applicantsGenderChart').getContext('2d'), {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female', 'Other'],
                    datasets: [{
                        data: [65, 30, 5],
                        backgroundColor: [
                            'rgba(58, 123, 213, 0.7)',
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(75, 192, 192, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
            
            // Location Chart
            new Chart(document.getElementById('applicantsLocationChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Luzon', 'Visayas', 'Mindanao'],
                    datasets: [{
                        label: 'Applicants by Location',
                        data: [66, 56, 64],
                        backgroundColor: 'rgba(0, 210, 255, 0.7)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } }
                }
            });
            
            // Experience Chart
            new Chart(document.getElementById('applicantsExperienceChart').getContext('2d'), {
                type: 'horizontalBar',
                data: {
                    labels: ['Entry Level', 'Mid Level', 'Senior Level', 'Executive'],
                    datasets: [{
                        label: 'Applicants by Experience',
                        data: [35, 19, 63, 38],
                        backgroundColor: 'rgba(153, 102, 255, 0.7)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { x: { beginAtZero: true } }
                }
            });
        }
        
        function initJobsModalCharts() {
            // Trends Chart
            new Chart(document.getElementById('jobsTrendsChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Applications',
                        data: [210, 195, 250, 230, 200, 180],
                        backgroundColor: 'rgba(58, 123, 213, 0.2)',
                        borderColor: 'rgba(58, 123, 213, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } }
                }
            });
            
            // Popularity Chart
            new Chart(document.getElementById('jobsPopularityChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Developer', 'HR Manager', 'Data Analyst', 'Support', 'Designer'],
                    datasets: [{
                        label: 'Applications',
                        data: [320, 85, 120, 150, 90],
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } }
                }
            });
            
            // Approval Chart
            new Chart(document.getElementById('jobsApprovalChart').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Approved', 'Rejected', 'Pending'],
                    datasets: [{
                        data: [75, 20, 5],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(255, 205, 86, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
            
            // Categories Chart
            new Chart(document.getElementById('jobsCategoriesChart').getContext('2d'), {
                type: 'pie',
                data: {
                    labels: ['Technical', 'Administrative', 'Management'],
                    datasets: [{
                        data: [65, 20, 15],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }
        
        function setupModalTabs(modalId) {
            const modal = document.querySelector(modalId);
            
            modal.querySelectorAll('.nav-tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active class from all tabs and content in this modal
                    modal.querySelectorAll('.nav-tab').forEach(t => t.classList.remove('active'));
                    modal.querySelectorAll('.analytics-content').forEach(c => c.classList.remove('active'));
                    
                    // Add active class to clicked tab and corresponding content
                    tab.classList.add('active');
                    const tabId = tab.getAttribute('data-tab');
                    modal.querySelector(`#${tabId}Content`).classList.add('active');
                });
            });
        }
    </script>
</body>
</html>