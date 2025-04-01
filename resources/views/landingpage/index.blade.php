<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz@0,14..32;1,14..32&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz@0,14..32;1,14..32&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');

        body {
            font-family: 'Inter', serif;
            font-weight: 700;
        }

        h1, p, .navbar-nav .nav-link, .btn .container{
            font-family: 'Poppins', serif;
            font-weight: 500;
        }

        .display-4{
            font-family: 'Inter', serif;
            font-weight: 600;
        }

        .lead{
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
            padding: 15px 35px;
            font-size: 16px;
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

        .featured-job {
            text-align: center;
            padding: 50px 0;
        }

        .job-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            text-align: left;
            transition: transform 0.2s;
            margin-bottom: 25px;
        }

        .job-card:hover {
            transform: scale(1.05);
        }

        .job-logo {
            width: 50px;
            height: 50px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        .job-title {
            font-weight: bold;
        }

        .job-meta {
            font-size: 14px;
            color: #777;
        }

        .job-actions {
            text-align: right;
        }

        .bookmark-btn {
        background: #3D9CFB;
        width: 43px;
        height: 43px;
        border-radius: 26.5px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 6px 7px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .bookmark-btn i {
            color: white;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .bookmark-btn:hover {
            background-color: #2672e0;
            transform: scale(1.1);
        }

        .bookmark-btn:hover i {
            color: #f0f0f0;
        }

        .bookmark-btn:focus {
            outline: none;
        }

        .view-more-btn {
        border: 1px solid #3D9CFB;
        color: #3D9CFB;
        transition: background-color 0.3s ease, color 0.3s ease;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        }

        .view-more-btn:hover {
            background-color: #3D9CFB;
            color: white;
        }

        .view-more-btn:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(61, 156, 251, 0.5);
        }

        .location-icon {
            font-size: 14px;
            color: #777;
            margin-right: 5px;
        }

        #career-next-step {
        background-color: #fff;
        }
        #career-next-step h2 {
            font-size: 2rem;
        }
        #career-next-step p {
            font-size: 1rem;
            max-width: 710px;
            margin: 0 auto;
        }
        #career-next-step .btn-outline-primary {
            font-size: 1rem;
            border-width: 2px;
        }
        #client-testimonials {
        background-color: #f9f9f9;
        }
        .testimonial-card {
        text-align: left;
        border-radius: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 350px; /* Adjust this value to fit your content */
        }
        .testimonial-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }
        .testimonial-card p {
            font-size: 1rem;
        }
        footer {
        background-color: #007bff !important;
    }
    
        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .navbar-nav {
                margin-left: 0;
                text-align: center;
            }
            .header-image {
                display: block;
            }
            .logos img {
                margin-top: 15px;
                height: 25px;
            }
            .featured-job .row {
                flex-direction: column;
                align-items: center;
            }
            .job-card {
                width: 100%;
                margin-bottom: 20px;
            }
            .view-more-btn {
                width: 100%;
            }
            .testimonial-card {
                width: 100%;
                margin-bottom: 20px;
            }
            .testimonial-card p {
                font-size: 0.9rem;
            }
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landingpage.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landingpage.jobs') }}">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landingpage.about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landingpage.contacts') }}">Contact Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-primary me-2" href="{{ route('signin.index') }}">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('signup.index') }}">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header id="home" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4">Bridging Filipino Talent with Global Opportunities</h1>
                    <p class="lead">Filipino talent deserves a global stage. Take the first step toward your overseas career today!</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-primary">Get Started</a>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 header-image">
                    <img src="{{ asset('images/wieascon.png') }}" alt="Illustration" class="img-fluid">
                </div>
            </div>
        </div>
    </header>

    <section class="logos py-4 bg-white">
    <div class="container">
        <div class="d-flex justify-content-around logos">
            <img src="{{ asset('images/placeholder.jpg') }}" alt="Logo">
            <img src="{{ asset('images/placeholder.jpg') }}" alt="Logo">
            <img src="{{ asset('images/placeholder.jpg') }}" alt="Logo">
            <img src="{{ asset('images/placeholder.jpg') }}" alt="Logo">
            <img src="{{ asset('images/placeholder.jpg') }}" alt="Logo">
        </div>
    </div>
</section>


