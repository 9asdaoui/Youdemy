<?php
require_once __DIR__."/../src/loger.php";
require_once __DIR__."/../src/tages.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class tagController
{
    
    public function addtag($tag)
    {   
        $addTag = new tag($id = null,$tag);
        $message = $addTag->addtag();
        $_SESSION["message"] = $message;
        header("location: " . "../layout/admin/category_tages.php");    
    }
    public function deletTag($id)
    {
        $addTag = new tag($id , $name = null);
        $message = $addTag->deletetag();
        $_SESSION["message"] = $message;
        header("location: " . "../layout/admin/category_tages.php");    

    }

}