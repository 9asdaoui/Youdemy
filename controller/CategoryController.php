<?php
require_once __DIR__."/../src/loger.php";
require_once __DIR__."/../src/Category.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class CategoryController
{
    
    public function addCategory($Category)
    {   
        $addCategory = new Category($id = null, $Category);
        $message = $addCategory->addCategory();
        $_SESSION["message"] = $message;
        header("location: " . "../layout/admin/category_tages.php"); 
    }
    public function deletCat($id)
    {
        $addCategory = new Category($id , $name = null);
        $message = $addCategory->deleteCategory();
        $_SESSION["message"] = $message;
        header("location: " . "../layout/admin/category_tages.php"); 
    }

}