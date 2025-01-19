<?php
session_start();
if (!isset($_SESSION["userid"])||$_SESSION["role"]!=="Student") {
header("location:../general/login.php");
exit();
}
require_once "../../controller/CoursController.php";
require_once "../general/nav.php";

?>
<section class="My_courses">
<?php CoursController::render_MyCourses_page($_SESSION["userid"]) ?>
</section>
<?php  require_once "../general/foot.php";?>