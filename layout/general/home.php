<?php require_once "../general/nav.php" ?>
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Unlock Your Learning Potential</h1>
            <p class="hero-description">Join millions of learners worldwide and master new skills with our expert-led courses</p>
        </div>
    </section>

    <section class="search-section">
        <div class="search-wrapper">
            <input type="text" class="search-input" placeholder="What do you want to learn today?">
            <button class="search-button">Search Courses</button>
        </div>
    </section>

    <section class="courses-section">

        <h2 class="section-title">Featured Courses</h2>

        
        <div class="course-grid">
  <?php      CoursController::render_Courses_page(); ?>

        </div>


    </section>

    <nav class="pagination-container">
        <ul class="pagination-list">
            <li><a href="?-" class="pagination-link">Previous</a></li>
            <li><a href="?1" class="pagination-link active">1</a></li>
            <li><a href="?2" class="pagination-link">2</a></li>
            <li><a href="?3" class="pagination-link">3</a></li>
            <li><a href="?+" class="pagination-link">Next</a></li>
        </ul>
    </nav>
<?php  require_once "../general/foot.php";?>