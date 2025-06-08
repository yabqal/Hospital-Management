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
      header('Location: /');
      exit();
    }
    else {
      $error = "Wrong Password!";
      View::render('login', $error);
    }
  }
}
?>