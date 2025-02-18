<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .login-container {
            width: 100vw;
            height: 100vh;
            display: flex;
        }
        .left-panel {
            width: 50%;
            background: linear-gradient(to bottom, #ffffff, #3b82f6);
            padding: 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .left-panel-content {
            width: 100%;
            max-width: 400px;
        }
        .left-panel img {
            width: 100%;
            max-width: 250px;
            display: block;
            margin: 0 auto 20px;
        }
        .right-panel {
            width: 50%;
            background: white;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-control {
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .btn-primary {
            width: 100%;
            border-radius: 10px;
            background-color: #3b82f6;
            margin-top: 10px;
        }
        .btn-outline-secondary {
            width: 100%;
            border-radius: 10px;
            margin-top: 10px;
        }
        .text-link {
            color: #3b82f6;
            text-decoration: none;
        }
        form {
            margin-bottom: 20px;
        }
        .login-content {
            margin-left: 40px;
            margin-right: 40px;
        }
        .company-text {
            font-size: 18px;
            font-weight: bold;
        }
        .company-text {
            font-size: 25px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Panel -->
        <div class="left-panel">
            <div class="left-panel-content">
                <img src="{{ asset('images/illustration.png') }}" alt="Illustration">
                <h2 class="fw-bold text-end">Let’s get you hired</h2>
                <p class="text-end">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="right-panel">
        <div class="text-center mb-4 d-flex align-items-center justify-content-center">
                <img src="{{ asset('images/workforce.png') }}" alt="Logo" width="40">
                <span class="ms-2 company-text">WIEAS</span>
            </div>
            <div class="login-content">
                <h4 class="fw-bold">Log in</h4>
                <p class="text-muted">Welcome back! Please enter your details.</p>
                <form method="POST" action="{{ route('signin.login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
                <div class="text-center my-3">or sign up with</div>
                <button class="btn btn-outline-secondary d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/google.webp') }}" alt="Google" width="20" class="me-2"> Google
                </button>
                <div class="text-center mt-3">
                   <strong><small>Don't have an account? <a href="{{ route('signup.index') }}" class="text-primary">Sign Up</a></small></strong>
                </div>
            </div>
        </div>
    </div>
</body>
</html>