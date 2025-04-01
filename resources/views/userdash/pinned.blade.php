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
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.index') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.jobopenings') }}">Jobs</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-primary" href="{{ route('userdash.pinned') }}">Pinned</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('userdash.conference') }}">Conference</a></li>
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
    
    <div class="container mt-5">
        <h3>Pinned Jobs</h3>

        @php
            use Illuminate\Support\Str;
        @endphp

        @if(session()->has('pinned_jobs') && count(session('pinned_jobs')) > 0)
            <div class="row mt-4">
                @foreach(session('pinned_jobs') as $job)
                    <div class="col-md-12 mb-4">
                        <div class="job-card bg-white d-flex justify-content-between align-items-center p-4 border rounded">
                            <div class="job-details">
                                <h4 class="mb-2">{{ $job->job_title }}</h4>
                                <p class="mb-0">{{ $job->company_name }}</p>
                                <p><i class="bi bi-geo-alt-fill"></i> {{ $job->country_origin }} <span class="text-muted">Contractual</span></p>
                                <p class="text-muted">{{ Str::limit($job->about_us, 150) }}...</p>

                                <div class="d-flex align-items-center mb-3">
                                    <p class="text-muted me-3"><i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center">
                                    <!-- Remove Pin Button -->
                                    <a href="{{ route('userdash.removePin', ['job_id' => $job->id]) }}" class="btn btn-outline-danger rounded-circle mb-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; margin-top: 30px;">
                                        <i class="bi bi-x" style="font-size: 1.2rem;"></i> <!-- X icon for removing pin -->
                                    </a>

                                    <a href="#" class="btn btn-primary d-flex align-items-center" style="width: 105px; text-align: center; margin-left: 10px; margin-top: 20px;" data-bs-toggle="modal" data-bs-target="#fileUploadModal">
                                        Apply Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center mt-5">
                <img src="{{ asset('images/pin.png') }}" alt="Pinned Jobs Icon" class="img-fluid" style="max-width: 150px;">
            </div>
            <h4 class="text-center mt-3">No pinned jobs yet.</h4>
            <p class="text-center">Pin jobs now and see your Pinned Jobs here.</p>
        @endif
    </div>

</body>
</html>
