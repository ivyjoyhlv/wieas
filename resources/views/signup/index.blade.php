<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        
        /* Password container with eye icon - updated to match sign-in */
        .password-container {
            position: relative;
            width: 100%;
        }
        .password-container input {
            padding-right: 40px; /* Space for the eye icon */
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }
        .toggle-password:hover {
            color: #333;
        }
        
        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .signup-container {
                flex-direction: column;
            }
            .form-section, .info-section {
                width: 100%;
                padding: 20px;
            }
            .form-control {
                width: 100%;
            }
            .google-btn {
                width: 80%;
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

        .error-popup {
            background-color: #dc3545;
        }

        .email-error-popup {
            background-color: #dc3545;
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
            <form method="POST" action="{{ route('signup.store') }}" id="signupForm">
                @csrf
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    <div id="emailError" class="text-danger" style="display:none;">This email is already in use.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="password-container">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="password-container">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div id="passwordError" class="text-danger" style="display:none;">Password must be at least 8 characters long.</div>
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
                <p>New opportunities are just around the corner! Whether you're entering the job market for the first time or seeking your next big challenge, WIEAS is here to connect you with the right people and resources. Sign up today and take the next step toward achieving your career goals.</p>
            </div>
        </div>
    </div>

    <!-- Success or Error Popups -->
    <div id="successPopup" class="popup">
        You have successfully signed up!
    </div>
    <div id="errorPopup" class="popup error-popup">
        Something went wrong! Please try again.
    </div>
    <div id="emailErrorPopup" class="popup email-error-popup">
        This email is already in use.
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script>
        // Toggle password visibility function (matches sign-in page)
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

        // Show success or error popups after form submission
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = "{{ session('success') }}";
            const errorMessage = "{{ session('error') }}";

            if (successMessage) {
                const successPopup = document.getElementById('successPopup');
                successPopup.style.display = 'block';
                setTimeout(function() {
                    successPopup.style.display = 'none';
                }, 2000);
            }

            if (errorMessage) {
                const errorPopup = document.getElementById('errorPopup');
                errorPopup.style.display = 'block';
                setTimeout(function() {
                    errorPopup.style.display = 'none';
                }, 2000);
            }
        });

        // Email check (AJAX) to see if the email is already used
        $('#email').on('blur', function() {
            const email = $('#email').val();
            
            $.ajax({
                url: '{{ route('signup.checkEmail') }}',  // Route to check email
                type: 'GET',
                data: { email: email },
                success: function(response) {
                    if (response.exists) {
                        $('#emailError').show();
                        $('#emailErrorPopup').show();
                    } else {
                        $('#emailError').hide();
                        $('#emailErrorPopup').hide();
                    }
                },
                error: function() {
                    console.log("Error checking email");
                }
            });
        });

        // Password length validation (minimum 8 characters)
        const passwordInput = document.getElementById('password');
        const passwordConfirmationInput = document.getElementById('password_confirmation');
        const passwordError = document.getElementById('passwordError');

        document.getElementById('signupForm').addEventListener('submit', function(event) {
            let valid = true;
            // Check password length
            if (passwordInput.value.length < 8) {
                valid = false;
                passwordError.style.display = 'block';
            } else {
                passwordError.style.display = 'none';
            }

            if (!valid) {
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>
</html>