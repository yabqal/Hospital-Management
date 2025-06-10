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
    <title>Patient List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
    <link rel="stylesheet" href="/styles/common.css"/>
    <link rel="stylesheet" href="/styles/patient-list.css"/>
</head>
<body>
  <div class="page-container">
      <div class="top-bar">
        <div class="title-button">
          <div class="title">Patient List</div>
          <div class="search-wrapper">
            <input type="search" name="searchpatient" placeholder="Search">
          </div>
          <div class="nav-btns">
            <a href="/details-choice"><div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div></a>
            <a href="/"><div class="home-btn"><img src="/icon/home-2.svg" alt="" /></div></a>
            <a href="/logout"><div class="log-out-btn">Log Out</div></a>
          </div>
        </div>
        <hr />
      </div>

      <?php 
      foreach($data as $row){
        if(!isset($row['fName'])) continue;
        $requestD = "id=" . $row['id'] . "&fName=" . $row['fName'] . "&mName=" . $row['mName'] . "&lName=" . $row['lName'] . "&doctor=1";
        echo '<div class="choice-list">' .
             '<div class="list-item">' .
             '<a href="/doctor?id=' . $row['id'] . '">' .
              $row['fName'] . ' ' . $row['lName'] .
              '</a>' .
             '<div class="buttons-container">' .
             '<a href=/register-appointment?"'.$requestD.'"><div class="button assign-physician">'. '<img src="/icon/accessibility-2.svg" />' . ' Assign to Patient ' . '</div></a>' .
             '<a href="/doctors/remove?id='.$row['id'].'"><div class="button remove">'. '<img src="/icon/c-delete-2.svg" />' . ' Remove ' . '</div></a>' .
             '</div>' .
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
            const patientname = patient.querySelector("p").textContent.toLowerCase();
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