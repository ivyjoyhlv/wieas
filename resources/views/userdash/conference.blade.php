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
                    <li class="nav-item"><a class="nav-link" href="#">Pinned</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-primary" href="{{ route('userdash.conference') }}">Conference</a></li>
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
                    <span class="d-block fw-bold">{{ session('applicant')->first_name }} {{ session('applicant')->last_name }}</span>
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
    
<!-- resources/views/join-meeting.blade.php -->

<form action="{{ url('zoom/join') }}" method="POST">
    @csrf
    <label for="meeting_code">Enter Meeting Code:</label>
    <input type="text" id="meeting_code" name="meeting_code" required>

    <button type="submit">Join Meeting</button>
</form>


    <script>
        function toggleJoinButton() {
            const inputField = document.getElementById('meetingCode');
            const joinButton = document.getElementById('joinButton');
            
            // Enable button and make it blue when there's input
            if (inputField.value.trim() !== "") {
                joinButton.disabled = false;
                joinButton.classList.add('btn-primary');
                joinButton.classList.remove('btn-secondary');
            } else {
                // Disable button and make it gray when input is empty
                joinButton.disabled = true;
                joinButton.classList.add('btn-secondary');
                joinButton.classList.remove('btn-primary');
            }
        }
    </script>
</body>
</html>
