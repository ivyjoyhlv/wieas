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
        body {
            font-family: Arial, sans-serif;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
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

        /* Bookmark Hover Effect */
        .bookmark-icon:hover {
            color: #0056b3;
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
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo Section -->
        <div class="d-flex align-items-center">
            <img src="https://via.placeholder.com/30/007bff/ffffff?text=+" alt="Logo" class="rounded-circle me-2">
            <a class="navbar-brand fw-bold text-dark" href="#">Logo</a>
        </div>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">Jobs</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">About Us</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">Contact Us</a></li>
            </ul>
        </div>

        <!-- Auth Buttons -->
        <div class="d-flex">
            <a href="#" class="btn btn-outline-primary me-2">Sign in</a>
            <a href="#" class="btn btn-primary">Sign Up</a>
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
    <!-- Wrap both buttons together inside a flex container -->
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
        @for ($i = 0; $i < 9; $i++) <!-- Generates multiple job cards -->
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="job-card p-3 w-100" style="max-width: 350px; border-radius: 10px; background: #fff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/30/007bff/ffffff?text=+" alt="Company Logo" class="rounded me-2">
                            <span class="text-primary fw-bold">LOGO</span>
                        </div>
                        <small class="text-muted">1 day ago</small>
                    </div>
                    <h6 class="fw-bold mt-2">WORKER STEEL STRUCTURE</h6>
                    <p class="small text-muted mb-2">IREM S.P.A HUNGARY BRANCH</p>
                    <p class="small text-muted"><i class="bi bi-geo-alt"></i> HUNGARY</p>
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <i class="bi bi-bookmark-fill text-primary" style="font-size: 1.2rem; cursor: pointer;"></i>
                        <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-end">
            <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">10</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
    </nav>
</div>


<!-- Footer -->
<footer class="footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-start">
                <span class="footer-logo">Logo</span>
            </div>
            <div class="col-md-4">
                <p class="mb-0">Copyright 2025</p>
            </div>
            <div class="col-md-4 text-end">
                <a href="#" class="text-white me-3">Home</a>
                <a href="#" class="text-white me-3">Jobs</a>
                <a href="#" class="text-white me-3">About Us</a>
                <a href="#" class="text-white">Contact Us</a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
