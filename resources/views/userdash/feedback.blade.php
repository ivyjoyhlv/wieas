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
    <!-- Navbar -->
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.conference') }}">Conference</a></li>
                    <li class="nav-item"><a class="nav-link  fw-bold text-primary" href="{{ route('feedback.create') }}">Feedback</a></li>
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

    <!-- Content Area (Feedback Form) -->
    <div class="content">
        <div class="container">
            <h2 class="fw-bold mt-5">We Appreciate Your Feedback</h2>
            <p>Your suggestions enable us to enhance the services we provide. Please share your feedback!</p>

            <!-- Display success message if present -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('feedback.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <div class="mb-3">
                    <label for="feedback" class="form-label">Feedback:</label>
                    <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
                </div>

                <!-- Star Rating -->
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating:</label>
                    <div class="rating" id="rating">
                        <span class="star" data-value="1">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="5">&#9733;</span>
                    </div>
                    <input type="hidden" name="rating" id="rating-value" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image (optional):</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript for Star Rating
        const stars = document.querySelectorAll('.star');
        const ratingValue = document.getElementById('rating-value');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                ratingValue.value = value; // Store the rating value
                updateStars(value); // Update the star appearance
            });
        });

        function updateStars(value) {
            stars.forEach(star => {
                if (star.getAttribute('data-value') <= value) {
                    star.style.color = 'gold'; // Filled stars
                } else {
                    star.style.color = 'gray'; // Empty stars
                }
            });
        }
    </script>

</body>
</html>
