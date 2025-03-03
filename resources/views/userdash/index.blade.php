<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/workforce.png') }}" class="rounded-circle me-2 img-fluid" style="width: 35px; height: 35px;" alt="Logo">
            <strong>WIEAS</strong>
        </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link fw-bold text-primary" href="{{ route('userdash.index') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.jobopenings') }}">Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pinned</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Conference</a></li>
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
        </div>
    </nav>
    
    <div class="container mt-5">    

        <h3 class="mt-4 mb-3">Hello, {{ session('applicant')->first_name }}!</h3>
        
        <div class="card p-4 mb-4">
    <div class="row align-items-center">
        <div class="col-md-2 text-center">
            <svg width="80" height="80">
                <circle cx="40" cy="40" r="35" stroke="#E0E0E0" stroke-width="6" fill="none" />
                <path id="progress-path" d="M40,5 A35,35 0 1,1 7,40" stroke-width="6" fill="none" stroke="#007BFF" stroke-dasharray="219.91" stroke-dashoffset="219.91" />
                <text id="percentage-text" x="25" y="45" font-size="18" font-weight="bold">0%</text>
            </svg>
        </div>
        <div class="col-md-8">
            <h4>Complete your profile</h4>
            <p>Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur</p>
            <a href="{{ route('userdash.settings') }}" class="btn btn-outline-primary">Complete my Profile</a>
        </div>
        <div class="col-md-2 text-end">
            <img src="{{ asset('images/pic2.jpg') }}" alt="Illustration" class="img-fluid" style="max-width: 150px;">
        </div>
    </div>
</div>
        
        <div class="card p-4">
            <h4>Pinned</h4>
            <p>No pinned jobs yet.</p>
        </div>
    </div>
    <script>
        // Toggle notification dropdown
        document.getElementById('notificationIcon').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('notificationDropdown').querySelector('.dropdown-menu');
            dropdownMenu.classList.toggle('show'); // Toggles the visibility of the dropdown
        });

        // Close dropdown when clicked outside
        document.addEventListener('click', function(event) {
            var dropdownMenu = document.getElementById('notificationDropdown').querySelector('.dropdown-menu');
            var notificationIcon = document.getElementById('notificationIcon');

            if (!notificationIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    </script>
    <script>
    // Add active class to dropdown items when clicked
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent the dropdown from closing immediately

            // Remove active class from all dropdown items
            dropdownItems.forEach(i => i.classList.remove('active'));
            
            // Add active class to clicked item
            this.classList.add('active');
        });
    });

    // Ensure that the dropdown does not close when clicking inside it
    const dropdownToggle = document.getElementById('dropdownMenuButton');
    dropdownToggle.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent the dropdown from closing immediately
    });
</script>

<script>
    // Function to set the color and update the circle based on percentage
    function updateProgress(percentage) {
        // Get the progress path and percentage text
        const progressPath = document.getElementById('progress-path');
        const percentageText = document.getElementById('percentage-text');
        
        // Set the text percentage
        percentageText.textContent = percentage + '%';
        
        // Calculate the stroke-dashoffset based on percentage (219.91 is the total stroke length for the circle)
        const totalLength = 219.91; // Circumference of the circle (2 * Math.PI * radius)
        const offset = totalLength - (totalLength * percentage / 100);

        // Set the stroke-dashoffset to visually represent the percentage
        progressPath.setAttribute('stroke-dashoffset', offset);

        // Determine stroke color based on percentage
        let strokeColor;
        if (percentage === 0) {
            strokeColor = 'transparent'; // No color for 0%
        } else if (percentage >= 90) {
            strokeColor = 'green'; // Green for 90% to 100%
        } else if (percentage >= 60) {
            strokeColor = 'yellow'; // Yellow for 60% to 80%
        } else {
            strokeColor = 'red'; // Red for 1% to 50%
        }

        // Set the stroke color dynamically
        progressPath.setAttribute('stroke', strokeColor);
    }

        // Example usage: set progress to 20%
    updateProgress(0);
</script>
</body>
</html>