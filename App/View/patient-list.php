<?php
// session_start();
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
    <link rel="stylesheet" href="/styles/common.css"/>
    <link rel="stylesheet" href="/styles/register-patient.css"/>
    <link rel="stylesheet" href="/styles/patient-details.css"/>
    <link rel="stylesheet" href="/styles/patient-list.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
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
            <div class="log-out-btn">Log Out</div>
          </div>
        </div>
        <hr />
      </div>
      <div class="choice-list">
        <?php 
        foreach($data as $row){

          if(!isset($row['fName'])) continue;
          
          echo  '<div class="list-item">' .
                  '<a href="patient-details.php?id=' . $row['id'] . '">' .
                  '<p id="pname">' . $row['fName'] . ' ' . $row['mName'] . ' ' . $row['lName'] . '</p>' .
                  '</a>' .
                  '<div class="buttons">'.
                    '<button id="physicianto-' . $row['id'].'">Assign to Physician</button>' .
                    '<button id="roomto-' . $row['id'].'">Assign to Room</button>' .
                    '<button id="remove-' . $row['id'].'">Remove</button>' .
                  '</div>' .
                '</div>';
        }
        ?>
      </div>
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