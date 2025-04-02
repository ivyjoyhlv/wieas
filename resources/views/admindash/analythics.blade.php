<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            padding-left: 250px; /* Account for fixed sidebar */
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
            z-index: 1000; /* Ensure sidebar stays above other content */
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
            color: var(--primary-color);
            font-size: 0.8rem;
            text-decoration: none;
        }
        
        .view-all-btn:hover {
            text-decoration: underline;
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
                        
                        <!-- Profile Section positioned right below Logout -->
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
                
                {{-- 
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card p-3">
                            <div class="card-body text-center">
                                <div class="stat-number">20</div>
                                <div class="stat-title">Total Applicants</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card p-3">
                            <div class="card-body text-center">
                                <div class="stat-number">20</div>
                                <div class="stat-title">Active Job Listing</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card p-3">
                            <div class="card-body text-center">
                                <div class="stat-number">20</div>
                                <div class="stat-title">Upcoming Interviews</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card p-3">
                            <div class="card-body text-center">
                                <div class="stat-number">20</div>
                                <div class="stat-title">For Placements</div>
                            </div>
                        </div>
                    </div>
                </div>
                     --}}

                <!-- Applicants Summary Main Card -->
                <div class="main-card">
                    <div class="main-card-header">
                        <h5 class="mb-0">Applicants Summary</h5>
                        <a href="#" class="view-all-btn">View All</a>
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
                        <a href="#" class="view-all-btn">View All</a>
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gender Chart (Pie)
            const genderCtx = document.getElementById('genderChart').getContext('2d');
            const genderChart = new Chart(genderCtx, {
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
                        borderColor: [
                            'rgba(58, 123, 213, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            
            // Subject Breakdown Chart (Horizontal Bar)
            const subjectCtx = document.getElementById('subjectChart').getContext('2d');
            const subjectChart = new Chart(subjectCtx, {
                type: 'bar',
                data: {
                    labels: ['Wider', 'Hello', 'Education', 'Wider', 'Hello', 'Education'],
                    datasets: [{
                        label: '2023',
                        data: [35, 19, 63, 38, 26, 15],
                        backgroundColor: 'rgba(58, 123, 213, 0.7)',
                        borderColor: 'rgba(58, 123, 213, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });
            
            // Experience Level Chart (Horizontal Bar)
            const experienceCtx = document.getElementById('experienceChart').getContext('2d');
            const experienceChart = new Chart(experienceCtx, {
                type: 'bar',
                data: {
                    labels: ['Major', 'Home', 'Education', 'Wider', 'Home', 'Education'],
                    datasets: [{
                        label: '2023',
                        data: [35, 66, 56, 64, 68, 15],
                        backgroundColor: 'rgba(0, 210, 255, 0.7)',
                        borderColor: 'rgba(0, 210, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });
            
            // Application Trends Chart (Line)
            const trendsCtx = document.getElementById('applicationTrendsChart').getContext('2d');
            const trendsChart = new Chart(trendsCtx, {
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
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            
            // Job Popularity Chart (Bar)
            const popularityCtx = document.getElementById('jobPopularityChart').getContext('2d');
            const popularityChart = new Chart(popularityCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Job Popularity',
                        data: [100, 80, 60, 40, 20, 0],
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            
            // Approval Chart (Doughnut)
            const approvalCtx = document.getElementById('approvalChart').getContext('2d');
            const approvalChart = new Chart(approvalCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Approved', 'Disapproved'],
                    datasets: [{
                        data: [75, 25],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 99, 132, 0.7)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
            
            // Job Category Chart (Bar)
            const jobCategoryCtx = document.getElementById('jobCategoryChart').getContext('2d');
            const jobCategoryChart = new Chart(jobCategoryCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Job Categories',
                        data: [100, 80, 60, 40, 20, 0],
                        backgroundColor: 'rgba(153, 102, 255, 0.7)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>