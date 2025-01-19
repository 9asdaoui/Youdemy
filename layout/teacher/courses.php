<?php
    include "nav.php";
    if(isset($_GET['deletcourseid'])){
        $delet = new CoursController;
        $delet->delet_Course($_GET['deletcourseid']);
        $message = $_SESSION["message"];
    }
?>
<style>
    .course-cards-container {
        right: 0px;
        background-color: cadetblue;
        top: 66px;
        height: 100%;
        position: absolute;
        width: 1286px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        padding-top: 91px;
        padding-right: 45px;
        padding-left: 45px;
    }

    .course-card {
        background-color: #f8f9fa; 
        border-radius: 12px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        color: #333; 
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 350px;
    }

    .course-card h3 {
        font-size: 20px;
        font-weight: bold;
        color: #2c3e50; 
        margin-bottom: 10px;
    }

    .course-card p {
        font-size: 14px;
        color: #7f8c8d;
        margin-bottom: 8px;
    }

    .course-card .tags {
        font-size: 14px;
        color: #16a085;
        margin-bottom: 15px;
    }

    .course-card button {
        background-color: #3498db;
        border: none;
        border-radius: 6px;
        padding: 12px;
        font-size: 14px;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .course-card button:focus,
    .course-card button:active {
        outline: none;
    }

    .course-card button:hover {
        background-color: #2980b9;
    }
    .add-course-btn {
        position: absolute;
        right: 72px;
        top: 92px;
        z-index: 1;
        padding: 10px 20px;
        background-color: #232323;
        color: #ffffff;
        border: solid black;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
    }

    .add-course-btn:focus {
        outline: none;
    }
    .message {
        z-index: 1;
        position: absolute;
        border: solid;
        border-radius: 14px;
        left: 247px;
        padding: 7px;
        background-color: aquamarine;
        color: green;
        font-size: 21px;
        top: 100px;
    }

</style>
<a href="manage_courses.php">
    <button class="add-course-btn">ADD New Course</button>
</a>

<?php
    if (isset($_SESSION["message"])) {  
        echo "<p class='message'>". $_SESSION["message"]."</p>";
        unset($_SESSION["message"]);
    } 
?>


<?php CoursController::render_Courses_teacher($user_id);?>