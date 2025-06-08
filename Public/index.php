<?php

require_once __DIR__ . '/../Abstract/View.php';
require_once __DIR__ . '/../App/Model/Appointment.php';
require_once __DIR__ . '/../App/Model/Doctor.php';
require_once __DIR__ . '/../App/Model/Patient.php';
require_once __DIR__ . '/../App/Model/Room.php';
require_once __DIR__ . '/../App/Controller/HomeController.php';
require_once __DIR__ . '/../App/Controller/DoctorController.php';
require_once __DIR__ . '/../App/Controller/PatientController.php';
require_once __DIR__ . '/../App/Controller/AuthController.php';

//?????????????? ig its here cuz we access the id and name in the paths???
// if(!isset($_POST['id']) || !isset($_POST['name'])){
//     $_POST['id'] = '0';
//     $_POST['name'] = '0';
// }

//fix sex, doesnt get recorded correctly

// Update patient information, room information doctor information,
//add (single)patient details, same for the others
$requestPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if($requestPath == '/register-choice'){
    View::render("register-choice");
    exit;
}
if($requestPath == '/details-choice'){
    View::render("details-choice");
    exit;
}
if($requestPath == '/patient-list'){
    View::render("patient-list");
    exit;
}

$routes = [
    '/'                                 => ['controller' => 'HomeController', 'action' => 'index'],


    '/login'                            => ['controller' => 'AuthController', 'action' => 'showLogin'],
    '/login-auth'                       => ['controller' => 'AuthController', 'action' => 'authLogin'],
    '/signup'                           => ['controller' => 'AuthController', 'action' => 'showSignup'],


    '/register-doctor'                  => ['controller' => 'DoctorController', 'action' => 'showDocReg'], // tested
    '/submit-doctor'                    => ['controller' => 'DoctorController', 'action' => 'recDoc'], // tested
    '/doctors'                          => ['controller' => 'DoctorController', 'action' => 'listDoc'], // tested
    //"/doctors/{$_POST['id']}"           => ['controller' => 'DoctorController', 'action' => 'docByID'],
    "/doctors/available"                => ['controller' => 'DoctorController', 'action' => 'availableDoc'],
    //"/doctors/{$_POST['name']}"         => ['controller' => 'DoctorController', 'action' => 'docByName'],
    "/doctors/remove"                   => ['controller' => 'DoctorController', 'action' => 'delDoc'], // tested
    "/doctors/assign-room"              => ['controller' => 'DoctorController', 'action' => 'assignRoomDoc'],


    '/register-patient'                 => ['controller' => 'PatientController', 'action' => 'showPatReg'], // tested
    '/submit-patient'                   => ['file' => ['controller' => 'PatientController', 'action' => 'recPat']], // tested
    '/patients'                         => ['controller' => 'PatientController', 'action' => 'listPat'], // tested
    '/patient'                          => ['controller' => 'PatientController', 'action' => 'detailPat'], // tested

    //why would they search by id??? Also why are we using post instead of get???
    //"/patients/{$_POST['id']}"          => ['controller' => 'PatientController', 'action' => 'patByID'],
    //"/patients/{$_POST['name']}"        => ['controller' => 'PatientController', 'action' => 'patByName'],

    "/patients/remove"                  => ['controller' => 'PatientController', 'action' => 'delPat'], //tested
    "/patients/assign-room"             => ['controller' => 'PatientController', 'action' => 'assignRoomPat'],


    //add register and submit room? and avaiable rooms and delete room
    '/rooms'                            => ['controller' => 'RoomController', 'action' => 'listRoom'],
    //"/rooms/{$_POST['id']}"             => ['controller' => 'RoomController', 'action' => 'delRoom'],


    //add delete appointment?
    '/register-appointment'             => ['controller' => 'AppointmentController', 'action' => 'showAppReg'],
    '/submit-appointment'               => ['controller' => 'AppointmentController', 'action' => 'recApp'],
    '/appointments'                     => ['controller' => 'AppointmentController', 'action' => 'listApp'],
    
];

// Do something cleaner next time?
// if($_POST['id'] == 0)
// unset($_POST['id']);

//print_r($_POST);

$requestData = array_merge($_GET, $_POST);

if(isset($routes[$requestPath])){
    if(isset($routes[$requestPath]['controller'])){
        $controllerName = $routes[$requestPath]['controller'];
        $actionName = $routes[$requestPath]['action'];

        $controller = new $controllerName();
        $controller->$actionName($requestData);
    }
    else if(isset($routes[$requestPath]['file']['controller'])){

        $controllerName = $routes[$requestPath]['file']['controller'];
        $actionName = $routes[$requestPath]['file']['action'];

        $controller = new $controllerName();
        $controller->$actionName($requestData, $_FILES);
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