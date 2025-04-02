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
        }
        
        .sidebar {
            background-color: white;
            min-height: 100vh;
            color: black;
            border-right: 1px solid #ddd;
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
        
        .search-box {
            border-radius: 20px;
            padding-left: 40px;
            background-color: #f1f3f5;
            border: none;
        }
        
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
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
        
        .gender-chart-container {
            position: relative;
            height: 200px;
            width: 100%;
            margin-bottom: 20px;
        }
        
        .gender-legend {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }
        
        .chart-title {
            text-align: center;
            margin-bottom: 10px;
            font-weight: 500;
        }
        
        .sidebar-profile {
            padding: 15px;
            border-top: 1px solid #eee;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
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
                        <li class="nav-item">
                            <a href="{{ route('admin.signin') }}" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                    
                    <!-- Profile Section in Sidebar -->
                    <div class="sidebar-profile">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/40" alt="Profile" class="profile-img me-2">
                            <div>
                                <p class="mb-0 fw-bold">Bogart Batumbakal</p>
                                <small class="text-muted">bogartb68@gmail.com</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10 ms-sm-auto p-4">
                <!-- Top Bar -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Analytics Overview</h2>
                </div>

                <!-- Applicants Summary Main Card -->
                <div class="main-card">
                    <div class="main-card-header">
                        <h5 class="mb-0">Applicants Summary</h5>
                        <a href="#" class="view-all-btn">View All</a>
                    </div>
                    <div class="main-card-body">
                        <div class="row">
                            <!-- Age Profile Sub Card (Now with Pie Chart) -->
                            <div class="col-md-4 mb-4">
                                <div class="sub-card">
                                    <h6 class="chart-title">Age Profile</h6>
                                    <div class="gender-chart-container">
                                        <canvas id="ageChart"></canvas>
                                    </div>
                                    <div class="gender-legend">
                                        <div><span class="gender-badge male-badge me-1"></span> 20-30</div>
                                        <div><span class="gender-badge female-badge me-1"></span> 30-40</div>
                                        <div><span class="gender-badge other-badge me-1"></span> 40-50</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Gender Profile Sub Card (Adjusted layout) -->
                            <div class="col-md-4 mb-4">
                                <div class="sub-card">
                                    <h6 class="chart-title">Gender Profile</h6>
                                    <div class="gender-chart-container">
                                        <canvas id="genderChart"></canvas>
                                    </div>
                                    <div class="gender-legend">
                                        <div><span class="gender-badge male-badge me-1"></span> Male</div>
                                        <div><span class="gender-badge female-badge me-1"></span> Female</div>
                                        <div><span class="gender-badge other-badge me-1"></span> Others</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Location Profile Sub Card (Now with Pie Chart) -->
                            <div class="col-md-4 mb-4">
                                <div class="sub-card">
                                    <h6 class="chart-title">Location Profile</h6>
                                    <div class="gender-chart-container">
                                        <canvas id="locationChart"></canvas>
                                    </div>
                                    <div class="gender-legend">
                                        <div><span class="gender-badge male-badge me-1"></span> Metro Manila</div>
                                        <div><span class="gender-badge female-badge me-1"></span> Luzon</div>
                                        <div><span class="gender-badge other-badge me-1"></span> Visayas</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Experience Level (Now with Progress Bars) -->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="sub-card">
                                    <h6>Experience Level</h6>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Less than 1 year</span>
                                            <span>25%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>1-3 years</span>
                                            <span>45%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 45%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>3-5 years</span>
                                            <span>20%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 20%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>5+ years</span>
                                            <span>10%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 10%"></div>
                                        </div>
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
            // Age Profile Chart (Pie)
            const ageCtx = document.getElementById('ageChart').getContext('2d');
            const ageChart = new Chart(ageCtx, {
                type: 'pie',
                data: {
                    labels: ['20-30', '30-40', '40-50'],
                    datasets: [{
                        data: [35, 19, 63],
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

            // Gender Chart (Pie) - Adjusted layout
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

            // Location Profile Chart (Pie)
            const locationCtx = document.getElementById('locationChart').getContext('2d');
            const locationChart = new Chart(locationCtx, {
                type: 'pie',
                data: {
                    labels: ['Metro Manila', 'Luzon', 'Visayas'],
                    datasets: [{
                        data: [35, 66, 56],
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