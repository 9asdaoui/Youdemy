
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Course Platform</title>
    <link href="../assest/style.css" rel="stylesheet">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1 class="auth-title">Welcome Back</h1>
                <p class="auth-subtitle" >Login to access your courses</p>
                <?php 
                    session_start();

                    if (isset($_SESSION["error_message"])) {  
                        echo "<p style='color: red;' class='error-mess'>". $_SESSION["error_message"]."</p>";
                        unset($_SESSION["error_message"]);
                    }       
                ?>
            </div>
            
            <form action="../../core/Router.php" method="POST" class="auth-form" id="loginForm" >
                <input type="hidden" name="url" value="login">
                <div class="auth-form-group">
                    <label class="auth-label" for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        class="auth-input" 
                        placeholder="Enter your email"
                        required
                    >
                </div>
                
                <div class="auth-form-group">
                    <label class="auth-label" for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        class="auth-input" 
                        placeholder="Enter your password"
                        required
                    >
                </div>
                
                <button type="submit" class="auth-button">Login</button>
            </form>
            
            <div class="auth-divider">
                <span>OR</span>
            </div>

            
            <p class="auth-link">
                Don't have an account? 
                <a href="signup.php">Sign up here</a>
            </p>
        </div>
    </div>
</body>
</html>