<?php      
    require_once "../../controller/CoursController.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oudemy - Learning Platform</title>
    <link href="../assest/style.css" rel="stylesheet">
</head>
<body>
    <nav class="nav-container">
        <div class="nav-content">
            <a href="#" class="nav-brand">
                <img src="logo.png" alt="Oudemy Logo" class="nav-logo">
                <span class="nav-brand-text">oudemy</span>
            </a>
            
            <button class="menu-toggle" id="menuToggle">☰</button>
            
            <ul class="nav-menu" id="navMenu">
                <li><a href="../general/home.php" class="nav-link">Home</a></li>
                <li><a href="../student/my_courses.php" class="nav-link">MY Courses</a></li>
            </ul>
        </div>
    </nav>