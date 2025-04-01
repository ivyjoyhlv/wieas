<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .verification-container {
            max-width: 500px;
            width: 100%;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .otp-input {
            letter-spacing: 2px;
            font-size: 1.5rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <h2 class="text-center mb-4">Verify Your Email</h2>
        <p class="text-center">We've sent a 6-digit code to <strong>{{ $email }}</strong></p>
        
        @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger mb-3">
            {{ $errors->first() }}
        </div>
        @endif
        
        <form method="POST" action="{{ route('signup.verify') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            
            <div class="mb-3">
                <label for="otp" class="form-label">Verification Code</label>
                <input type="text" class="form-control otp-input" name="otp" id="otp" 
                       maxlength="6" required autofocus>
                @error('otp')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Verify</button>
        </form>
        
        <div class="text-center mt-3">
            <p>Didn't receive a code? <a href="{{ route('signup.resend') }}" onclick="event.preventDefault(); document.getElementById('resend-form').submit();">Resend Code</a></p>
            <form id="resend-form" action="{{ route('signup.resend') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
            </form>
        </div>
    </div>

    <script>
        // Auto submit when 6 digits are entered
        document.getElementById('otp').addEventListener('input', function() {
            if(this.value.length === 6) {
                this.form.submit();
            }
        });
    </script>
</body>
</html>