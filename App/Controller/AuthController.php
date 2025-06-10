<?php
class AuthController{

  public function showLogin(){
    View::render('login');
  }

  public function authLogin($requestdata = []){

    $username = $requestdata['username'] ?? '';
    $password = $requestdata['password'] ?? '';

    try {
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      $conn = new mysqli("localhost", "root", "", "hospital-mangement");
    }
    catch (mysqli_sql_exception $e) {
      $error = 'Could not connect to the database';
      header("Location: /error?error=" . urlencode($error));
      exit();
    }

    // if ($conn->connect_error) {
    //   die("Connection failed: " . $conn->connect_error);
    // }
    try {
      $result = $conn->query("SELECT * FROM admins WHERE username = '$username'")->fetch_assoc();
    }
    catch (mysqli_sql_exception $e) {
      $error = 'Could not access the database';
      header("Location: /error?error=" . urlencode($error));
      exit();
    }

    //maybe use header
    if($result == null){
      $error = "User not found!";
      View::render('login', $error);
      exit();
    }

    try {
      $users = $conn->query("SELECT * FROM admins WHERE username = '$username'");
    }
    catch(mysqli_sql_exception $e){
      $error = 'Could not access the database';
      header("Location: /error?error=" . urlencode($error));
      exit();
    }

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