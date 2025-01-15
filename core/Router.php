<?php
require_once "../controller/AuthController.php";

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
    // 'addproduct' => [
    //     'controller' => ProductController::class,
    //     'method' => 'addproduct',
    //     'params' => ['name', 'description','price', 'quantity','category','image'],
    // ],
    // 'Delet' => [
    //     'controller' => ProductController::class,
    //     'method' => 'deleteProduct',
    //     'params' => ['id'],
    // ],
    // 'Edit' => [
    //     'controller' => ProductController::class,
    //     'method' => 'updateProduct',
    //     'params' => ['Edite-id','name', 'description','price', 'quantity','category','image'],
    // ]
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