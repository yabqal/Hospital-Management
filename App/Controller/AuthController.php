<?php
class AuthController{

  public function showLogin(){
    View::render('login');
  }

  public function authLogin($requestdata = []){

    $username = $requestdata['username'] ?? '';
    $password = $requestdata['password'] ?? '';

    $conn = new mysqli("localhost", "root", "password", "hospital-mangement");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if($conn->query("SELECT * FROM admins WHERE username = '$username'")->fetch_assoc() == null){
      $error = "User not found!";
      View::render('login', $error);
      exit();
    }
    $users = $conn->query("SELECT * FROM admins WHERE username = '$username'");
    $user = $users->fetch_assoc();

    if ($password == $user["password"]) {
      $_SESSION['user'] = $user['username'];
      header('Location: /');
      exit();
    }
    else {
      $error = "Wrong Password!";
      View::render('login', $error);
    }
  }

  public function logout($requestdata = []){
    session_start();
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 3600, '/');
    header("Location: /login");
    exit();
}
}
?>