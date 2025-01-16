<?php
require_once __DIR__."/loger.php";
require_once __DIR__."/Database.php";
require_once __DIR__."/Course.php";


class CourseManager
{
    public function addCourse(Course $course)
    {
        try {
            $db = Database::getConnection();

            $query = "
                INSERT INTO Courses (title, description, content, teacher_id, category_id)
                VALUES (:title, :description, :content, :teacher_id, :category_id)
            ";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'title' => $course->getTitle(),
                'description' => $course->getDescription(),
                'content' => $course->getContent(),
                'teacher_id' => $course->getTeacherId(),
                'category_id' => $course->getCategoryId(),
            ]);

            $course->setId($db->lastInsertId());
            $this->assignTags($course);
            global $log;
            $log->info('new course with the id "'.$course->getid().'"added');
            return "Course successfully added.";

        } catch (PDOException $e) {
            global $log;
            $log->error('Error adding course: ' . $e->getMessage());
            return "Error adding course please try again";
        }
    }

    private function assignTags(Course $course)
    {
        try {
            $db = Database::getConnection();

            if (!empty($course->getTags())) {
                foreach ($course->getTags() as $tag) {
                    $query = "SELECT id FROM Tags WHERE name = :tag_name";
                    $stmt = $db->prepare($query);
                    $stmt->execute(['tag_name' => $tag]);
                    $tagId = $stmt->fetchColumn();

                    if (!$tagId) {
                        $query = "INSERT INTO Tags (name) VALUES (:name)";
                        $stmt = $db->prepare($query);
                        $stmt->execute(['name' => $tag]);
                        $tagId = $db->lastInsertId();
                    }

                    $query = "INSERT INTO CourseTags (course_id, tag_id) VALUES (:course_id, :tag_id)";
                    $stmt = $db->prepare($query);
                    $stmt->execute(['course_id' => $course->getId(), 'tag_id' => $tagId]);
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Error assigning tags to course: " . $e->getMessage());
        }
    }

    public function updateCourse(Course $course)
    {
        try {
            $db = Database::getConnection();

            $query = "
                UPDATE Courses
                SET title = :title, description = :description, content = :content, teacher_id = :teacher_id, category_id = :category_id
                WHERE id = :id
            ";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'title' => $course->getTitle(),
                'description' => $course->getDescription(),
                'content' => $course->getContent(),
                'teacher_id' => $course->getTeacherId(),
                'category_id' => $course->getCategoryId(),
                'id' => $course->getId(),
            ]);

            $this->updateTags($course);

            return "Course successfully updated.";
        } catch (PDOException $e) {
            return "Error updating course: " . $e->getMessage();
        }
    }

    private function updateTags(Course $course)
    {
        try {
            $db = Database::getConnection();

            $query = "DELETE FROM CourseTags WHERE course_id = :course_id";
            $stmt = $db->prepare($query);
            $stmt->execute(['course_id' => $course->getId()]);

            $this->assignTags($course);
        } catch (PDOException $e) {
            throw new Exception("Error updating tags: " . $e->getMessage());
        }
    }

    public function deleteCourse(Course $course)
    {
        try {
            $db = Database::getConnection();

            $query = "DELETE FROM CourseTags WHERE course_id = :course_id";
            $stmt = $db->prepare($query);
            $stmt->execute(['course_id' => $course->getId()]);

            $query = "DELETE FROM Courses WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute(['id' => $course->getId()]);

            return "Course successfully deleted.";
        } catch (PDOException $e) {
            return "Error deleting course: " . $e->getMessage();
        }
    }

    public function getCourseDetails($courseId)
    {
        try {
            $db = Database::getConnection();

            $query = "
                SELECT c.*, t.name AS tag_name, cat.name AS category_name
                FROM Courses c
                LEFT JOIN CourseTags ct ON c.id = ct.course_id
                LEFT JOIN Tags t ON ct.tag_id = t.id
                LEFT JOIN Categories cat ON c.category_id = cat.id
                WHERE c.id = :id
            ";
            $stmt = $db->prepare($query);
            $stmt->execute(['id' => $courseId]);

            $courseData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($courseData) {
                $course = new Course(
                    $courseData[0]['id'],
                    $courseData[0]['title'],
                    $courseData[0]['description'],
                    $courseData[0]['content'],
                    $courseData[0]['teacher_id'],
                    $courseData[0]['category_id'],
                    array_column($courseData, 'tag_name')
                );
                return $course;
            } else {
                return "Course not found.";
            }
        } catch (PDOException $e) {
            return "Error fetching course details: " . $e->getMessage();
        }
    }
    public static function getAllCourses()
    {
        try {
            $db = Database::getConnection();

            $query = "
                SELECT c.*, t.name AS tag_name, cat.name AS category_name
                FROM Courses c
                LEFT JOIN CourseTags ct ON c.id = ct.course_id
                LEFT JOIN Tags t ON ct.tag_id = t.id
                LEFT JOIN Categories cat ON c.category_id = cat.id
            ";
            $stmt = $db->query($query);

            $coursesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $courses = [];

            $groupedCourses = [];
            foreach ($coursesData as $row) {
                $courseId = $row['id'];
                if (!isset($groupedCourses[$courseId])) {
                    $groupedCourses[$courseId] = [
                        'id' => $row['id'],
                        'title' => $row['title'],
                        'description' => $row['description'],
                        'content' => $row['content'],
                        'teacher_id' => $row['teacher_id'],
                        'category_id' => $row['category_id'],
                        'tags' => []
                    ];
                }
                $groupedCourses[$courseId]['tags'][] = $row['tag_name'];
            }

            foreach ($groupedCourses as $courseData) {
                $courses[] = new Course(
                    $courseData['id'],
                    $courseData['title'],
                    $courseData['description'],
                    $courseData['content'],
                    $courseData['teacher_id'],
                    $courseData['category_id'],
                    $courseData['tags']
                );
            }

            return $courses;
        } catch (PDOException $e) {
            return "Error fetching courses: " . $e->getMessage();
        }
    }

}