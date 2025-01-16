<?php
require_once __DIR__."/../src/loger.php";
require_once __DIR__."/../src/Category.php";

class renderHtml 
{

    public static function renderCategory()
    {
        $data = Category::getAllCategories();
        foreach ($data as $item) {
            echo '<option value="' . $item['id'] . '">' . htmlspecialchars($item['name']) . '</option>';
        }
    }
}