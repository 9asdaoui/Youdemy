<?php
session_start();
if (!isset($_SESSION["userid"])||$_SESSION["role"]!=="Student") {
header("location:../general/login.php");
exit();
}else if($_SESSION["status"]=="suspended"){
    header("location:../general/sespend.php");
exit();
}
require_once "../../controller/CoursController.php";
require_once "../general/nav.php"; 


$courseId = isset($_GET['detelId']) ? $_GET['detelId'] : null;
?>

<section class="course-detail-container">
    <?php
        if ($courseId) {
            CoursController::render_CourseStud($courseId);
        } else {
            echo "<p class='error'>Course not found!</p>";
        }
    ?>
</section>
<?php  require_once "../general/foot.php";?>