<section id="featured-job" class="featured-job">
    <div class="container">
        <h2 class="mb-4">Featured Jobs for OFWs</h2>
        <p class="mb-5">Explore the top opportunities for Filipinos looking to work abroad. These jobs are specifically selected for overseas workers, providing competitive pay and career growth.</p>
        <div class="row g-4">
            <!-- Job 1 -->
            <div class="col-md-4">
                <div class="job-card p-3 border rounded">
                    <div class="d-flex align-items-center">
                        <div class="job-logo me-3">
                            <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded" width="50" height="50">
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 text-muted">XYZ Company</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="job-title mb-1">Construction Worker</h5>
                        <p class="job-meta text-muted mb-0">ABC Constructions - Saudi Arabia</p>
                        <p class="job-location text-muted mb-0">
                            <i class="fa-sharp fa-solid fa-location-dot me-1"></i> Saudi Arabia
                        </p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <button class="btn p-0 d-flex align-items-center justify-content-center bookmark-btn">
                            <i class="fa-regular fa-bookmark" class="bookmark-icon"></i>
                        </button>
                        <button class="btn btn-outline-primary apply-now-btn" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</button>
                    </div>
                </div>
            </div>
            <!-- Job 2 -->
            <div class="col-md-4">
                <div class="job-card p-3 border rounded">
                    <div class="d-flex align-items-center">
                        <div class="job-logo me-3">
                            <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded" width="50" height="50">
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 text-muted">Global Healthcare</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="job-title mb-1">Nurse</h5>
                        <p class="job-meta text-muted mb-0">DEF Health Services - UAE</p>
                        <p class="job-location text-muted mb-0">
                            <i class="fa-sharp fa-solid fa-location-dot me-1"></i> UAE
                        </p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <button class="btn p-0 d-flex align-items-center justify-content-center bookmark-btn">
                            <i class="fa-regular fa-bookmark" class="bookmark-icon"></i>
                        </button>
                        <button class="btn btn-outline-primary apply-now-btn" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</button>
                    </div>
                </div>
            </div>
            <!-- Job 3 -->
            <div class="col-md-4">
                <div class="job-card p-3 border rounded">
                    <div class="d-flex align-items-center">
                        <div class="job-logo me-3">
                            <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded" width="50" height="50">
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 text-muted">XYZ Construction</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="job-title mb-1">Heavy Equipment Operator</h5>
                        <p class="job-meta text-muted mb-0">EFG Constructions - Qatar</p>
                        <p class="job-location text-muted mb-0">
                            <i class="fa-sharp fa-solid fa-location-dot me-1"></i> Qatar
                        </p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <button class="btn p-0 d-flex align-items-center justify-content-center bookmark-btn">
                            <i class="fa-regular fa-bookmark" class="bookmark-icon"></i>
                        </button>
                        <button class="btn btn-outline-primary apply-now-btn" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</button>
                    </div>
                </div>
            </div>
            <!-- Job 4 -->
            <div class="col-md-4">
                <div class="job-card p-3 border rounded">
                    <div class="d-flex align-items-center">
                        <div class="job-logo me-3">
                            <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded" width="50" height="50">
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 text-muted">KLM Hospital</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="job-title mb-1">Nurse - ICU</h5>
                        <p class="job-meta text-muted mb-0">GHI Health Services - Singapore</p>
                        <p class="job-location text-muted mb-0">
                            <i class="fa-sharp fa-solid fa-location-dot me-1"></i> Singapore
                        </p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <button class="btn p-0 d-flex align-items-center justify-content-center bookmark-btn">
                            <i class="fa-regular fa-bookmark" class="bookmark-icon"></i>
                        </button>
                        <button class="btn btn-outline-primary apply-now-btn" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</button>
                    </div>
                </div>
            </div>
            <!-- Job 5 -->
            <div class="col-md-4">
                <div class="job-card p-3 border rounded">
                    <div class="d-flex align-items-center">
                        <div class="job-logo me-3">
                            <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded" width="50" height="50">
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 text-muted">DEF Tech</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="job-title mb-1">Electrician</h5>
                        <p class="job-meta text-muted mb-0">JKL Electricals - Bahrain</p>
                        <p class="job-location text-muted mb-0">
                            <i class="fa-sharp fa-solid fa-location-dot me-1"></i> Bahrain
                        </p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <button class="btn p-0 d-flex align-items-center justify-content-center bookmark-btn">
                            <i class="fa-regular fa-bookmark" class="bookmark-icon"></i>
                        </button>
                        <button class="btn btn-outline-primary apply-now-btn" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</button>
                    </div>
                </div>
            </div>
            <!-- Job 6 -->
            <div class="col-md-4">
                <div class="job-card p-3 border rounded">
                    <div class="d-flex align-items-center">
                        <div class="job-logo me-3">
                            <img src="{{ asset('images/workforce.png') }}" alt="Company Logo" class="rounded" width="50" height="50">
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 text-muted">ABC Enterprises</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="job-title mb-1">Construction Foreman</h5>
                        <p class="job-meta text-muted mb-0">XYZ Constructions - Kuwait</p>
                        <p class="job-location text-muted mb-0">
                            <i class="fa-sharp fa-solid fa-location-dot me-1"></i> Kuwait
                        </p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <button class="btn p-0 d-flex align-items-center justify-content-center bookmark-btn">
                            <i class="fa-regular fa-bookmark" class="bookmark-icon"></i>
                        </button>
                        <button class="btn btn-outline-primary apply-now-btn" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="view-more text-center mt-4">
            <a href="{{ route('landingpage.jobs') }}" class="btn btn-outline-primary">View More</a>
        </div>
    </div>
</section>

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


<section id="career-next-step" class="text-center py-5">
    <div class="container">
        <h2 class="fw-bold">Take The Next Step in Your Career</span></h2>
        <p class="mt-3 text-muted">
        Every journey begins with a single step. Upload your resume now, and let’s find the right job for you!
        </p>
        <div class="mt-4">
            <a href="{{ route('signin.index') }}" class="btn btn-outline-primary px-4 py-2">Upload Resume</a>
        </div>
    </div>
</section>


<section id="client-testimonials" class="text-center py-5 bg-white shadow-sm">
    <div class="container">
        <h2 class="fw-bold">What our Clients are Saying</h2>
        <div class="row mt-4">
            @foreach($feedbacks as $feedback)
                <div class="col-md-4">
                    <div class="testimonial-card p-4 shadow-sm rounded bg-white">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $feedback->image) }}" alt="Client Image" class="rounded-circle me-3" width="50">
                            <div>
                                <strong>{{ $feedback->name }}</strong>
                                <div class="rating mt-1">{{ $feedback->rating }} ⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>
                        <p class="mt-3 text-muted">{{ $feedback->feedback }}</p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<footer class="py-4 bg-primary text-white">
    <div class="container">
        <p class="text-center">&copy; 2025 WIEAS. All Rights Reserved.</p>
    </div>
</footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
