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
  <link rel="stylesheet" href="/styles/rooms.css">
  <link rel="stylesheet" href="/styles/register-patient.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
  <title>Home</title>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
        <div class="title-button">
          <div class="title">Rooms</div>
          <div class="nav-btns">
<<<<<<< HEAD
            <a href="/"><div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div></a>
            <div class="log-out-btn">Log Out</div>
=======
            <a href="/"><div class="back-btn"><img src="/icons/arrow-left.svg" alt="" /></div></a>
            <a href="/logout"><div class="log-out-btn">Log Out</div></a>
>>>>>>> fb09b9b71550db2fed47c176693058dcaf5997d6
          </div>
        </div>
        <hr />
      </div>
    <h2>Available Rooms</h2>
    <!-- Just an example -->
    <div class="available-rooms">
      <?php 
      foreach($data as $row){
        if(!isset($row['id'])) continue;
        
        if ($row['taken'] == FALSE){
          echo '<div class="room-card">' . 
              '<div class="num-room">' .
             '<div class="room-text">ROOM</div>' . 
             '<div class="number">' . $row['id'] . '</div>' .
             '</div>' . 
             '<form action="/rooms/occupy" method="POST">' .
             '<input class="inp" style="width: 140px; margin-bottom: 8px; box-sizing: border-box; background-color:rgba(81, 81, 81, 0.25);" type="number" name="pid" placeholder="Patient ID">' .
             '<input type="hidden" name="rid" value="' . $row['id'] . '">' .
             '<button style="width: 140px; display: flex; justify-content: center; border-radius: 12px;" type="submit">Occupy</button>' .
             '</form>' .
             '</div>';
        }
      }
      ?>
    </div>
    <h2>Occupied Rooms</h2>
    <!-- Just an example -->
    <div class="occupied-rooms">
      <?php 
      foreach($data as $row){
        if(!isset($row['id'])) continue;
        if ($row['taken'] == TRUE){
          echo '<div class="room-card">' . 
             '<div class="num-room">' .
             '<div class="room-text">ROOM</div>' . 
             '<div class="number">' . $row['id'] . '</div>' .
             '</div>' .
             '<div style="margin-bottom: 16px;"><span style="color: #afafaf"> Occupied By: </span> <b>' . $row['patientId'] . '</b></div>' .
             '<a href="/rooms/free?rid='.$row['id'].'"><button style="width: 140px; display: flex; justify-content: center; border-radius: 12px;" type="submit">Free</button></a>' .
             '</div>';
        }
      }
      ?>
    </div>
  </div>
</body>
</html>