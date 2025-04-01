<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .code {
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 2px;
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            background: #f5f5f5;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Email Verification</h2>
        <p>Thank you for signing up. Please use the following verification code to verify your email address:</p>
        
        <div class="code">{{ $code }}</div>
        
        <p>This code will expire in 15 minutes. If you didn't request this, please ignore this email.</p>
        
        <p>Best regards,<br>
        WIEAS Team</p>
    </div>
</body>
</html>