<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Course Platform</title>
    <link href="../assest/style.css" rel="stylesheet">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1 class="auth-title">Create Account</h1>
                <p class="auth-subtitle">Join our learning platform</p>
                <?php 
                    session_start();

                    if (isset($_SESSION["error_message"])) {  
                        echo "<p style='color: red;' class='error-mess'>". $_SESSION["error_message"]."</p>";
                        unset($_SESSION["error_message"]);
                    }       
                ?>
            </div>
            
            <form action="../../core/Router.php" method="POST" class="auth-form" id="signupForm">
                <input type="hidden" name="url" value="register">
                <div class="auth-form-group">
                    <label class="auth-label" for="fullName">Full Name</label>
                    <input 
                        type="text" 
                        id="fullName" 
                        name="username"
                        class="auth-input" 
                        placeholder="Enter your full name"
                        required
                    >
                </div>

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
                        name="password"
                        type="password" 
                        id="password" 
                        class="auth-input" 
                        placeholder="Create a password"
                        required
                    >
                </div>

                <div class="auth-form-group">
                    <label class="auth-label" for="role">Choose Your Role</label>
                    <select 
                        id="role" 
                        class="auth-input" 
                        name="role"
                        required
                    >
                        <option value="" disabled selected>Select your role</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                    <span id="roleError" class="auth-error"></span>
                </div>
                
                <button type="submit" class="auth-button">Create Account</button>
            </form>
            
            <div class="auth-divider">
                <span>OR</span>
            </div>
            
            <p class="auth-link">
                Already have an account? 
                <a href="login.php">Login here</a>
            </p>
        </div>
    </div>

</body>
</html>