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
require_once __DIR__ . '/../App/Controller/AppointmentController.php';
require_once __DIR__ . '/../App/Controller/RoomController.php';

//?????????????? ig its here cuz we access the id and name in the paths???
// if(!isset($_POST['id']) || !isset($_POST['name'])){
//     $_POST['id'] = '0';
//     $_POST['name'] = '0';
// }

//fix sex, doesnt get recorded correctly, current format $data[sex] = "male" or "female"

// Update patient information(handle photos), room information
//for room update we might need some additional things depending on whether or not we decide to add new table or not

//show update page for all

//add (single)room details
// how is doctor availability handled?
$requestPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

session_start();

$routes = [
    '/'                                 => ['controller' => 'HomeController', 'action' => 'index'], //tested
    '/register-choice'                  => ['controller' => 'HomeController', 'action' => 'register'], //tested
    '/details-choice'                   => ['controller' => 'HomeController', 'action' => 'details'], //tested


    '/login'                            => ['controller' => 'AuthController', 'action' => 'showLogin'],
    '/login-auth'                       => ['controller' => 'AuthController', 'action' => 'authLogin'],
    '/signup'                           => ['controller' => 'AuthController', 'action' => 'showSignup'],
    '/logout'                           => ['controller' => 'AuthController', 'action' => 'logout'],


    '/register-doctor'                  => ['controller' => 'DoctorController', 'action' => 'showDocReg'], // tested
    '/submit-doctor'                    => ['controller' => 'DoctorController', 'action' => 'recDoc'], // tested
    '/doctors'                          => ['controller' => 'DoctorController', 'action' => 'listDoc'], // tested
    //"/doctors/{$_POST['id']}"           => ['controller' => 'DoctorController', 'action' => 'docByID'],
    "/doctors/available"                => ['controller' => 'DoctorController', 'action' => 'availableDoc'],
    //"/doctors/{$_POST['name']}"         => ['controller' => 'DoctorController', 'action' => 'docByName'],
    "/doctors/remove"                   => ['controller' => 'DoctorController', 'action' => 'delDoc'], // tested
    "/doctors/assign-room"              => ['controller' => 'DoctorController', 'action' => 'assignRoomDoc'],
    "/doctor"                           => ['controller' => 'DoctorController', 'action' => 'detailDoc'],
    //for the action not the update page
    '/doctor/update'                    => ['controller' => 'DoctorController', 'action' => 'updateDoc'],


    '/register-patient'                 => ['controller' => 'PatientController', 'action' => 'showPatReg'], // tested
    '/submit-patient'                   => ['file' => ['controller' => 'PatientController', 'action' => 'recPat']], // tested
    '/patients'                         => ['controller' => 'PatientController', 'action' => 'listPat'], // tested
    '/patient'                          => ['controller' => 'PatientController', 'action' => 'detailPat'], // tested

    //why would they search by id??? Also why are we using post instead of get???
    //"/patients/{$_POST['id']}"          => ['controller' => 'PatientController', 'action' => 'patByID'],
    //"/patients/{$_POST['name']}"        => ['controller' => 'PatientController', 'action' => 'patByName'],

    "/patients/remove"                  => ['controller' => 'PatientController', 'action' => 'delPat'], //tested
    "/patients/assign-room"             => ['controller' => 'PatientController', 'action' => 'assignRoomPat'],
    'patient/update'                    => ['controller' => 'PatientController', 'action' => 'updatePat'],


    //avaiable rooms, add take and leave room and related things???
    '/register-room'                    => ['controller' => 'RoomController', 'action' => 'showRoomReg'],
    '/submit-room'                      => ['controller' => 'RoomController', 'action' => 'recRoom'],
    '/rooms'                            => ['controller' => 'RoomController', 'action' => 'listRoom'],
    '/rooms/remove'                     => ['controller' => 'RoomController', 'action' => 'delRoom'],
    '/rooms/occupy'                     => ['controller' => 'RoomController', 'action' => 'occupyRoom'],
    '/rooms/free'                       => ['controller' => 'RoomController', 'action' => 'freeRoom'],
    //"/rooms/{$_POST['id']}"             => ['controller' => 'RoomController', 'action' => 'delRoom'],
    '/room/update'                      => ['controller' => 'RoomController', 'action' => 'updateRoom'],


    '/register-appointment'             => ['controller' => 'AppointmentController', 'action' => 'showAppReg'],
    '/submit-appointment'               => ['controller' => 'AppointmentController', 'action' => 'recApp'],
    '/appointments'                     => ['controller' => 'AppointmentController', 'action' => 'listApp'],
    '/appointments/remove'              => ['controller' => 'AppointmentController', 'action' => 'delApp'],
    '/appointment'                      => ['controller' => 'AppointmentController', 'action' => 'detailApp'],
    '/appointment/update'               => ['controller' => 'AppointmentController', 'action' => 'updateApp'],
    
];

// Do something cleaner next time?
// if($_POST['id'] == 0)
// unset($_POST['id']);

//print_r($_POST);
//if (!isset($_SESSION['user']) && $requestPath != "/login") { header("Location: /login"); exit();}

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