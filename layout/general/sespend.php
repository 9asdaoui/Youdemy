<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Non-Verified Teacher Account</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #2c3e50, #34495e);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #ecf0f1;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: #1a252f;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .navbar .logo {
            font-size: 1.5rem;
            color: #ecf0f1;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            background: #1a252f;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            text-align: center;
            padding: 30px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container h1 {
            font-size: 2rem;
            color: #e74c3c;
            margin-bottom: 10px;
        }

        .container p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            color: #bdc3c7;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            background: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 1rem;
            transition: background 0.3s ease, transform 0.2s;
        }

        .btn:hover {
            background: #c0392b;
            transform: scale(1.05);
        }

        .status {
            margin: 20px 0;
            padding: 10px;
            background: rgba(231, 76, 60, 0.1);
            border: 1px solid rgba(231, 76, 60, 0.5);
            border-radius: 10px;
            color: #e74c3c;
        }

        .info-icon {
            font-size: 50px;
            color: #e74c3c;
            margin-bottom: 15px;
        }

        .footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .footer a {
            color: #e74c3c;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="navbar">
    </div>
    <div class="container">
        <div class="info-icon">⚠️</div>
        <h1>Account  Suspended</h1>
        <p>Your account is currently not verified. Please verify your account to access all features available for teachers.</p>
        <div class="status">Suspended</div>
        <div class="footer">
            <p>Need help? <a href="#">Contact Support</a></p>
        </div>
    </div>
</body>
</html>
