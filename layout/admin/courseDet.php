<?php include "nav.php";?>
<style>
    .course-detail-container {
        top: 100px;
        right: 43px;
        position: absolute;
        width: 80%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
        overflow: hidden;
    }

    .course-header {
        margin-bottom: 20px;
        border-bottom: 2px solid #eee;
        padding-bottom: 20px;
    }

    .course-title {
        font-size: 2.5em;
        font-weight: bold;
        color: #2b3a42;
        margin: 0;
    }

    .course-description {
        font-size: 1.2em;
        color: #666;
        margin-top: 10px;
    }

    .course-meta {
        margin-bottom: 30px;
        font-size: 1.1em;
        color: #4a4a4a;
    }

    .course-meta p {
        margin: 5px 0;
    }

    .course-meta strong {
        color: #2b3a42;
    }

    .course-content {
        margin-bottom: 40px;
    }

    .course-content h3 {
        font-size: 1.8em;
        color: #2b3a42;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }

    .content-div {
        font-size: 1.1em;
        line-height: 1.6;
        color: #555;
        white-space: pre-wrap;
        word-wrap: break-word;
        margin-top: 15px;
    }

    .course-teacher {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: #4a4a4a;
    }

    .course-teacher h3 {
        font-size: 1.6em;
        color: #2b3a42;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }

    .course-teacher p {
        margin: 5px 0;
    }

    .course-teacher strong {
        color: #2b3a42;
    }

    .course-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-start;
        margin-top: 30px;
    }

    .course-actions .btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        font-size: 1.1em;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-align: center;
        text-decoration: none;
    }

    .course-actions .btn:hover {
        background-color: #45a049;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

</style>
<?php
if(isset($_GET["detelId"])) {
    CoursController::render_Course($_GET["detelId"]);
}
;?>