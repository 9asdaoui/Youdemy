<?php
require_once __DIR__."/../src/loger.php";
require_once __DIR__."/../src/Course.php";
require_once __DIR__."/../src/Category.php";
require_once __DIR__."/../src/Admin.php";
require_once __DIR__."/../src/CourseManager.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class CoursController
{
    public function addCourse($title, $description, $content, $teacher_id, $category_id, $tags)
    {
        $tagsArray = explode(',', $tags);
        $course = new Course($id = null,$title, $description, $content, $teacher_id, $category_id, $tagsArray);
        $addCourse = new CourseManager;
        $message = $addCourse->addCourse($course);
        if($message=="Course successfully added."){
            header("location:../layout/admin/courses.php");
        }else{
            $_SESSION["error_message"] = $message;
            header("location:../layout/admin/manage_courses.php");
        }
    }
    public static function render_Courses()
    {
        $courses = CourseManager::getAllCourses();

        $html = '<div class="course-cards-container">';
    
        foreach ($courses as $course) {

            $cat = new Category();
            $catname = $cat->getCategoryDetails($course->getCategoryid());


            $tags = implode(' ', $course->getTags()); 

            $html .= "
                <div class='course-card'>
                    <h3>{$course->getTitle()}</h3>
                    <p><strong>Category:</strong> {$catname['name']}</p>
                    <p><strong>Description:</strong> {$course->getDescription()}</p>
                    <p><strong>Tags:</strong>{$tags}</p>
                    <a href='courseDet.php?detelId={$course->getId()}'><button class='btn btn-primary'>View Course</button></a>
                </div>
            ";
        }
    
        $html .= '</div>';
    
        echo $html;
    }
    public static function render_Course($id)
    {
        $class = new CourseManager();
        $course = $class->getCourseDetails($id);
    
        $html = '<div class="course-detail-container">';
    
        $cat = new Category();
        $catname = $cat->getCategoryDetails($course->getCategoryid());
    
        $tags = implode(', ', $course->getTags());
    
        $html .= "
            <div class='course-header'>
                <h2 class='course-title'>{$course->getTitle()}</h2>
                <p class='course-description'>{$course->getDescription()}</p>
            </div>
        ";
    
        $html .= "
            <div class='course-meta'>
                <p><strong>Category:</strong> {$catname['name']}</p>
                <p><strong>Tags:</strong> {$tags}</p>
            </div>
        ";
    
        $html .= "
            <div class='course-content'>
                <h3>Course Content</h3>
                <div class='content_div'>{$course->getContent()}</div>
            </div>
        ";
    
        $user = new Admin();
        $teacherDetails = $user->getUserById($course->getTeacherid());
    
        $html .= "
            <div class='course-teacher'>
                <h3>Instructor</h3>
                <p><strong>Name:</strong> {$teacherDetails['username']}</p>
                <p><strong>Email:</strong> {$teacherDetails['email']}</p>
            </div>
        ";
    
        $html .= "
            <div class='course-actions'>
                <a href='manage_courses.php?modifcourseid={$course->getId()}'><button class='btn btn-primary'>modife Course</button></a>
                <a href='courses.php?deletcourseid={$course->getId()}'><button class='btn btn-primary'>delet Course</button></a>
            </div>
        ";
    
        $html .= '</div>';
    
        echo $html;
    }

}