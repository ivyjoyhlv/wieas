<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .job-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .job-card .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1>Jobs</h1>

    <!-- New Job Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addJobModal">Add Job</button>

    <!-- Search and Filter Section -->
    <div class="d-flex justify-content-between mb-4">
        <input type="text" class="form-control w-50" placeholder="Search here..." />
        <div>
            <button class="btn btn-outline-secondary">More Filter</button>
            <button class="btn btn-outline-secondary">From newest to last</button>
        </div>
    </div>

    <!-- Job Listings Section -->
    <div class="row">
        @for ($i = 0; $i < 4; $i++)
        <div class="col-md-3">
            <div class="job-card">
                <h5>WORKER STEEL STRUCTURE</h5>
                <p>Date: FEB 22 2025</p>
                <p>Location: Hungary</p>
                <p>Views: 869</p>
                <button class="btn btn-link">869 applicants</button>
                <button class="btn btn-link">Edit</button>
            </div>
        </div>
        @endfor
    </div>
</div>

<!-- Add Job Modal -->
<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addJobModalLabel">Add Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your form inputs for creating a job here -->
                <form>
                    <!-- Job Form Inputs -->
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
