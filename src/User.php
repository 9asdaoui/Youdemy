<?php
require_once __DIR__."/loger.php";
require_once __DIR__."/Database.php";

abstract class User
{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $role;
    protected $status;

    public function __construct($id = null, $username = null, $email = null, $password = null, $role = null, $status = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
    }

    public function getId() { return $this->id; } 
    public function setId($id) { $this->id = $id; } 
    public function getUsername() { return $this->username; } 
    public function setUsername($username) { $this->username = $username; } 
    public function getEmail() { return $this->email; } 
    public function setEmail($email) { $this->email = $email; } 
    public function getPassword() { return $this->password; } 
    public function setPassword($password) { $this->password = $password; } 
    public function getRole() { return $this->role; } 
    public function setRole($role) { $this->role = $role; } 
    public function getStatus() { return $this->status; } 
    public function setStatus($status) { $this->status = $status; }

    public function login($email, $password)
    {

        try{

            $pdo = Database::getConnection();

            global $selectUserByMail,$log;
            $stmt = $pdo->prepare($selectUserByMail);
            $stmt->execute([ ':email' => $email ]);
            $myuser = $stmt->fetch();

            
            if ($myuser && password_verify($password, $myuser["password"])) {
                session_start();

                $_SESSION["userid"] = $myuser["id"];
                $_SESSION["email"] = $myuser["email"];
                $_SESSION["role"] = $myuser["role"];
                $_SESSION["status"] = $myuser["status"];

                $log->info('User with email ' . $myuser["email"] . ' successfully logged in.');

                if ($myuser["role"] == "Admin") {
                    header("location:../layout/admin/admin_dashboard.php");

                } else if($myuser["role"] == "Student"){
                    header("location:../layout/Student");

                }else if($myuser["role"] == "Teacher"){
                    header("location:../layout/Teacher");
                }
            } else {
                $log->warning('User with email ' . $email . ' attempted to log in with incorrect credentials.');
                return "Incorrect email or password";
            }
        }catch (\PDOException $e) {
            global $log;
            $log->error('An error occurred: ' . $e->getMessage());
            return "please try again later";

        }
    }
    
    public static function toObject($data){}

}
// $n = new user;
// $n->login("dfghjk","dfghjkl");