<?php
require_once __DIR__."/User.php";

class Teacher extends User
{
    public static function getTeacherById($id)
    {
        try {
            $db = Database::getConnection();

            $query = "SELECT * FROM Users WHERE id = :id AND role = 'Teacher'";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $teacherData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($teacherData) {
                return new Teacher(
                    $teacherData['id'],
                    $teacherData['username'],
                    $teacherData['email'],
                    $teacherData['password'],
                    $teacherData['role'],
                    $teacherData['status']
                );
            } else {
                return null;
            }
        } catch (PDOException $e) {
            throw new Exception("Error fetching teacher: " . $e->getMessage());
        }
    }
}