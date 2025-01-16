<?php
require_once __DIR__."/loger.php";
require_once __DIR__."/User.php";
require_once __DIR__."/Database.php";

class Admin extends User
{
  
    public function updateStatus($id, $status)
    {
    try{
        $pdo = Database::getConnection();
        global $updatUserStatu,$log;
        $stmt = $pdo->prepare($updatUserStatu);
        $stmt->execute([ ':status' => $status, ':id' => $id ]);

        return "User status updated successfully";
    }catch (\PDOException $e) {
        $log->error('An error occurred: ' . $e->getMessage());
        return "please try again latter";
    }
    }
    
    public function deleteStudent($studentId)
    {
        try {
            $db = Database::getConnection();

            $query = "DELETE FROM Users WHERE id = :studentId AND role = 'student'";
            $stmt = $db->prepare($query);
            $stmt->execute(['studentId' => $studentId]);

            return "Student account deleted successfully.";
        } catch (PDOException $e) {
            return "Error deleting student account: " . $e->getMessage();
        }
    }

    public function getUserById($id)
    {
        try{
            $pdo = Database::getConnection();
            global $selectUserById,$log;
            $stmt = $pdo->prepare($selectUserById);
            $stmt->execute([ ':id' => $id ]);
            return $stmt->fetch();
        }catch (\PDOException $e) {
            $log->error('An error occurred: ' . $e->getMessage());
            return "please try again latter";
        }
    }

    public function getAllUsers()
    {
        try{
            $pdo = Database::getConnection();
            global $selectAllUser,$log;
            $stmt = $pdo->prepare($selectAllUser);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch (\PDOException $e) {
            global $log;
            $log->error('An error occurred: ' . $e->getMessage());
            return "please try again latter";
        }
    }
}