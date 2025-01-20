<?php session_start();
if (!isset($_SESSION["userid"])||$_SESSION["role"]!=="Teacher") {
header("location:../general/login.php");
exit();
}else if($_SESSION["status"]=="verification"){
    header("location:../general/Ver.php");
exit();
}
$user_id = $_SESSION["userid"];
require_once __DIR__ . '/../../controller/renderHtml.php';
require_once __DIR__ . '/../../controller/CoursController.php';
require_once __DIR__ . '/../../controller/UserController.php';
require_once __DIR__."/../../src/CourseManager.php";
require_once __DIR__."/../../src/loger.php";
require_once __DIR__ . '/../../controller/tagController.php';
require_once __DIR__ . '/../../controller/CategoryController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0/dist/js/tom-select.complete.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0/dist/css/tom-select.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        /* Navbar Styles */
        .navbar {
            background-color: #333;
            color: white;
            padding: 15px 20px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .navbar .navbar-title {
            font-size: 24px;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            top: 60px;
            bottom: 0;
            left: 0;
            padding-top: 20px;
            transition: 0.3s;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }

        /* Content Styles */
        .content {
            margin-left: 250px;
            margin-top: 60px;
            padding: 20px;
            flex: 1;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <span class="navbar-title">Dashboard</span>
    </div>

    <div class="sidebar">
        <a href="../teacher/teacher_dashboard.php">Dashboard</a>
        <a href="../teacher/manage_courses.php">Create Courses</a>
        <a href="../teacher/courses.php">Courses</a>
    </div>

    <div class="content">

    </div>

</body>
</html>
