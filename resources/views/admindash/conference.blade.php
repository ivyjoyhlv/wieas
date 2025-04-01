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

        .video-conference-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .video-conference-btn:hover {
            background-color: #0056b3;
        }

        .video-conference-btn:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
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
            <a href="{{ route('admindash.notification') }}">
                <i class="fas fa-bell"></i>
                Notifications
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
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <button class="video-conference-btn" id="create-meeting-btn">Create a Video Meeting</button>
            </div>
        </div>
        <div id="jitsi-container" style="height: 500px; margin-top: 20px;"></div>
    </div>
</div>

<!-- Jitsi Meet API script -->
<script src="https://8x8.vc/vpaas-magic-cookie-07f8c9196c1f484596722e4c94f6558e/external_api.js"></script>
<script>
    let meetingCreated = false; // Flag to track if a meeting has been created
    let api = null; // Variable to store the Jitsi Meet API instance

    function generateRoomCode() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        const length = 10;
        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return result;
    }

    document.getElementById('create-meeting-btn').addEventListener('click', function () {
        if (meetingCreated) {
            alert('A meeting has already been created!');
            return;
        }

        const roomCode = generateRoomCode();
        const domain = "8x8.vc";
        const options = {
            roomName: `vpaas-magic-cookie-07f8c9196c1f484596722e4c94f6558e/WEIAS${roomCode}`,
            width: "100%",
            height: 500,
            parentNode: document.getElementById('jitsi-container'),
            configOverwrite: { startWithAudioMuted: true, startWithVideoMuted: false },
            interfaceConfigOverwrite: { filmStripOnly: false }
        };

        api = new JitsiMeetExternalAPI(domain, options);
        
        meetingCreated = true; // Set flag to true when a meeting is created
        document.getElementById('create-meeting-btn').disabled = true; // Disable the button after the meeting is created
        document.getElementById('create-meeting-btn').textContent = "Meeting Created"; // Update the button text

        // Listen for the readyToClose event
        api.on('readyToClose', () => {
            // Clear the container
            document.getElementById('jitsi-container').innerHTML = '';
            // Reset the button
            document.getElementById('create-meeting-btn').disabled = false;
            document.getElementById('create-meeting-btn').textContent = "Create a Video Meeting";
            meetingCreated = false; // Reset the flag
            api = null; // Clear the API instance
        });
    });
</script>
</body>
</html>