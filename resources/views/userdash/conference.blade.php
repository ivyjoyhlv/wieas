<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Conference</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .navbar {
        padding: 10px 20px;
    }

    .conference-input {
        margin-top: 20px;
        max-width: 500px;
        width: 100%;
    }

    .input-group-text {
        background-color: #e9ecef;
        border-right: 0;
    }

    .form-control {
        border-left: 0;
    }

    .btn-primary {
        border-radius: 0 5px 5px 0;
    }

    .btn-secondary {
        background-color: #d6d8db;
        border-color: #d6d8db;
        cursor: not-allowed;
    }
</style>
<body>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h3>Join Conference</h3>
                <p class="lead">Enter the meeting code to join the conference room.</p>

                <!-- Room Code Input -->
                <div class="input-group conference-input mx-auto">
                    <input type="text" class="form-control" id="roomCode" placeholder="Enter Room Code" aria-label="Enter Room Code">
                    <button class="btn btn-primary" id="joinMeetingBtn" disabled>Join Room</button>
                </div>
                
                <!-- Leave Meeting Button -->
                <button class="btn btn-secondary" id="leaveMeetingBtn" style="display: none;">Leave Room</button>
            </div>
        </div>
        <div id="jitsi-container" style="height: 500px; margin-top: 20px;"></div>
    </div>

    <!-- Jitsi Meet API script -->
    <script src="https://8x8.vc/vpaas-magic-cookie-07f8c9196c1f484596722e4c94f6558e/external_api.js"></script>
    <script>
        let meetingCreated = false; // Flag to track if the meeting is already created
        let api = null; // Variable to store the Jitsi Meet instance

        // Select the buttons
        const joinButton = document.getElementById('joinMeetingBtn');
        const leaveButton = document.getElementById('leaveMeetingBtn');
        const roomCodeInput = document.getElementById('roomCode');

        // Event listener for the input field
        roomCodeInput.addEventListener('input', function () {
            if (roomCodeInput.value.trim() !== "") {
                joinButton.disabled = false; // Enable the join button when the user types a code
            } else {
                joinButton.disabled = true; // Disable the join button if the input is empty
            }
        });

        // Event listener for the join button
        joinButton.addEventListener('click', function () {
            if (meetingCreated) {
                alert('You are already in a meeting. Please leave the room before joining again.');
                return;
            }

            const roomCode = roomCodeInput.value.trim();
            if (roomCode === "") {
                alert('Please enter a valid room code.');
                return;
            }

            // Create a new Jitsi meeting
            const domain = "8x8.vc";
            const options = {
                roomName: `vpaas-magic-cookie-07f8c9196c1f484596722e4c94f6558e/${roomCode}`, // Use the room code provided by the user
                width: "100%",
                height: 500,
                parentNode: document.getElementById('jitsi-container'),
                configOverwrite: { startWithAudioMuted: true, startWithVideoMuted: false },
                interfaceConfigOverwrite: { filmStripOnly: false }
            };

            api = new JitsiMeetExternalAPI(domain, options);
            meetingCreated = true; // Mark the meeting as created

            // Disable the join button and show the leave button
            joinButton.style.display = 'none';
            leaveButton.style.display = 'inline-block';
        });

        // Event listener for the leave button
        leaveButton.addEventListener('click', function () {
            if (api) {
                api.dispose(); // Dispose of the Jitsi Meet API instance
            }

            meetingCreated = false; // Reset the meeting status
            joinButton.style.display = 'inline-block'; // Show the join button again
            leaveButton.style.display = 'none'; // Hide the leave button
            roomCodeInput.value = ""; // Clear the room code input
            joinButton.disabled = true; // Disable the join button again
        });
    </script>
</body>
</html>