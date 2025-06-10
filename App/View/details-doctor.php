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
    <title>Physician details</title>
    <link rel="stylesheet" href="/styles/common.css"/>
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
          <div class="title">Physician Detail</div>
          <div class="nav-btns">
            <a href="/doctors"><div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div></a>
            <a href="/"><div class="home-btn"><img src="/icon/home-2.svg" alt="" /></div></a>
            <a href="/logout"><div class="log-out-btn">Log Out</div></a>
          </div>
        </div>
        <hr />
      </div>

    <div class="patient-info">
      <div class="details">
        <p>Full Name: <span class="detail"><?php echo $data['fName'] . ' ' . $data['lName']; ?></span></p>
        <p>Age: <span class="detail"><?php echo $data['age']; ?></span></p>
        <p>Specialization: <span class="detail"><?php echo $data['specialization']; ?></span></p>
        <p>Phone: <span class="detail"><?php echo $data['phone']; ?></span></p>
        <p>Address: <span class="detail"><?php echo $data['address']; ?></span></p>
        <p>Working Hours: <span class="detail"><?php echo $data['workingHours']; ?></span></p>
        <div class="buttons-container">
          <?php
            $requestD = "id=" . $data['id'] . "&fName=" . $data['fName'] . "&lName=" . $data['lName'] . "&doctor=1";
            $requestDD = http_build_query($data);
            echo '<a href="/register-appointment?'.$requestD.'"><div class="button assign-physician">'. '<img src="/icon/accessibility-2.svg" />' . ' Assign to Patient ' . '</div></a>' .
            '<a href="/doctor/update?' . $requestDD . '"><div class="button update"><img src="/icon/edit-2.svg" /> Update </div></a>' .
            '<a href="/doctors/remove?id='.$data['id'].'"><div class="button remove">'. '<img src="/icon/c-delete-2.svg" />' . ' Remove ' . '</div></a>'
          ?>
        </div>
      </div>
    </div>
    <div class="medication-details">
        <div class="description">
            <p>Description: </p>
            <div class="description-text">
                <p><?php echo $data['description']; ?></p>
            </div>
        </div>
    </div>
  </div>
</body>
</html>