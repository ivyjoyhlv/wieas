<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
        .password-container {
            position: relative;
            width: 100%;
        }
        .password-container input {
            padding-right: 40px; /* Space for the eye icon */
        }
        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }
        .password-container .toggle-password:hover {
            color: #333;
        }
        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            .left-panel, .right-panel {
                width: 100%;
                padding: 20px;
            }
            .left-panel img {
                max-width: 200px;
            }
            .company-text {
                font-size: 20px;
            }
            .login-content {
                margin-left: 20px;
                margin-right: 20px;
            }
        }

        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #28a745;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 18px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
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
                <p class="text-end">Opportunities are waiting, and your next step starts here. Whether you're looking for your first job or aiming for something new, WIEAS connects you to the right paths. Log in now and move closer to your career goals with confidence.</p>
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
                
                <!-- Success or Error message -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('signin.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="password-container">
                            <input type="password" class="form-control" name="password" id="password" required>
                            <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                     <!-- Remember me and Forgot Password Link aligned -->
                    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
                        <!-- Remember me Checkbox -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>

                        <!-- Forgot Password Link -->
                        <a href="#" class="text-link">Forgot Password?</a>
                    </div>

                      <!-- Google reCAPTCHA -->
                    <div class="g-recaptcha" data-sitekey="6LdVtwMrAAAAANJlaAHvYll_v2_B6OS-mFxGXTXX"></div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>

                <!-- Load reCAPTCHA API -->
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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


    <script>
        function togglePasswordVisibility(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = passwordField.nextElementSibling.querySelector('i');

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {        
                passwordField.type = "password";
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Automatically hide success or error messages after 2 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.querySelector('.alert-success');
            const errorMessage = document.querySelector('.alert-danger');
            const successPopup = document.getElementById('successPopup');

            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                    // Show success popup
                    successPopup.style.display = 'block';
                    setTimeout(function() {
                        successPopup.style.display = 'none';
                    }, 2000); // Hide popup after 2 seconds
                }, 2000); // Hide success message after 2 seconds
            }

            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 2000); // Hide error message after 2 seconds
            }
        });
    </script>
</body>
</html>
