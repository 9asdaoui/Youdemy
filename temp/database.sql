register("9asdaoui","oussy@gmail.com","redaader","Admin")


CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Student', 'Teacher', 'Admin') NOT NULL,
    status ENUM('active', 'suspended', 'verification') NOT NULL,
);

DELIMITER //

CREATE TRIGGER set_default_status BEFORE INSERT ON Users
FOR EACH ROW
BEGIN
    IF NEW.role = 'Teacher' THEN
        SET NEW.status = 'verification';
    ELSE
        SET NEW.status = 'active';
    END IF;
END;

//

DELIMITER ;



CREATE TABLE Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);



CREATE TABLE Tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);



CREATE TABLE Courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    content TEXT,
    teacher_id INT,
    category_id INT,
    FOREIGN KEY (teacher_id) REFERENCES Users(id),
    FOREIGN KEY (category_id) REFERENCES Categories(id)
);




CREATE TABLE CourseTags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    tag_id INT,
    FOREIGN KEY (course_id) REFERENCES Courses(id),
    FOREIGN KEY (tag_id) REFERENCES Tags(id)
);



CREATE TABLE subscribtion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id INT,
    FOREIGN KEY (student_id) REFERENCES Users(id),
    FOREIGN KEY (course_id) REFERENCES Courses(id)
);





-- 1. Insert a New User
-- ====================================================================================================
    INSERT INTO Users (username, email, password, role)                                               
    VALUES ('JohnDoe', 'john.doe@example.com', 'hashed_password', 'Student');                         
-- ====================================================================================================

-- 2. Modify the Status of a User
-- ====================================================================================================
    UPDATE Users
    SET status = 'suspended'
    WHERE id = 1;
-- ====================================================================================================

-- 3. Add a New Course
-- ====================================================================================================
    INSERT INTO Courses (title, description, content, teacher_id, category_id)
    VALUES ('Introduction to Programming', 'Learn the basics of programming.', 'Course content here.', 2, 1);
-- ====================================================================================================

-- 4. Modify a Course
-- ====================================================================================================
    UPDATE Courses
    SET title = 'Updated Course Title',
        description = 'Updated course description.',
        content = 'Updated course content.',
        teacher_id = 3,
        category_id = 2
    WHERE id = 1;
-- ====================================================================================================

-- 5. Delete a Course
-- ====================================================================================================
    DELETE FROM Courses
    WHERE id = 1;
-- ====================================================================================================

-- 6. Add a New Category
-- ====================================================================================================
    INSERT INTO Categories (name)
    VALUES ('New Category');
-- ====================================================================================================

-- 7. Delete a Category
-- ====================================================================================================
    DELETE FROM Categories
    WHERE id = 1;
-- ====================================================================================================

-- 8. Modify a Category
-- ====================================================================================================
    UPDATE Categories
    SET name = 'Updated Category Name'
    WHERE id = 1;
-- ====================================================================================================

-- 9. Add a New Tag
-- ====================================================================================================
    INSERT INTO Tags (name)
    VALUES ('New Tag');
-- ====================================================================================================

-- 10. Delete a Tag
-- ====================================================================================================
    DELETE FROM Tags
    WHERE id = 1;
-- ====================================================================================================

-- 11. Add a New Subscription
-- ====================================================================================================
    INSERT INTO subscribtion (student_id, course_id)
    VALUES (1, 3);
-- ====================================================================================================

-- 12. Delete a Subscription
-- ====================================================================================================
    DELETE FROM subscribtion
    WHERE id = 1;
-- ====================================================================================================