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

        .icon {
      color: #3D9CFB;
        }
        /* img-large now uses max-width for responsiveness */
        .img-large {
        width: 100%;
        max-width: 400px;
        height: auto;
        }
        /* Map container styling */
        .map-container iframe {
        width: 100%;
        height: 300px;
        border-radius: 10px;
        border: 0;
        }
        /* Reduce paragraph margin for tighter line spacing */
        p {
        margin-bottom: 5px;
        }
        h1, h2 , h3{
                font-family: "Inter", sans-serif;
                font-optical-sizing: auto;
                font-weight: 700;
                font-style: normal;
            }
        .container {
        margin-bottom: 20px; /* Adjust this value as needed */
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

    <!-- Contact Info & Image -->
  <div class="container py-3">
    <!-- Use flex-column on small screens and flex-row on md and up -->
    <div class="d-flex flex-column flex-md-row align-items-center mb-4">
      <div class="flex-grow-1">
        <h1>Love to hear from you<br>Get in touch</h1>
        <p>Give us a call:</p>
        <p>
          <i class="bi bi-telephone-fill icon me-2"></i> <strong>+632 8525 023</strong>
        </p>
        <p>
          <i class="bi bi-telephone-fill icon me-2"></i> <strong>+63 967 145 2807</strong>
        </p>
        <p>
          <i class="bi bi-telephone-fill icon me-2"></i> <strong>+63 960 894 3741</strong>
        </p>
        <p>Reach out via email:</p>
        <p>
          <i class="bi bi-envelope-fill icon me-2"></i> <strong>e.i.workforce@gmail.com</strong>
        </p>
      </div>
      <!-- Add spacing on mobile (mt-3) and margin-left on md and up (ms-md-3) -->
      <img src="{{ asset('images/contact.png') }}" alt="Contact Illustration" class="ms-md-3 mt-3 mt-md-0 img-large">
    </div>
  </div>
  
  <!-- Map & Label -->
  <div class="container py-3">
    <div class="row align-items-center">
      <!-- Map on the left -->
      <div class="col-md-7">
        <div class="map-container">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.399512134243!2d120.98758647407988!3d14.576296577673254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c963bd24d38f%3A0xe91f6db49144d64c!2sWorkforce%20International!5e0!3m2!1sen!2sph!4v1742066154391!5m2!1sen!2sph" 
                   allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      <!-- Address on the right; add top margin on mobile -->
      <div class="col-md-5 mt-4 mt-md-0">
        <h1>
          <i class="bi bi-geo-alt-fill icon me-2"></i> Find Your Way to Us
        </h1>
        <p>
          <strong>Unit A8B, 2nd Floor Great Wall Bldg.</strong><br>
          1624 F. Agoncillo St, Malate, Manila
        </p>
      </div>
    </div>
  </div>
      
  <!-- Business Hours & Image -->
  <div class="container py-3">
    <div class="d-flex flex-column flex-md-row align-items-center">
      <div class="flex-grow-1">
        <h1>
          <i class="bi bi-clock-fill icon me-2"></i> When Our Doors Are Open for You
        </h1>
        <p><strong>Monday to Friday:<br></strong> 8:00 AM - 5:00 PM</p>
        <p><strong>Saturday:<br></strong> 8:00 AM - 12:00 PM</p>
      </div>
      <img src="{{ asset('images/illustration.png') }}" alt="Business Hours Illustration" class="ms-md-3 mt-3 mt-md-0 img-large">
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>ss
</body>
</html>
