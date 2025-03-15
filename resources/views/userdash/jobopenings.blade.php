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

        /* Enhanced modal styling */
        .modal-content {
            border-radius: 15px;
            padding: 20px;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }

        .modal-title {
            font-size: 1.5rem;
            color: #333;
        }

        .file-input {
            border: 2px dashed #007bff;
            border-radius: 8px;
            padding: 15px;
            background-color: #f9f9f9;
            cursor: pointer;
            text-align: center;
            font-size: 0.9rem;
        }

        .file-input:hover {
            background-color: #e7f1ff;
        }

        .file-input input {
            display: none;
        }

        .file-input .file-icon {
            font-size: 2rem;
            color: #007bff;
        }

        .file-input span {
            display: block;
            margin-top: 10px;
            color: #007bff;
            font-weight: 600;
        }

        .btn-apply {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
            background-color: white;
            color: #007bff;
            border: 1px solid #007bff; /* Blue border */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover */
        }

        .btn-apply:hover {
            background-color: #007bff;
            color: white;
        }


        .btn-close {
            background: transparent;
            border: none;
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
                <li class="nav-item"><a class="nav-link" href="{{ route('userdash.index') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-primary" href="{{ route('userdash.jobopenings') }}">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('userdash.pinned') }}">Pinned</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('userdash.conference') }}">Conference</a></li>
            </ul>
        </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-bell me-3 text-primary" id="notificationIcon" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <div class="dropdown-menu p-4" aria-labelledby="notificationIcon">
                    <h5 class="text-center mb-3">Notifications</h5> 
                </div>
                <div class="d-flex align-items-center ms-3">
                    <img src="{{ asset('images/bogart.jpg') }}" class="rounded-circle me-2 img-fluid" style="width: 40px; height: 40px;" alt="User Profile">
                    <div>
                        <span class="d-block fw-bold">{{ session('applicant')->first_name }}</span>
                        <small class="text-muted">{{ session('applicant')->email }}</small>
                    </div>
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
@php
use Illuminate\Support\Str;
@endphp
                <div class="container">
    <div class="row">
        @foreach ($activeJobs as $job)
            <div class="col-md-12 mb-4">
                <div class="job-card bg-white d-flex justify-content-between align-items-center p-4 border rounded">
                    <!-- Left section (Job Title, Company, and Description) -->
                    <div class="job-details">
                        <h4 class="mb-2">{{ $job->job_title }}</h4>
                        <p class="mb-0">{{ $job->company_name }}</p>
                        <p><i class="bi bi-geo-alt-fill"></i> {{ $job->country_origin }} <span class="text-muted">Contractual</span></p>
                        <p class="text-muted">{{ Str::limit($job->about_us, 150) }}...</p>

                        <!-- Date and Position Information -->
                        <div class="d-flex align-items-center mb-3">
                            <p class="text-muted me-3"><i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-end">
                        <!-- Bookmark Icon (Circular with Border Radius) and Apply Now Button -->
                        <div class="d-flex align-items-center">
                            <!-- Bookmark Icon -->
                            <a href="{{ route('userdash.pinJob', ['job_id' => $job->id]) }}" class="btn btn-outline-primary rounded-circle mb-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; margin-top: 30px;">
                                <i class="bi bi-bookmark" style="font-size: 1.2rem;"></i>
                            </a>
                            <!-- Apply Now Button with Modal Trigger -->
                            <a href="#" class="btn btn-primary d-flex align-items-center" style="width: 105px; text-align: center; margin-left: 10px; margin-top: 20px;" data-bs-toggle="modal" data-bs-target="#fileUploadModal">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for File Upload -->
    <div class="modal fade" id="fileUploadModal" tabindex="-1" aria-labelledby="fileUploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileUploadModalLabel">Attach Files</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <!-- Certificate Upload -->
                        <div class="mb-4">
                            <label for="certificateUpload" class="form-label">Certificates</label>
                            <div class="file-input" id="certificateUpload">
                                <div class="file-icon">
                                    <i class="bi bi-file-earmark-arrow-up"></i>
                                </div>
                                <span>Click or drag to upload your certificate (jpg, png)</span>
                                <input type="file" accept=".jpg,.png">
                            </div>
                        </div>

                        <!-- Supporting Document Upload -->
                        <div class="mb-4">
                            <label for="supportingDocUpload" class="form-label">Supporting Document</label>
                            <div class="file-input" id="supportingDocUpload">
                                <div class="file-icon">
                                    <i class="bi bi-file-earmark-arrow-up"></i>
                                </div>
                                <span>Click or drag to upload your document (pdf, docx, txt)</span>
                                <input type="file" accept=".pdf,.docx,.txt">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn-apply">Apply Now</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
