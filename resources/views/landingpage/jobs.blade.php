<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find a Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz@0,14..32;1,14..32&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz@0,14..32;1,14..32&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
        
        body {
            font-family: 'Inter', serif;
            font-weight: 700;
        }

        h1, p, .navbar-nav .nav-link, .btn .container {
            font-family: 'Poppins', serif;
            font-weight: 500;
        }

        .display-4 {
            font-family: 'Inter', serif;
            font-weight: 600;
        }

        .lead {
            font-family: 'Inter', serif;
        }

        .navbar-brand img {
            height: 50px;
        }

        .navbar-nav {
            margin-left: 195px;
            margin-right: auto;
        }

        .btn-primary {
            transition: transform 0.2s, background-color 0.2s;
            padding: 15px 35px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .btn-outline-primary {
            transition: transform 0.2s, color 0.2s;
            padding: 10px 20px; /* Smaller button size */
            font-size: 14px;    /* Smaller font size */
        }

        .btn-outline-primary:hover {
            color: white;
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .logos img {
            margin-top: 20px;
            height: 30px;
            transition: transform 0.2s;
        }

        .logos img:hover {
            transform: scale(1.2);
        }

        header h1 {
            text-align: left;
        }

        header p {
            text-align: left;
        }

        .header-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-bar input {
            height: 45px;
            border-radius: 8px;
        }

        .job-card {
            border-radius: 10px;
            padding: 15px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .job-card .btn {
            border-radius: 5px;
        }

        /* Job Card Hover Effect */
        .job-card:hover {
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        /* Apply Now Button Hover Effect */
        .apply-btn:hover {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .footer {
            background: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .modal-title {
            font-weight: 600;
        }

        /* Modal Image Styling */
        .modal-body img {
            max-width: 100%;
            height: auto;
        }

        .modal-footer a {
            padding: 10px 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/workforce.png') }}" alt="Logo">
            <span class="ms-3">WIEAS</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('landingpage.index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landingpage.jobs') }}">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landingpage.about') }}">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landingpage.contacts') }}">Contact Us</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="btn btn-primary me-2" href="{{ route('signin.index') }}" style="background-color: white; color: #007bff; border-color: #007bff;">Sign In</a></li>
                <li class="nav-item"><a class="btn btn-primary" href="{{ route('signup.index') }}">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="container mt-5">
    <h1 class="fw-bold">Find a job</h1>
    <p>Lorem ipsum dolor sit amet, consectetur</p>

    <div class="row g-3 align-items-center">
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Search Job">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Country">
        </div>
        <div class="col-md-4 d-flex gap-2">
            <button class="btn btn-outline-secondary">
                <i class="bi bi-sliders"></i>
            </button>
            <button class="btn btn-primary">
                <i class="bi bi-search"></i> Search
            </button>
        </div>
    </div>

    <p class="mt-3"><strong>1,580</strong> Welder Jobs</p>
</div>

<!-- Job Listings -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Job Cards (9 different OFW jobs) -->
        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="job-card p-3 w-100" style="max-width: 350px; background: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded me-2" style="max-width: 40px; margin: 0 auto;>
                        <span class="text-primary fw-bold">Workforce</span>
                    </div>
                </div>
                <h6 class="fw-bold mt-2">Heavy Equipment Operator</h6>
                <p class="small text-muted mb-2">XYZ Company - Qatar</p>
                <p class="small text-muted"><i class="bi bi-geo-alt"></i> Qatar</p>
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <i class="bi bi-bookmark-fill text-primary" style="font-size: 1.2rem; cursor: pointer;"></i>
                    <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="job-card p-3 w-100" style="max-width: 350px; background: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded me-2" style="max-width: 40px; margin: 0 auto;>
                        <span class="text-primary fw-bold">Workforce</span>
                    </div>
                </div>
                <h6 class="fw-bold mt-2">Nurse - Healthcare</h6>
                <p class="small text-muted mb-2">ABC Health Services - UAE</p>
                <p class="small text-muted"><i class="bi bi-geo-alt"></i> UAE</p>
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <i class="bi bi-bookmark-fill text-primary" style="font-size: 1.2rem; cursor: pointer;"></i>
                    <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="job-card p-3 w-100" style="max-width: 350px; background: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded me-2" style="max-width: 40px; margin: 0 auto;>
                        <span class="text-primary fw-bold">Workforce</span>
                    </div>
                </div>
                <h6 class="fw-bold mt-2">Construction Worker</h6>
                <p class="small text-muted mb-2">DEF Constructions - Saudi Arabia</p>
                <p class="small text-muted"><i class="bi bi-geo-alt"></i> Saudi Arabia</p>
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <i class="bi bi-bookmark-fill text-primary" style="font-size: 1.2rem; cursor: pointer;"></i>
                    <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="job-card p-3 w-100" style="max-width: 350px; background: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded me-2" style="max-width: 40px; margin: 0 auto;>
                        <span class="text-primary fw-bold">Workforce</span>
                    </div>
                </div>
                <h6 class="fw-bold mt-2">Chef - Restaurant</h6>
                <p class="small text-muted mb-2">GHI Restaurant - Kuwait</p>
                <p class="small text-muted"><i class="bi bi-geo-alt"></i> Kuwait</p>
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <i class="bi bi-bookmark-fill text-primary" style="font-size: 1.2rem; cursor: pointer;"></i>
                    <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="job-card p-3 w-100" style="max-width: 350px; background: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded me-2" style="max-width: 40px; margin: 0 auto;>
                        <span class="text-primary fw-bold">Workforce</span>
                    </div>
                </div>
                <h6 class="fw-bold mt-2">Housekeeper</h6>
                <p class="small text-muted mb-2">JKL Hospitality - Singapore</p>
                <p class="small text-muted"><i class="bi bi-geo-alt"></i> Singapore</p>
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <i class="bi bi-bookmark-fill text-primary" style="font-size: 1.2rem; cursor: pointer;"></i>
                    <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="job-card p-3 w-100" style="max-width: 350px; background: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded me-2" style="max-width: 40px; margin: 0 auto;>
                        <span class="text-primary fw-bold">Workforce</span>
                    </div>
                </div>
                <h6 class="fw-bold mt-2">Nanny</h6>
                <p class="small text-muted mb-2">JKL Hospitality - Taiwan</p>
                <p class="small text-muted"><i class="bi bi-geo-alt"></i> Taiwan</p>
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <i class="bi bi-bookmark-fill text-primary" style="font-size: 1.2rem; cursor: pointer;"></i>
                    <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="job-card p-3 w-100" style="max-width: 350px; background: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded me-2" style="max-width: 40px; margin: 0 auto;>
                        <span class="text-primary fw-bold">Workforce</span>
                    </div>
                </div>
                <h6 class="fw-bold mt-2">Electrician</h6>
                <p class="small text-muted mb-2">MNO Electricals - Bahrain</p>
                <p class="small text-muted"><i class="bi bi-geo-alt"></i> Bahrain</p>
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <i class="bi bi-bookmark-fill text-primary" style="font-size: 1.2rem; cursor: pointer;"></i>
                    <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="job-card p-3 w-100" style="max-width: 350px; background: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded me-2" style="max-width: 40px; margin: 0 auto;>
                        <span class="text-primary fw-bold">Workforce</span>
                    </div>
                </div>
                <h6 class="fw-bold mt-2">Mechanic</h6>
                <p class="small text-muted mb-2">PQR Automotive - Oman</p>
                <p class="small text-muted"><i class="bi bi-geo-alt"></i> Oman</p>
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <i class="bi bi-bookmark-fill text-primary" style="font-size: 1.2rem; cursor: pointer;"></i>
                    <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="job-card p-3 w-100" style="max-width: 350px; background: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded me-2" style="max-width: 40px; margin: 0 auto;">
                        <span class="text-primary fw-bold">Workforce</span>
                    </div>
                </div>
                <h6 class="fw-bold mt-2">Welder</h6>
                <p class="small text-muted mb-2">STU Welding - Kuwait</p>
                <p class="small text-muted"><i class="bi bi-geo-alt"></i> Kuwait</p>
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <i class="bi bi-bookmark-fill text-primary" style="font-size: 1.2rem; cursor: pointer;"></i>
                    <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <!-- Lock Image centered -->
                <img src="{{ asset('images/lock.png') }}" alt="Lock Image" class="img-fluid" style="max-width: 180px; margin: 0 auto;">
            </div>
            <div class="modal-body text-center">
            <h3 class="modal-title mt-3" id="applyModalLabel" style="font-size: 1.80rem;">Oops! You need to be logged in to access this feature.</h3>
                <p style="font-size: 12px; color: #6c757d; margin-top: 6px; margin-left: 20px; margin-right: 20px;">Please log in to continue using this feature. If you don't have an account, you can sign up and get started in just a few steps.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="{{ route('signin.index') }}" class="btn btn-outline-primary" style="font-size: 14px; padding: 10px 20px;">Sign In</a>
                <a href="{{ route('signup.index') }}" class="btn btn-outline-primary ms-3" style="font-size: 14px; padding: 10px 20px;">Sign Up</a>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="py-4 bg-primary text-white">
    <div class="container">
        <p class="text-center">&copy; 2025 WIEAS. All Rights Reserved.</p>
    </div>
</footer>

<script>
    // Add event listeners to both "Apply Now" buttons and bookmark icons
    const applyButtons = document.querySelectorAll('.btn-outline-primary');
    const bookmarkIcons = document.querySelectorAll('.bi-bookmark-fill');

    // Function to show the modal
    function showModal() {
        var myModal = new bootstrap.Modal(document.getElementById('applyModal'));
        myModal.show();
    }

    // Add event listener to all "Apply Now" buttons
    applyButtons.forEach(button => {
        button.addEventListener('click', showModal);
    });

    // Add event listener to all bookmark icons
    bookmarkIcons.forEach(icon => {
        icon.addEventListener('click', showModal);
    });
</script>

</body>
</html>
