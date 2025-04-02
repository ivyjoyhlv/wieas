<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h2>Verify Your Email Address</h2>
    <p>Thank you for signing up with WIEAS. Please use the following OTP to verify your email address:</p>
    
    <div style="margin: 20px 0; font-size: 24px; font-weight: bold;">
        {{ $otp }}
    </div>
    
    <p>This OTP will expire at {{ $expires_at }}.</p>
    
    <p>If you didn't request this, please ignore this email.</p>
    
    <p>Best regards,<br>WIEAS Team</p>
</body>
</html>