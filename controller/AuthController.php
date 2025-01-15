<?php
require_once "../src/visiter.php";
require_once "../src/User.php";

session_start();

class AuthController{

    private $username;
    private $email;
    private $password;
    private $role;
 
    public function register($username,$email,$password,$role){

                if (empty($username) || empty($email) || empty($password) || empty($role)) {

                    $message = "All fields are required.";
                }
                if (is_numeric($username)) {
                    $message = "Name cannot be a number.";
                }
            
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    $message = "Invalid email format.";
                }
            
                if (strlen($password) < 6) 
                {
                    $message = "Password must be at least 6 characters long.";
                }                
                if (strlen($username) < 3) 
                {
                    $message = "username must be at least 3 characters long.";
                }
                if(empty($message)){
                    $this->username = $username;
                    $this->email = $email;
                    $this->password = $password;
                    $this->role = $role;
                    
                    $visiteur = new visiter(); 
                    $message = $visiteur->register($this->username, $this->email, $this->password, $this->role);

                }

                if ($message === "User registered successfully") {

                    $this->login($this->email,$this->password);
                } else {
                    $_SESSION["error_message"] = $message;
                    header("location:../layout/general/signup.php");
                }
    }
    public function login($email,$password){

                $this->email = $email;
                $this->password = $password;
            
                $user = new User();
            
                $message = $user->login( $this->email, $this->password);

                if ($message === "Incorrect email or password") {
                    $_SESSION["error_message"] = $message;
                    header("location:../layout/general/login.php");
                }
    }
}