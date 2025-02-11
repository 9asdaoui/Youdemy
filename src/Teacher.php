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

    public static function toObject($data)
    {
        return new Teacher(
            $data['id'] ?? null,
            $data['username'] ?? null,
            $data['email'] ?? null,
            null,
            $data['role'] ?? null,
            $data['status'] ?? null
        );
    }
    public static function getTotalSubscriptionsForTeacher($teacherId)
    {
        try {
            $db = Database::getConnection();

            $query = "
                SELECT COUNT(s.id) AS total_subscriptions
                FROM subscribtion s
                INNER JOIN Courses c ON s.course_id = c.id
                WHERE c.teacher_id = :teacherId
            ";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':teacherId', $teacherId, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_subscriptions'];
        } catch (PDOException $e) {
            return "Error fetching subscriptions: " . $e->getMessage();
        }
    }
}
