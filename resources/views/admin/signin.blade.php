<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIEAS Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Alternative Font Awesome Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-image: url('{{ asset('images/adminbg.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .card {
            border-radius: 20px;
        }
        .card-body {
            padding: 2rem;
        }
        .logo {
            max-width: 120px;
        }
        .form-container {
            height: 100vh;
        }
        .card-header {
            background-color: #ffffff;
        }
        .btn-primary {
            background-color: #0A65CC;
            border: none;
        }
        .forgot-password {
            text-align: left;
            font-size: 0.875rem;
            color: #0A65CC;
        }
        .form-group {
            position: relative;
        }
        .eye-icon {
            position: absolute;
            top: 73%;
            right: 25px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center form-container">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="{{ asset('images/workforce.png') }}" alt="Workforce International" class="logo">
                        </div>
                        <h4 class="text-center mb-4" style="color: #0A65CC;">ADMIN LOGIN</h4>
                        <form action="/your-login-route" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label ms-3 me-3">Email</label>
                                <input type="email" class="form-control mx-auto" style="width: 350px;" id="email" name="email" required>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="password" class="form-label ms-3 me-3">Password</label>
                                <input type="password" class="form-control mx-auto" style="width: 350px;" id="password" name="password" required>
                                <span class="eye-icon" id="toggle-password">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>

                            <div class="mb-3 ms-3 me-3">
                                <a href="#" class="forgot-password">Forgot Password?</a>
                            </div>

                            <button type="button" class="btn btn-primary mx-auto ms-2 me-2" style="width: 355px;" onclick="location.href='{{ route('admindash.index') }}';">Log In</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        // Toggle password visibility
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>
