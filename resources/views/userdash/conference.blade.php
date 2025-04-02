<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Conference</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* Your original navbar styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            padding: 10px 20px;
        }

        /* Formal CSS for video conference section only */
        .video-conference-section {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .conference-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .conference-header h3 {
            color: #2c58a0;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .conference-header p {
            color: #495057;
            font-size: 1.1rem;
        }

        .conference-input {
            max-width: 600px;
            margin: 0 auto 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
            overflow: hidden;
        }

        .input-group-text {
            background-color: white;
            border: none;
            padding: 12px 16px;
            color: #2c58a0;
        }

        .form-control {
            border: none;
            padding: 12px;
            font-size: 1rem;
            background-color: white;
        }

        .form-control:focus {
            box-shadow: none;
            background-color: white;
        }

        .btn-join {
            background-color: #2c58a0;
            border: none;
            padding: 12px 24px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-join:hover {
            background-color: #234a8c;
            transform: translateY(-1px);
        }

        .btn-join:disabled {
            background-color: #a0b4d8;
            cursor: not-allowed;
            transform: none;
        }

        .btn-leave {
            background-color: #e9ecef;
            color: #495057;
            border: none;
            padding: 12px 24px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: none;
            margin: 20px auto;
        }

        .btn-leave:hover {
            background-color: #d1d7dd;
        }

        #jitsi-container {
            height: 600px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .jitsi-placeholder {
            text-align: center;
            padding: 30px;
        }

        .jitsi-placeholder i {
            font-size: 3rem;
            color: #e9ecef;
            margin-bottom: 20px;
        }

        .jitsi-placeholder h4 {
            color: #495057;
            margin-bottom: 10px;
        }

        .jitsi-placeholder p {
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .conference-input {
                flex-direction: column;
            }
            
            .input-group-text {
                border-radius: 8px 8px 0 0 !important;
                justify-content: center;
            }
            
            .form-control {
                border-radius: 0 !important;
            }
            
            .btn-join {
                border-radius: 0 0 8px 8px !important;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Your original navbar (unchanged) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/workforce.png') }}" class="rounded-circle me-2 img-fluid" style="width: 35px; height: 35px;" alt="Logo">
                <strong>WIEAS</strong>
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.index') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.jobopenings') }}">Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.pinned') }}">Pinned</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-primary" href="{{ route('userdash.conference') }}">Conference</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('feedback.create') }}">Feedback</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-bell me-3 text-primary" id="notificationIcon"></i>
                <div class="dropdown" id="notificationDropdown">
                    <div class="dropdown-menu p-4" aria-labelledby="dropdownMenuButton">
                        <h5 class="text-center mb-3">Notifications</h5>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/bogart.jpg') }}" class="rounded-circle me-2 img-fluid" style="width: 40px; height: 40px;" alt="User Profile">
                <div>
                <span class="d-block fw-bold">{{ session('applicant')->first_name }} {{ session('applicant')->last_name }} </span>
                    <small class="text-muted">{{ session('applicant')->email }}</small>
                </div>
                <div class="dropdown">
                    <i class="ms-2 dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('userdash.settings') }}">Settings</a></li>
                        <li><a class="dropdown-item" href="{{ route('signin.index') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Formal video conference section -->
    <div class="video-conference-section">
        <div class="conference-header">
            <h3>Join Conference</h3>
            <p class="lead">Enter the meeting code to join the conference room</p>
        </div>

        <div class="input-group conference-input">
            <span class="input-group-text">
                <i class="bi bi-door-open"></i>
            </span>
            <input type="text" class="form-control" id="roomCode" placeholder="Enter Room Code">
            <button class="btn btn-join" id="joinMeetingBtn" disabled>
                <i class="bi bi-arrow-right-circle me-2"></i>Join Room
            </button>
        </div>
        
        <button class="btn btn-leave" id="leaveMeetingBtn">
            <i class="bi bi-box-arrow-left me-2"></i>Leave Room
        </button>

        <div id="jitsi-container">
            <div class="jitsi-placeholder">
                <i class="bi bi-camera-video"></i>
                <h4>No active meeting</h4>
                <p>Enter a room code above to join a conference</p>
            </div>
        </div>
    </div>

    <!-- Jitsi Meet API script -->
    <script src="https://8x8.vc/vpaas-magic-cookie-07f8c9196c1f484596722e4c94f6558e/external_api.js"></script>
    <script>
        let meetingCreated = false;
        let api = null;

        const joinButton = document.getElementById('joinMeetingBtn');
        const leaveButton = document.getElementById('leaveMeetingBtn');
        const roomCodeInput = document.getElementById('roomCode');
        const jitsiContainer = document.getElementById('jitsi-container');

        roomCodeInput.addEventListener('input', function() {
            joinButton.disabled = roomCodeInput.value.trim() === "";
        });

        joinButton.addEventListener('click', function() {
            if (meetingCreated) {
                alert('You are already in a meeting. Please leave the current room before joining another.');
                return;
            }

            const roomCode = roomCodeInput.value.trim();
            if (!roomCode) {
                alert('Please enter a valid room code.');
                return;
            }

            const domain = "8x8.vc";
            const options = {
                roomName: `vpaas-magic-cookie-07f8c9196c1f484596722e4c94f6558e/${roomCode}`,
                width: "100%",
                height: "100%",
                parentNode: jitsiContainer,
                configOverwrite: { 
                    startWithAudioMuted: true, 
                    startWithVideoMuted: false,
                    disableSimulcast: false,
                    enableWelcomePage: false,
                    enableClosePage: false
                },
                interfaceConfigOverwrite: { 
                    filmStripOnly: false,
                    SHOW_JITSI_WATERMARK: false,
                    SHOW_WATERMARK_FOR_GUESTS: false,
                    DEFAULT_BACKGROUND: '#f8f9fa',
                    DEFAULT_REMOTE_DISPLAY_NAME: 'Participant',
                    DEFAULT_LOCAL_DISPLAY_NAME: 'You'
                }
            };

            api = new JitsiMeetExternalAPI(domain, options);
            meetingCreated = true;

            joinButton.style.display = 'none';
            leaveButton.style.display = 'block';
            jitsiContainer.innerHTML = ''; // Clear placeholder
        });

        leaveButton.addEventListener('click', function() {
            if (api) {
                api.dispose();
            }

            meetingCreated = false;
            joinButton.style.display = 'inline-block';
            leaveButton.style.display = 'none';
            roomCodeInput.value = "";
            joinButton.disabled = true;
            
            // Restore placeholder
            jitsiContainer.innerHTML = `
                <div class="jitsi-placeholder">
                    <i class="bi bi-camera-video"></i>
                    <h4>Meeting ended</h4>
                    <p>Enter a room code above to join another conference</p>
                </div>
            `;
        });
    </script>
</body>
</html>