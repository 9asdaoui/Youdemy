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
                <li><a href="#" class="nav-link">Home</a></li>
                <li><a href="#" class="nav-link">Courses</a></li>
                <li><a href="#" class="nav-link">About</a></li>
                <li><a href="#" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>

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
            <article class="course-card">
                <h3 class="course-title">Web Development Masterclass</h3>
                <p class="course-description">Master modern web development with HTML, CSS, JavaScript, and popular frameworks.</p>
                <a href="#" class="course-button">Learn More</a>
            </article>

            <article class="course-card">
                <h3 class="course-title">Data Science Fundamentals</h3>
                <p class="course-description">Learn Python, statistics, and machine learning techniques for data analysis.</p>
                <a href="#" class="course-button">Learn More</a>
            </article>

            <article class="course-card">
                <h3 class="course-title">Digital Marketing Essential</h3>
                <p class="course-description">Master SEO, social media marketing, and content strategy for business growth.</p>
                <a href="#" class="course-button">Learn More</a>
            </article>
        </div>
    </section>

    <nav class="pagination-container">
        <ul class="pagination-list">
            <li><a href="#" class="pagination-link">Previous</a></li>
            <li><a href="#" class="pagination-link active">1</a></li>
            <li><a href="#" class="pagination-link">2</a></li>
            <li><a href="#" class="pagination-link">3</a></li>
            <li><a href="#" class="pagination-link">Next</a></li>
        </ul>
    </nav>

    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const navMenu = document.getElementById('navMenu');
        
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });
    </script>
</body>
</html>