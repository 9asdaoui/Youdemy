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


if(isset($_GET["addtoMyCoursesID"])){
    $userID = $_SESSION["userid"];
    $CoursID = $_GET["addtoMyCoursesID"];
    CoursController::addSub($CoursID,$userID);
}
?>
<section class="course-grid">
<?php CoursController::render_MyCourses_page($_SESSION["userid"]) ?>
</section>
<?php  require_once "../general/foot.php";?>