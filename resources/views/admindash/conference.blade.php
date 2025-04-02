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

        /* Video Conference Specific Styles */
        .video-conference-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        .video-conference-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .video-conference-header h2 {
            font-size: 20px;
            margin: 0;
            color: #333;
        }

        .video-conference-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .video-conference-btn:hover {
            background-color: #0056b3;
        }

        .video-conference-btn:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        #jitsi-container {
            height: 500px;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            background-color: #f1f3f4;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .jitsi-placeholder {
            text-align: center;
            color: #666;
        }

        .jitsi-placeholder i {
            font-size: 50px;
            color: #007bff;
            margin-bottom: 15px;
        }

        .jitsi-placeholder h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .meeting-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            display: none;
        }

        .meeting-code {
            font-family: monospace;
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            margin: 10px 0;
            padding: 10px;
            background-color: white;
            border-radius: 5px;
            text-align: center;
        }

        .copy-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
            width: 100%;
        }

        .copy-btn:hover {
            background-color: #0056b3;
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
        <li class="nav-item">
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
        <li class="nav-item active">
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
    <div class="video-conference-container">
        <div class="video-conference-header">
            <h2>Video Conference</h2>
            <button class="video-conference-btn" id="create-meeting-btn">
                <i class="fas fa-plus"></i> Create Meeting
            </button>
        </div>
        
        <div id="jitsi-container">
            <div class="jitsi-placeholder">
                <i class="fas fa-video"></i>
                <h3>No Active Meeting</h3>
                <p>Click the button above to start a new meeting</p>
            </div>
        </div>
        
        <div class="meeting-info" id="meeting-info">
            <h4>Meeting Information</h4>
            <div class="meeting-code" id="meeting-code">WEIAS-XXXXXX</div>
            <button class="copy-btn" id="copy-btn">Copy Meeting Code</button>
        </div>
    </div>
</div>

<!-- Jitsi Meet API script -->
<script src="https://8x8.vc/vpaas-magic-cookie-07f8c9196c1f484596722e4c94f6558e/external_api.js"></script>
<script>
    let meetingCreated = false;
    let api = null;

    function generateRoomCode() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let result = '';
        const length = 6;
        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return result;
    }

    document.getElementById('create-meeting-btn').addEventListener('click', function () {
        if (meetingCreated) {
            alert('A meeting is already in progress.');
            return;
        }

        const roomCode = generateRoomCode();
        const domain = "8x8.vc";
        const roomName = `vpaas-magic-cookie-07f8c9196c1f484596722e4c94f6558e/WEIAS${roomCode}`;
        
        const options = {
            roomName: roomName,
            width: "100%",
            height: "100%",
            parentNode: document.getElementById('jitsi-container'),
            configOverwrite: { 
                startWithAudioMuted: true, 
                startWithVideoMuted: false
            },
            interfaceConfigOverwrite: { 
                filmStripOnly: false
            }
        };

        api = new JitsiMeetExternalAPI(domain, options);
        
        meetingCreated = true;
        const btn = document.getElementById('create-meeting-btn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-video"></i> Meeting Active';
        
        // Show meeting info with just WEIAS and code
        document.getElementById('meeting-code').textContent = `WEIAS-${roomCode}`;
        document.getElementById('meeting-info').style.display = 'block';
        
        // Clear placeholder
        document.querySelector('.jitsi-placeholder').style.display = 'none';

        // Copy code functionality
        document.getElementById('copy-btn').addEventListener('click', function() {
            const code = document.getElementById('meeting-code').textContent;
            navigator.clipboard.writeText(code);
            
            const originalText = this.textContent;
            this.textContent = 'Copied!';
            setTimeout(() => {
                this.textContent = originalText;
            }, 2000);
        });

        api.on('readyToClose', () => {
            // Clean up
            document.getElementById('jitsi-container').innerHTML = `
                <div class="jitsi-placeholder">
                    <i class="fas fa-video"></i>
                    <h3>Meeting Ended</h3>
                    <p>Click the button above to start a new meeting</p>
                </div>
            `;
            
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-plus"></i> Create Meeting';
            meetingCreated = false;
            api = null;
            document.getElementById('meeting-info').style.display = 'none';
        });
    });
</script>
</body>
</html> 