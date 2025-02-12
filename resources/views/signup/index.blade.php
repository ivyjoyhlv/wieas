<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .signup-container {
            height: 100vh;
            display: flex;
            width: 100%;
        }
        .form-section {
            background: #fff;
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .info-section {
            background: linear-gradient(to right, #dbeafe, #bfdbfe);
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px;
        }
        .info-section h2 {
            font-weight: bold;
            text-align: left;
            margin-left: 40px;
            margin-right: 40px;
        }
        .info-section p {
            margin-left: 40px;
            margin-right: 40px;
            text-align: left;
        }
        .form-control {
            border-radius: 10px;
            width: 400px;
        }
        .btn-primary {
            width: 100%;
            border-radius: 10px;
            background-color: #007bff;
            border: none;
        }
        .google-btn {
            border-radius: 10px;
            width: 68%;
            height: 8%;
            border: 1px solid #ddd;
            background: #fff;
        }
        .logo-container {
            font-size: 25px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="form-section">
            <div class="text-center mb-4">
                <img src="{{ asset('images/workforce.png') }}" alt="Logo" width="40"> <strong style="font-size: 25px;">WIEAS</strong>
            </div>
            <h3 class="text-center mb-4 fw-bold">Create Account</h3>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
            <div class="text-center my-3">or sign up with</div>
            <button class="google-btn btn d-flex align-items-center justify-content-center">
                <img src="{{ asset('images/google.webp') }}" alt="Google" width="20" class="me-2"> Google
            </button>
            <div class="text-center mt-3">
                <strong><small>Already have an account? <a href="{{ route('signin.index') }}" class="text-primary">Log in</a></small></strong>
            </div>
        </div>
        <div class="info-section">
            <div>
                <img src="{{ asset('images/illustration.png') }}" alt="Illustration" width="250" class="mb-3">
                <h2>Let's get you hired</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>
</body>
</html>