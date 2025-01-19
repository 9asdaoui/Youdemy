<?php 
session_start();
if (!isset($_SESSION["userid"])||$_SESSION["role"]!=="Admin") {
header("location:../general/login.php");
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
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0/dist/js/tom-select.complete.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0/dist/css/tom-select.css" rel="stylesheet">

</head>
<body>
<style>
        body {
    background-color: #f4f4f4;
    }
    .sidebar {
        margin-top: 61px;
        height: 100vh;
        color: white;
        padding: 15px;
        position: fixed;
        width: 197px;
    }
    .sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        font-size: 18px;
        margin: 18px 4px;
    }
    .sidebar a.active {
        font-weight: bold;
    }
    .main-content {
        padding-top: 105px;
        margin-left: 189px;
        padding-right: 30px;
        padding-left: 30px;
    }
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .error {
        color: red;
        font-size: 20px;
    }
    .main-content-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px 24px;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .main-content-nav .succes {
        font-size: 1.2rem;
        color: #4CAF50; 
        margin: 0;
        font-weight: bold;
    }

    .main-content-nav button {
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .main-content-nav button:hover {
        background-color: #0056b3;
    }
    .statubtnact{
        text-decoration: none;
        color: #4bde97;
        background-color: rgba(75, 222, 151, 0.1); 
        border: none;
        border-radius: 5px;
        font-size: 1.4rem;
        cursor: pointer;
        padding: 5px;

        
    }
    .statubtndis{
        text-decoration: none;
        color: #f26464;
        background-color: rgba(245, 91, 93, 0.1); 
        border: none;
        border-radius: 5px;
        font-size: 1.4rem;
        cursor: pointer;
        padding: 5px;
    }
    .badge-active {
        color: #5887ff;
        background-color: rgba(88, 135, 255, 0.1);
        }

        .badge-pending {
        color: #ffb648;
        background-color: rgba(255, 172, 50, 0.1);
        }

        .badge-disabled {
        color: white;
        background-color: #ffb648;
        }

        .badge-trashed {
        color: #f26464;
        background-color: rgba(245, 91, 93, 0.1);
        }

        .badge-success {
        color: #4bde97;
        background-color: rgba(75, 222, 151, 0.1);
        }
    
</style>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="position: fixed;width: 100%;z-index: 2;">
            <a class="navbar-brand ps-3" href="index.php">    <h3 class="text-center">Admin Dashboard</h3></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
              <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../log_in.php?logout=1">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="sidebar navbar-dark bg-dark">
            <a href="admin_dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="manage_teachers.php"><i class="fas fa-chalkboard-teacher"></i> Teachers</a>
            <a href="manage_users.php"><i class="fas fa-user-graduate"></i> Students</a>
            <a href="courses.php"><i class="fas fa-book"></i> Courses</a>
            <a href="category_tages.php"><i class="fas fa-tags"></i> Category & Tags</a>
            <a href="#settings"><i class="fas fa-cogs"></i> Settings</a>
        </div>
