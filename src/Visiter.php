<?php
require_once "Database.php";
require_once "loger.php";
require_once "../temp/query.php";

class Visiter
{


    public function register($username, $email, $password, $role)
    {
        try{
            global $isertUser,$log;
            $pdo = Database::getConnection();

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
    
            if ($stmt->rowCount() > 0) {
                return "Email already in use.";
                $log->info('New user try to registered with a used email ' . $email);

            }

            $stmt = $pdo->prepare($isertUser);
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $hashedPassword,
                ':role' => $role,
                ':status' => ($role == 'Teacher') ? 'verification' : 'active'
            ]);
            $log->info('New user registered with email ' . $email);
            return "User registered successfully";
        }catch (\PDOException $e) {
            $log->error('An error occurred: ' . $e->getMessage());
            return "please try again latter";
        }
    }
}