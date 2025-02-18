    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Find Jobs</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Arial', sans-serif;
            }

            .job-card {
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 16px;
            }

            .job-card h4 {
                font-size: 1.25rem;
                font-weight: bold;
            }

            .job-card p {
                font-size: 0.875rem;
            }
        </style>
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
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="{{ route('userdash.index') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('userdash.jobopenings') }}">Find Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Saved Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">...</a>
                        </li>
                    </ul>
                </div>

                <!-- Notification and Profile -->
                <div class="d-flex align-items-center">
                    <!-- Notification Bell -->
                    <i class="bi bi-bell me-3 text-primary" id="notificationIcon" data-bs-toggle="dropdown" aria-expanded="false"></i>

                    <!-- Notification Dropdown -->
                    <div class="dropdown-menu p-4" aria-labelledby="notificationIcon">
                        <h5 class="text-center mb-3">Notifications</h5> 
                        <!-- Notification content goes here -->
                    </div>

                    <!-- User Profile Dropdown -->
                    <div class="d-flex align-items-center ms-3">
                        <img src="{{ asset('images/bogart.jpg') }}" class="rounded-circle me-2 img-fluid" style="width: 40px; height: 40px;" alt="User Profile">
                        <div>
                            <span class="d-block fw-bold">{{ session('applicant')->first_name }}</span>
                            <small class="text-muted">{{ session('applicant')->email }}</small>
                        </div>

                        <!-- Dropdown for Profile Settings -->
                        <div class="dropdown">
                            <i class="ms-2 dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="{{ route('userdash.settings') }}">Settings</a></li>
                                <li><a class="dropdown-item" href="{{ route('signin.index') }}">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar for Filters -->
                <div class="col-md-3 bg-white p-4">
                    <h5>Filters</h5>
                    <form>
                        <div class="mb-3">
                            <label for="role" class="form-label">Roles</label>
                            <input type="text" class="form-control" id="role" placeholder="E.g.: Welder">
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="skilled" id="skilled">
                                <label class="form-check-label" for="skilled">Skilled</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="domestic" id="domestic">
                                <label class="form-check-label" for="domestic">Domestic Work</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="education" id="education">
                                <label class="form-check-label" for="education">Education</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="hospitality" id="hospitality">
                                <label class="form-check-label" for="hospitality">Hospitality</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Experience Level</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="entry" id="entry">
                                <label class="form-check-label" for="entry">Entry Level</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="junior" id="junior">
                                <label class="form-check-label" for="junior">Junior</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="senior" id="senior">
                                <label class="form-check-label" for="senior">Senior</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </form>
                </div>

                <!-- Main Content -->
        <div class="col-md-9 bg-light p-4">
            <div class="d-flex justify-content-end align-items-center mb-3" style="margin-top: 5px;">
                <div>
                    <select class="form-select" style="width: 120px;">
                        <option selected>Latest</option>
                        <option value="1">Oldest</option>
                    </select>
                </div>
                <div class="d-flex ml-auto">
                    <button class="btn btn-outline-primary ms-2">
                        <i class="bi bi-grid-3x3-gap"></i>
                    </button>
                    <button class="btn btn-outline-primary ms-2">
                        <i class="bi bi-list-ul"></i>
                    </button>
                </div>
            </div>
        <!-- Job Listing Cards -->
        <div class="container">
            <div class="row">
                <!-- Job Listing 1 -->
        <div class="col-md-12 mb-4">
            <div class="job-card bg-white d-flex justify-content-between align-items-center p-4 border rounded">
                <!-- Left section (Job Title, Company, and Description) -->
                <div class="job-details">
                    <h4 class="mb-2">WORKER STEEL STRUCTURE</h4>
                    <p class="mb-0">IREM S.P.A Hungary Branch</p>
                    <p><i class="bi bi-geo-alt-fill"></i> Hungary <span class="text-muted">• Full-Time</span></p>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut....</p>

                    <!-- Date and Position Information -->
                    <div class="d-flex align-items-center mb-3">
                        <p class="text-muted me-3"><i class="bi bi-calendar-event"></i> 11 Feb 2025</p>
                        <p class="text-muted me-3"><i class="bi bi-person-fill"></i> 120 positions</p>
                    </div>
                </div>

                <!-- Right section (Logo and Buttons) -->
                <div class="d-flex flex-column align-items-end">
                    <!-- Job Logo (top-right) -->
                    <div class="d-flex align-items-center mb-3">
                        <!-- Square Logo Box -->
                        <div class="d-flex justify-content-center align-items-center bg-primary text-white rounded-3" style="width: 50px; height: 50px; margin-top: -50px;">
                        </div>
                        <!-- LOGO Text -->
                        <span class="ms-2" style="font-size: 1.25rem; font-weight: bold; color: #1E70E5; margin-bottom: 50px;">LOGO</span>
                    </div>

                    <!-- Bookmark Icon (Circular with Border Radius) and Apply Now Button -->
                    <div class="d-flex align-items-center">
                        <!-- Bookmark Icon -->
                        <a href="#" class="btn btn-outline-primary rounded-circle mb-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; margin-top: 30px;">
                            <i class="bi bi-bookmark" style="font-size: 1.2rem;"></i>
                        </a>

                        <!-- Apply Now Button -->
                        <a href="#" class="btn btn-primary d-flex align-items-center" style="width: 105px; text-align: center; margin-left: 10px; margin-top: 20px;">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Job Listing 2 -->
        <div class="col-md-12 mb-4">
            <div class="job-card bg-white d-flex justify-content-between align-items-center p-4 border rounded">
                <!-- Left section (Job Title, Company, and Description) -->
                <div class="job-details">
                    <h4 class="mb-2">WORKER STEEL STRUCTURE</h4>
                    <p class="mb-0">IREM S.P.A Hungary Branch</p>
                    <p><i class="bi bi-geo-alt-fill"></i> Hungary <span class="text-muted">• Full-Time</span></p>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut....</p>

                    <!-- Date and Position Information -->
                    <div class="d-flex align-items-center mb-3">
                        <p class="text-muted me-3"><i class="bi bi-calendar-event"></i> 11 Feb 2025</p>
                        <p class="text-muted me-3"><i class="bi bi-person-fill"></i> 120 positions</p>
                    </div>
                </div>

                <!-- Right section (Logo and Buttons) -->
                <div class="d-flex flex-column align-items-end">
                    <!-- Job Logo (top-right) -->
                    <div class="d-flex align-items-center mb-3">
                        <!-- Square Logo Box -->
                        <div class="d-flex justify-content-center align-items-center bg-primary text-white rounded-3" style="width: 50px; height: 50px; margin-top: -50px;">
                        </div>
                        <!-- LOGO Text -->
                        <span class="ms-2" style="font-size: 1.25rem; font-weight: bold; color: #1E70E5; margin-bottom: 50px;">LOGO</span>
                    </div>

                    <!-- Bookmark Icon (Circular with Border Radius) and Apply Now Button -->
                    <div class="d-flex align-items-center">
                        <!-- Bookmark Icon -->
                        <a href="#" class="btn btn-outline-primary rounded-circle mb-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; margin-top: 30px;">
                            <i class="bi bi-bookmark" style="font-size: 1.2rem;"></i>
                        </a>

                        <!-- Apply Now Button -->
                        <a href="#" class="btn btn-primary d-flex align-items-center" style="width: 105px; text-align: center; margin-left: 10px; margin-top: 20px;">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Job Listing 3 -->
        <div class="col-md-12 mb-4">
            <div class="job-card bg-white d-flex justify-content-between align-items-center p-4 border rounded">
                <!-- Left section (Job Title, Company, and Description) -->
                <div class="job-details">
                    <h4 class="mb-2">WORKER STEEL STRUCTURE</h4>
                    <p class="mb-0">IREM S.P.A Hungary Branch</p>
                    <p><i class="bi bi-geo-alt-fill"></i> Hungary <span class="text-muted">• Full-Time</span></p>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut....</p>

                    <!-- Date and Position Information -->
                    <div class="d-flex align-items-center mb-3">
                        <p class="text-muted me-3"><i class="bi bi-calendar-event"></i> 11 Feb 2025</p>
                        <p class="text-muted me-3"><i class="bi bi-person-fill"></i> 120 positions</p>
                    </div>
                </div>

                <!-- Right section (Logo and Buttons) -->
                <div class="d-flex flex-column align-items-end">
                    <!-- Job Logo (top-right) -->
                    <div class="d-flex align-items-center mb-3">
                        <!-- Square Logo Box -->
                        <div class="d-flex justify-content-center align-items-center bg-primary text-white rounded-3" style="width: 50px; height: 50px; margin-top: -50px;">
                        </div>
                        <!-- LOGO Text -->
                        <span class="ms-2" style="font-size: 1.25rem; font-weight: bold; color: #1E70E5; margin-bottom: 50px;">LOGO</span>
                    </div>

                    <!-- Bookmark Icon (Circular with Border Radius) and Apply Now Button -->
                    <div class="d-flex align-items-center">
                        <!-- Bookmark Icon -->
                        <a href="#" class="btn btn-outline-primary rounded-circle mb-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; margin-top: 30px;">
                            <i class="bi bi-bookmark" style="font-size: 1.2rem;"></i>
                        </a>

                        <!-- Apply Now Button -->
                        <a href="#" class="btn btn-primary d-flex align-items-center" style="width: 105px; text-align: center; margin-left: 10px; margin-top: 20px;">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

            </div>
        </div>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>

    </html>
