<?php
require_once __DIR__."/loger.php";
require_once __DIR__."/Database.php";
require_once __DIR__."/User.php";

class Student extends User
{
    private $coursInscrits = [];

    public function __construct($id = null, $username = null, $email = null, $password = null, $role = null, $status = null, $coursInscrits = [])
    {
        parent::__construct($id, $username, $email, $password, $role, $status);
        $this->coursInscrits = $coursInscrits;
    } 

    public function subscribtion($courseId)
    {
        try {
            $db = Database::getConnection();

            $query = "SELECT * FROM subscribtion WHERE student_id = :student_id AND course_id = :course_id";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'student_id' => $this->id,
                'course_id' => $courseId,
            ]);

            if ($stmt->rowCount() > 0) {
                return "Already enrolled in course ID: $courseId.";
            }

            $query = "INSERT INTO subscribtion (student_id, course_id) VALUES (:student_id, :course_id)";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'student_id' => $this->id,
                'course_id' => $courseId,
            ]);

            $this->coursInscrits[] = $courseId;

            return "Successfully enrolled in course ID: $courseId.";
        } catch (PDOException $e) {
            return "Error enrolling in course: " . $e->getMessage();
        }
    }

    public function myCourses()
    {
        try {
            $db = Database::getConnection();

            $query = "
                SELECT c.title, c.description
                FROM subscribtion s
                JOIN Courses c ON s.course_id = c.id
                WHERE s.student_id = :student_id
            ";
            $stmt = $db->prepare($query);
            $stmt->execute(['student_id' => $this->id]);

            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($courses)) {
                return "You are not enrolled in any courses yet.";
            }

            $result = "Enrolled Courses:\n";
            foreach ($courses as $course) {
                $result .= "- " . $course['title'] . ": " . $course['description'] . "\n";
            }

            return nl2br($result);
        } catch (PDOException $e) {
            return "Error fetching enrolled courses: " . $e->getMessage();
        }
    }

}
