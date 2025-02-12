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
        .job-card {
            border-radius: 10px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }
        .job-card:hover {
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }
        .active-job {
            border: 2px solid #007bff;
        }
        .bookmark-icon:hover {
            color: #0056b3;
        }
        .apply-btn:hover {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        .job-details {
            border-radius: 10px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="#">Logo</a>
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">Jobs</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">About Us</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">Contact Us</a></li>
            </ul>
        </div>
        <div class="d-flex">
            <a href="#" class="btn btn-outline-primary me-2">Sign in</a>
            <a href="#" class="btn btn-primary">Sign Up</a>
        </div>
    </div>
</nav>

<!-- Search Section -->
<div class="container mt-4">
    <h1 class="fw-bold">Find a job</h1>
    <p>Lorem ipsum dolor sit amet, consectetur</p>

    <div class="row g-3">
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="Search Job">
        </div>
        <div class="col-md-3">
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
</div>

<!-- Job Listings & Details -->
<div class="container mt-4">
    <div class="row">
        <!-- Job List -->
        <div class="col-md-4">
            <div id="jobList">
                @foreach ($jobs as $job)
                    <div class="job-card p-3 mb-3" onclick="showJobDetails({{ json_encode($job) }})">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ $job->logo }}" alt="Company Logo" class="rounded me-2" width="30">
                                <span class="text-primary fw-bold">{{ $job->company }}</span>
                            </div>
                            <small class="text-muted">1 day ago</small>
                        </div>
                        <h6 class="fw-bold mt-2">{{ $job->title }}</h6>
                        <p class="small text-muted mb-2">{{ $job->location }}</p>
                        <div class="d-flex justify-content-end align-items-center gap-2">
                            <i class="bi bi-bookmark text-primary bookmark-icon" style="font-size: 1.2rem;"></i>
                            <button class="btn btn-outline-primary btn-sm">Apply Now</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Job Details -->
        <div class="col-md-8">
            <div class="job-details p-4">
                <h5 id="jobTitle" class="fw-bold">Select a job to view details</h5>
                <p id="jobCompany" class="text-muted"></p>
                <p id="jobLocation" class="text-muted"><i class="bi bi-geo-alt"></i> </p>

                <h6 class="fw-bold">JOB DESCRIPTION</h6>
                <p id="jobDescription">Click on a job from the left to view its details.</p>

                <h6 class="fw-bold">REQUIREMENTS</h6>
                <ul id="jobRequirements">
                    <li>Job requirements will be displayed here.</li>
                </ul>

                <div class="d-flex justify-content-end">
                    <i class="bi bi-bookmark text-primary bookmark-icon" style="font-size: 1.2rem;"></i>
                    <button class="btn btn-outline-primary btn-sm apply-btn">Apply Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Job Selection -->
<script>
    function showJobDetails(job) {
        document.getElementById("jobTitle").innerText = job.title;
        document.getElementById("jobCompany").innerText = job.company;
        document.getElementById("jobLocation").innerHTML = `<i class="bi bi-geo-alt"></i> ${job.location}`;
        document.getElementById("jobDescription").innerText = job.description;

        let requirementsList = document.getElementById("jobRequirements");
        requirementsList.innerHTML = "";
        job.requirements.forEach(req => {
            let li = document.createElement("li");
            li.innerText = req;
            requirementsList.appendChild(li);
        });

        // Highlight the selected job
        document.querySelectorAll(".job-card").forEach(card => card.classList.remove("active-job"));
        event.currentTarget.classList.add("active-job");
    }
</script>

</body>
</html>
