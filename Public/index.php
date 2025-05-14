<?php

require_once __DIR__ . '/../Abstract/View.php';
require_once __DIR__ . '/../App/Model/Appointment.php';
require_once __DIR__ . '/../App/Model/Doctor.php';
require_once __DIR__ . '/../App/Model/Patient.php';
require_once __DIR__ . '/../App/Model/Room.php';
require_once __DIR__ . '/../App/Controller/HomeController.php';
require_once __DIR__ . '/../App/Controller/DoctorController.php';

if(!isset($_POST['id']) || !isset($_POST['name'])){
    $_POST['id'] = '0';
    $_POST['name'] = '0';
}

$requestPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$routes = [
    '/'                                 => ['controller' => 'HomeController', 'action' => 'index'],

    '/login'                            => ['controller' => 'AuthController', 'action' => 'showLogin'],
    '/signup'                           => ['controller' => 'AuthController', 'action' => 'showSignup'],

    '/register-doctor'                  => ['controller' => 'DoctorController', 'action' => 'showDocReg'],
    '/submit-doctor'                    => ['controller' => 'DoctorController', 'action' => 'recDoc'],
    '/doctors'                          => ['controller' => 'DoctorController', 'action' => 'listDoc'],
    "/doctors/{$_POST['id']}"           => ['controller' => 'DoctorController', 'action' => 'docByID'],
    "/doctors/{$_POST['id']}"           => ['controller' => 'DoctorController', 'action' => 'availableDoc'],
    "/doctors/{$_POST['name']}"         => ['controller' => 'DoctorController', 'action' => 'docByName'],
    "/doctors/{$_POST['id']}"           => ['controller' => 'DoctorController', 'action' => 'delDoc'],

    '/register-patient'                 => ['controller' => 'PatientController', 'action' => 'showPatReg'],
    '/submit-patient'                   => ['controller' => 'PatientController', 'action' => 'recPat'],
    '/patients'                         => ['controller' => 'PatientController', 'action' => 'listPat'],
    "/patients/{$_POST['id']}"          => ['controller' => 'PatientController', 'action' => 'patByID'],
    "/patients/{$_POST['name']}"        => ['controller' => 'PatientController', 'action' => 'patByName'],
    "/patients/{$_POST['id']}"          => ['controller' => 'PatientController', 'action' => 'delPat'],

    '/rooms'                            => ['controller' => 'RoomController', 'action' => 'listRoom'],
    "/rooms/{$_POST['id']}"             => ['controller' => 'RoomController', 'action' => 'delRoom'],
    
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