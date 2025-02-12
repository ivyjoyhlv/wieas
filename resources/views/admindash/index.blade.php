<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (Icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background-color: #f4f5fa; }
        .card { border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .analytics-card { display: flex; align-items: center; justify-content: space-between; padding: 20px; }
        .analytics-icon { width: 40px; height: 40px; }
        .schedule-card { text-align: center; padding: 20px; }
        .calendar { background: white; padding: 15px; border-radius: 12px; text-align: center; }
        .calendar table { width: 100%; }
        .calendar th, .calendar td { padding: 10px; text-align: center; }
        .nav-link i { margin-right: 10px; }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-white p-3 vh-100" style="width: 250px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        <!-- Logo -->
        <div class="d-flex align-items-center mb-4">
            <div class="rounded-circle" style="width: 30px; height: 30px; background-color: #3498db;"></div>
            <h4 class="ms-3 text-primary">Logo</h4>
        </div>
        <!-- Menu items -->
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="#" class="nav-link active d-flex justify-content-between align-items-center">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center">
                    <i class="fas fa-briefcase"></i> Jobs
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center">
                    <i class="fas fa-chart-line"></i> Analytics
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center">
                    <i class="fas fa-calendar-alt"></i> Schedules <span class="badge bg-danger">2</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center">
                    <i class="fas fa-users"></i> Applicants <span class="badge bg-danger">2</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center">
                    <i class="fas fa-comments"></i> Messages <span class="badge bg-danger">2</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center">
                    <i class="fas fa-bell"></i> Notifications <span class="badge bg-danger">2</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center">
                    <i class="fas fa-cogs"></i> Settings
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
        <!-- Profile -->
        <div class="mt-4 d-flex align-items-center">
            <img src="https://via.placeholder.com/40" class="rounded-circle" alt="Profile">
            <div class="ms-3">
                <small>Bogart Babumbaikal</small><br>
                <small class="text-muted">bogartb8@gmail.com</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Dashboard</h3>
            <input type="text" class="form-control w-25" placeholder="Search anything...">
        </div>
        
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card analytics-card">
                    <div>
                        <h5>Total Applicants</h5>
                        <h2>130</h2>
                    </div>
                    <img src="icon1.png" class="analytics-icon" alt="icon">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card analytics-card">
                    <div>
                        <h5>New Applicants</h5>
                        <h2>20</h2>
                    </div>
                    <img src="icon2.png" class="analytics-icon" alt="icon">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card analytics-card">
                    <div>
                        <h5>Upcoming Interview</h5>
                        <h2>20</h2>
                    </div>
                    <img src="icon3.png" class="analytics-icon" alt="icon">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card analytics-card">
                    <div>
                        <h5>Upcoming Review</h5>
                        <h2>20</h2>
                    </div>
                    <img src="icon4.png" class="analytics-icon" alt="icon">
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h5>Recently Posted Job</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Applications</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Worker Steel Structure (Full Time)</td>
                        <td>-</td>
                        <td>696 Applications</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 order-md-1">
                <div class="calendar">
                    <h5>January</h5>
                    <table>
                        <tr>
                            <th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td><td></td><td>1</td><td>2</td><td>3</td>
                        </tr>
                        <tr>
                            <td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                        </tr>
                        <tr>
                            <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td>
                        </tr>
                        <tr>
                            <td>18</td><td>19</td><td>20</td><td>22</td><td>23</td><td>24</td><td>25</td>
                        </tr>
                        <tr>
                            <td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td></td>
                        </tr>
                    </table>
                </div>
                <div class="card schedule-card mt-3">
                    <h5>Schedule</h5>
                    <p>No upcoming interview</p>
                </div>
            </div>
            <div class="col-md-6 order-md-2">
                <div class="card p-3">
                    <h5>February 2024</h5>
                    <canvas id="donutChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('donutChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Welder A', 'Welder B', 'Welder C', 'Welder D'],
            datasets: [{
                data: [2.3, 19.2, 5.5, 53],
                backgroundColor: ['#3B82F6', '#EF4444', '#F59E0B', '#EC4899']
            }]
        }
    });
</script>

</body>
</html>
