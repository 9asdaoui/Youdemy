<?php
require_once __DIR__."/loger.php";

class Course
{
    private $id;
    private $title;
    private $description;
    private $content;
    private $teacher_id;
    private $category_id;
    private $tags = [];

    public function __construct($id = null, $title = null, $description = null, $content = null, $teacher_id = null, $category_id = null, $tags = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->teacher_id = $teacher_id;
        $this->category_id = $category_id;
        $this->tags = $tags;
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }

    public function getContent() { return $this->content; }
    public function setContent($content) { $this->content = $content; }

    public function getTeacherId() { return $this->teacher_id; }
    public function setTeacherId($teacher_id) { $this->teacher_id = $teacher_id; }

    public function getCategoryId() { return $this->category_id; }
    public function setCategoryId($category_id) { $this->category_id = $category_id; }

    public function getTags() { return $this->tags; }
    public function setTags($tags) { $this->tags = $tags; }
}

