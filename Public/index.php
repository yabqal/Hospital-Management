<?php

require_once __DIR__ . '/../Abstract/View.php';
require_once __DIR__ . '/../App/Model/Appointment.php';
require_once __DIR__ . '/../App/Model/Doctor.php';
require_once __DIR__ . '/../App/Model/Patient.php';
require_once __DIR__ . '/../App/Model/Room.php';
require_once __DIR__ . '/../App/Controller/HomeController.php';


$requestPath = trim(parse_url($_SERVER['REQUEST_ URI'], PHP_URL_PATH));
$routes = [
    '/'          => ['controller' => 'HomeController', 'action' => 'index'],
    '/login'     => ['controller' => 'AuthController', 'action' => 'showLogin'],
    '/signup'    => ['controller' => 'AuthController', 'action' => 'showSignup'],
];

$requestData = array_merge($_GET, $_POST);

if(isset($routes[$requestPath])){
    if(isset($routes[$requestPath]['controller'])){

        $controllerName = $routes[$requestPath]['controller'];
        $actionName = $routes[$requestPath]['action'];

        $controller = new $controllerName();
        $controller->$actionName($requestData);
    }
    else{
        $controllerName = $routes[$requestPath][$_SERVER['REQUEST_METHOD']]['controller'];
        $actionName = $routes[$requestPath][$_SERVER['REQUEST_METHOD']]['action'];

        $controller = new $controllerName();
        $controller->$actionName($requestData);
    }
}
else{
    View::render("errors/404");
}

?>