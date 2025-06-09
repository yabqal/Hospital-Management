<?php
  //session_start(); 
  if (!isset($_SESSION['user']) && $requestPath != '/login') { 
    header("Location: /login");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/common.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="/icons/face-recognition-2.svg">
  <title>Home</title>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Welcome, Choose Action</div>
        <a href="/logout"><div class="log-out-btn">Log Out</div></a>
      </div>
      <hr>
    </div>
    <div class="choice-list">
      <a href="/register-choice"><div class="list-item"><img src="/icons/profile-2.svg" alt="">Register patients and physicians</div></a>
      <a href="/details-choice"><div class="list-item"><img src="/icons/paragraph.svg" alt="">Details of patients and physicians</div></a>
      <a href="/"><div class="list-item"><img src="/icons/check-2.svg" alt="">Available Physicians</div></a>
      <a href="/"><div class="list-item"><img src="/icons/calendar-2.svg" alt="">Schedule a physician meeting</div></a>
      <a href="/rooms"><div class="list-item"><img src="/icons/key-2.svg" alt="">View Rooms</div></a>
    </div>
  </div>
</body>
</html>