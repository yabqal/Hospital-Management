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
    <title>Appointments</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
    <link rel="stylesheet" href="/styles/common.css"/>
    <link rel="stylesheet" href="/styles/patient-list.css"/>
    <link rel="stylesheet" href="/styles/list-appointment.css"/>
</head>
<body>
  <div class="page-container">
      <div class="top-bar">
        <div class="title-button">
          <div class="title">Appointments</div>
          <div class="search-wrapper">
            <input type="search" name="searchpatient" placeholder="Search">
          </div>
          <div class="nav-btns">
            <a href="/schedule-choice"><div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div></a>
            <a href="/"><div class="home-btn"><img src="/icon/home-2.svg" alt="" /></div></a>
            <a href="/logout"><div class="log-out-btn">Log Out</div></a>
          </div>
        </div>
        <hr />
      </div>

      <div class="choice-list list-title">
        <div class="list-item">
          <div id="pname"><span class="data-item">Physician</span><span class="divider-item"> Assigned to </span><span class="data-item">Patient</span><span class="divider-item"> On </span><span class="data-item">Date</span></div>
        </div>
      </div>
      <?php 
      foreach($data as $row){
        if(!isset($row['id'])) continue;
        echo '<div class="choice-list">' .
             '<div class="list-item">'.  
             '<a href="">' .
                  '<div id="pname">' . '<span class="data-item">' . $row['doctorName'] . '</span>' . '<span class="divider-item"> Assigned to </span>' . '<span class="data-item">' . $row['patientName'] . '</span>' . '<span class="divider-item"> On </span>' . '<span class="data-item">' . $row['date'] . '</span>' . '</div>' .
              '</a>' .
             '</div>' .
             '</div>' ;
      }
      ?>      
    </div>
    <script>
        const searchinp = document.querySelector('input[name="searchpatient"]');
        const patientlist = document.querySelectorAll(".list-item");

        searchinp.addEventListener("input", function () {
          const searchword = this.value.trim().toLowerCase();
          patientlist.forEach(patient => {
            const patientname = patient.querySelector("div").textContent.toLowerCase();
            if(!patientname.includes(searchword)){
              patient.style.display = "none";
            }else{
              patient.style.display = "";
            }
          })
      });
    </script>
</body>
</html>