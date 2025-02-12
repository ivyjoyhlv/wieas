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
                    <li class="nav-item"><a class="nav-link fw-bold text-primary" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Find Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Saved Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">...</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-bell me-3 text-primary"></i>
                <div class="d-flex align-items-center">
                <img src="{{ asset('images/bogart.jpg') }}" class="rounded-circle me-2 img-fluid" style="width: 40px; height: 40px;" alt="User Profile">
                <div>

                        <span class="d-block fw-bold">Bogart Batumbakal</span>
                        <small class="text-muted">bogart69@gmail.com</small>
                    </div>
                    <i class="bi bi-chevron-down ms-2"></i>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <h1 class="fw-bold">Find a job</h1>
        <p>Lorem ipsum dolor sit amet, consectetur</p>
    
        <div class="row g-3 align-items-center mb-4">
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

        <h3 class="mt-4 mb-3">Hello, Bogart!</h3>
        
        <div class="card p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <svg width="80" height="80">
                        <circle cx="40" cy="40" r="35" stroke="#E0E0E0" stroke-width="6" fill="none" />
                        <path d="M40,5 A35,35 0 1,1 7,40" stroke="#007BFF" stroke-width="6" fill="none" />
                        <text x="25" y="45" font-size="18" font-weight="bold">20%</text>
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
            <h4>Saved Jobs</h4>
            <p>No saved jobs yet.</p>
        </div>
    </div>
</body>
</html>
