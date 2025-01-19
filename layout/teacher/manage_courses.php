<?php include "nav.php";
    if(isset($_GET["modifcourseid"])){
        $coursId = $_GET["modifcourseid"];

        $cours =  new courseManager;
        $courseData = $cours->getCourseDetails($coursId);

        $title = $courseData->getTitle();
        $description = $courseData->getDescription();
        $content = $courseData->getContent();
        $teacher_id = $courseData->getTeacherid(); 

        $cat = new Category();
        $catname = $cat->getCategoryDetails($courseData->getCategoryid());

        $category_id = '<option value="'.$courseData->getCategoryid().'">'.$catname["name"].'</option>';
        $tags = $courseData->getTags();
        }
?>
    <style>
        .container {
            max-width: 1143px;
            padding: 78px;

        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .tag-container {
        display: flex;
        flex-wrap: wrap;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px;
        }
        .tag-container .tag {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            margin-right: 5px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        .tag-container .tag .remove-tag {
            margin-left: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
        }
        .tag-container .tag-input {
            border: none;
            outline: none;
            flex-grow: 1;
            padding: 5px;
            font-size: 14px;
        }
    </style>

    <a href="courses.php">
    <button style="
    position: absolute;
    right: 32px;
    bottom: 618px;
    " >back to courses</button> </a>
    <div class="container">
        <h2>Create Course</h2>
        <?php 

            if (isset($_SESSION["error_message"])) {  
                echo "<p style='color: red;' class='error-mess'>". $_SESSION["error_message"]."</p>";
                unset($_SESSION["error_message"]);
            }       
        ?>
        <form action="../../core/Router.php" method="POST">
            <input type="hidden" name="url" value="<?= isset($coursId) ? 'editCourse' : 'addCourse'; ?>">
            <input type="hidden" name="teacher_id" value="<?= $teacher_id ?? $user_id; ?>">
            <input type="hidden" name="course_id" value="<?= $coursId ?? ''; ?>">

            <div class="form-group">
                <label for="title">Course Title</label>
                <input type="text" id="title" name="title" placeholder="Enter course title" value="<?= $title ?? ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Course Description</label>
                <textarea id="description" name="description" placeholder="Enter a brief description" rows="3" required><?= $description ?? ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="content">Course Content</label>
                <textarea id="content" name="content" placeholder="Enter course content"><?= $content ?? ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>

                <select id="category_id" name="category_id" required>
                    <?= $category_id ?? ''; ?>
                    <?php renderHtml::renderCategory(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="input-tags">Tags</label>
                <input id="input-tags" name="tag" autocomplete="off" placeholder="Enter the tags">
            </div>

            <button type="submit"><?= isset($coursId) ? 'Update Course' : 'Create Course'; ?></button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 400,
                tabsize: 2,
                placeholder: 'Write detailed course content here...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help']]
                ]
            });
        });

                new TomSelect("#input-tags", {
                    persist: false,         
                    createOnBlur: true,    
                    create: true,          
                    maxItems: 8,         
                    plugins: ['remove_button'], 

                    options: [
                        <?php
                            
                            if(isset($tags)){
                                foreach($tags as $tag){
                                    echo "{value: '{$tag}', text: '{$tag}'},";
                                }; 
                            }
                        ?>
                    ],
                   
                    items: [
                     <?php    if(isset($tags)){
                             foreach($tags as $tag){ echo "'$tag',"; }
                        }?>
                    ],
                    dropdown: {
                        position: 'below',
                        maxItems: 10         
                    }
                });


    </script>
</body>
</html>