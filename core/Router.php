<?php
require_once "../controller/AuthController.php";
require_once "../controller/CoursController.php";
require_once "../controller/TagController.php";
require_once "../controller/CategoryController.php";


$url = $_REQUEST['url'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$routes = [
    'register' => [
        'controller' => AuthController::class,
        'method' => 'register',
        'params' => ['username', 'email','password', 'role'],
    ],
    'login' => [
        'controller' => AuthController::class,
        'method' => 'login',
        'params' => ['email', 'password'], 
    ], 
    'addCourse' => [
        'controller' => CoursController::class,
        'method' => 'addCourse',
        'params' => ['title', 'description', 'content', 'teacher_id', 'category_id', 'tag'],
    ],
    'editCourse' => [
        'controller' => CoursController::class,
        'method' => 'editCourse',
        'params' => ['course_id','title', 'description', 'content', 'teacher_id', 'category_id', 'tag'],
    ], 
    'addCategory' => [
        'controller' => CategoryController::class,
        'method' => 'addCategory',
        'params' => ['categoryName'],
    ],
    'addTag' => [
        'controller' => tagController::class,
        'method' => 'addtag',
        'params' => ['tagName'],
    ]
];

if (isset($routes[$url])) {
    $route = $routes[$url];
    $class = $route['controller'];
    $method = $route['method'];
    $Params = $route['params'];

    $object = new $class();

    if (method_exists($object, $method)) {
        $inputs = [];
    
        foreach ($Params as $param) {
            if ($requestMethod === 'POST') {
                $inputs[] = $_POST[$param];
            } elseif ($requestMethod === 'GET') {
                $inputs[] = $_GET[$param];
            }
        }

      call_user_func_array([$object, $method], $inputs);
    } else {
        echo "Method $method does not exist in $class.";
    }
} else {
    echo "Route not found or no URL specified.";
}