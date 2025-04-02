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

        .hero {
            background: url('{{ asset('images/Office_building.png') }}') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 120px 20px; 
            min-height: 400px; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-family: "Inter", sans-serif;
        }
        .inter {
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: 700;
            font-style: normal;
        }
        h1, h2{
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: 700;
            font-style: normal;
        }

        .section {
            padding: 60px 20px;
        }
        .footer {
            background: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .justify{
            text-align: justify;
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

    <div class="hero">
        <h1>About Us</h1>
        <h1>Workforce International Inc.</h1>
        <p>Unit A&B @nd Floor Great Wall Bldg., 1624 F. Agoncillio St., Malate, Manila<br>License. DMW-423-6008162024-R</p>
    </div>
    
    <div class="container">
        <div class="row section align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('images/doing.jpg') }}" class="img-fluid" alt="What We Do">
            </div>
            <div class="col-md-6">
                <h2>What We Do?</h2>
                <p class="justify">Workforce International Inc. is committed to providing high-quality and efficient workforce 
                    solutions to its clients worldwide. We specialize in connecting skilled Filipino workers to employers abroad, 
                    while ensuring a thorough hiring process, benefiting both job seekers and businesses.</p>
            </div>
        </div>
    
        <div class="row section align-items-center">
            <div class="col-md-6 order-md-2 text-center">
                <img src="{{ asset('images/doing.jpg') }}" class="img-fluid" alt="Who We Are">
            </div>
            <div class="col-md-6 order-md-1">
                <h2>Who We Are?</h2>
                <p class="justify">Workforce International Inc. is a trusted name in workforce solutions, recognized by industry 
                    pioneers in the Philippines. Though newly established, our leadership brings over 20 years of 
                    experience in connecting skilled professionals with leading global companies across Saudi Arabia, 
                    the United Arab Emirates, Qatar, Kuwait, and beyond.
                    Guided by strong and forward-thinking leadership, we are committed to excellence, integrity,
                    and providing opportunities that empower both job seekers and employers worldwide.</p>
            </div>
        </div>
    
        <div class="row section align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('images/ofw.jpeg') }}" class="img-fluid" alt="Why We Do This">
            </div>
            <div class="col-md-6">
                <h2>Why We Do This?</h2>
                <p class="justify">We do this because we believe in creating life-changing opportunities for Filipino workers while
                    helping businesses worldwide find skilled and dedicated professionals. Our commitment goes beyond 
                    recruitment—we aim to empower individuals, strengthen communities, and bridge the gap between 
                    talent and opportunity, ensuring success for both workers and employers.</p>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
