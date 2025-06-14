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
  <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
  <title>Appointments</title>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Choose Action</div>
        <div class="nav-btns">
          <a href="/"><div class="back-btn"><img src="/icon/arrow-left.svg" alt=""/></div></a>
          <a href="/logout"><div class="log-out-btn">Log Out</div></a>
        </div>
      </div>
      <hr>
    </div>
    <div class="choice-list">
      <a href="/register-appointment"><div class="list-item"><img src="/icon/calendar-2.svg" alt="">Schedule a Physician Appointment</div></a>
      <a href="/appointments"><div class="list-item"><img src="/icon/calendar-2.svg" alt="">View Scheduled Appointments</div></a>
    </div>
  </div>
</body>
</html>