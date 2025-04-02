<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .verification-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .otp-input {
            letter-spacing: 10px;
            font-size: 24px;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <h2 class="text-center mb-4">Verify Your Email</h2>
        <p class="text-center mb-4">We've sent a 6-digit verification code to <strong>{{ $email }}</strong></p>
        
        <form method="POST" action="{{ route('signup.verify') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            
            <div class="mb-3">
                <label for="otp" class="form-label">Enter Verification Code</label>
                <input type="text" 
                       class="form-control otp-input" 
                       name="otp" 
                       id="otp" 
                       maxlength="6" 
                       required 
                       autofocus>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Verify Account</button>
        </form>
        
        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="text-center mt-3">
            <p>Didn't receive the code? <a href="#" id="resend-link">Resend</a></p>
            <p id="resend-timer" style="display: none;">Resend available in <span id="countdown">60</span> seconds</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Auto move to next input (for better OTP entry UX)
        document.getElementById('otp').addEventListener('input', function(e) {
            if (this.value.length === 6) {
                this.form.submit();
            }
        });

        // Resend OTP functionality
        $('#resend-link').click(function(e) {
            e.preventDefault();
            
            // Show timer
            $('#resend-link').hide();
            $('#resend-timer').show();
            
            // Start countdown
            let timeLeft = 60;
            const countdown = setInterval(() => {
                timeLeft--;
                $('#countdown').text(timeLeft);
                
                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    $('#resend-link').show();
                    $('#resend-timer').hide();
                }
            }, 1000);
            
            // Send AJAX request to resend OTP
            $.ajax({
                url: '{{ route("signup.resend") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    email: '{{ $email }}'
                },
                success: function(response) {
                    alert('A new OTP has been sent to your email.');
                },
                error: function() {
                    alert('Failed to resend OTP. Please try again.');
                }
            });
        });
    </script>
</body>
</html>