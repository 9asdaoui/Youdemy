<?php require_once "../general/nav.php" ?>
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Unlock Your Learning Potential</h1>
            <p class="hero-description">Join millions of learners worldwide and master new skills with our expert-led courses</p>
        </div>
    </section>

    <section class="search-section">
        <div class="search-wrapper">
            <form method="GET" >
                <input type="text" class="search-input" name="search" placeholder="What do you want to learn today?">
                <button class="search-button">Search Courses</button>       
            </form>

        </div>
    </section>

    <section class="courses-section">

        <h2 class="section-title">Featured Courses</h2>

        
        <div class="course-grid">
<?php      

if(isset($_GET["search"])){

    isset($_GET["page"]) ? $number = $_GET["page"]*3 : $number = 0;
    CoursController::Search(3,$number,$_GET["search"]);

}else{
    isset($_GET["page"]) ? $number = $_GET["page"]*3 : $number = 0;
    CoursController::render_Courses_page(3,$number);
}

  
?>

        </div>


    </section>

    <nav class="pagination-container">
        <ul class="pagination-list">
            <?php
                        $coursesCountes = count(CourseManager::getAllCourses());
                        $numeOffpages = ceil($coursesCountes/3);
                        for($i = 0; $i<$numeOffpages; $i++){
                            echo '<li><a href="?page='.$i.'" class="pagination-link">'.$i.'</a></li>';

                        }
            ?>
        </ul>
    </nav>
<?php  require_once "../general/foot.php";?>