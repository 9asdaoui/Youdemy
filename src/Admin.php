<?php
require_once __DIR__."/loger.php";
require_once __DIR__."/User.php";
require_once __DIR__."/Database.php";
require_once __DIR__."/Teacher.php";
require_once __DIR__."/Student.php";

class Admin extends User
{
  
    public function updateStatus($id, $status)
    {
    try{
        $pdo = Database::getConnection();
        global $updatUserStatu,$log;
        $stmt = $pdo->prepare('UPDATE Users SET status = :status WHERE id = :id');
        $stmt->execute([ ':status' => $status, ':id' => $id ]);

        global $log;
        $log->info('the status changed successfully');
        
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
            $data=[];
            $pdo = Database::getConnection();
            global $selectAllUser,$log;
            $stmt = $pdo->prepare($selectAllUser);
            $stmt->execute();
            $users = $stmt->fetchAll();
            foreach ($users as $user) {
                if($user['role']=="Student") $data[] = Student::toObject($user); 
                if($user['role']=="Teacher") $data[] = Teacher::toObject($user); 
            }
            return $data;

        }catch (\PDOException $e) {
            global $log;
            $log->error('An error occurred: ' . $e->getMessage());
            return "please try again latter";
        }
    }
}
// $users = new admin;
// print_r($users->getAllUsers());