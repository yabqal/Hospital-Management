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
    <title>Patient details</title>
    <link rel="stylesheet" href="/styles/common.css"/>
    <link rel="stylesheet" href="/styles/register-patient.css"/>
    <link rel="stylesheet" href="/styles/patient-details.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Patient Details</div>
        <div class="nav-btns">
          <div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div>
          <div class="home-btn"><img src="/icon/home-2.svg" alt="" /></div>
          <div class="leave-btn"><img src="/icon/leave-3 1.png" alt=""></div>
          <div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div>
          <div class="home-btn"><img src="/icon/home-2.svg" alt="" /></div>
          <div class="leave-btn"><img src="/icon/leave-3 1.png" alt=""></div>
        </div>
      </div>
      <hr />
    </div>

    <div class="patient-info">
        
        <?php
        echo "<img src=/uploads/{$data['photo']} alt='patient image'/>"
        ?>
        
        <div class="details">
            <p>Full Name: <span><?php echo $data['fName'] . ' ' . $data['mName'] . ' ' . $data['lName']; ?></span></p>
            <p>Age: <span><?php echo $data['age']; ?></span></p>
            <p>Address: <span><?php echo $data['address']; ?></span></p>
            <p>Registration Date: <span><?php echo $data['regDate']; ?></span></p>
            <div class="actions">
                <button id="physicianto-<?php echo $data['id']; ?>">Assign to Physician</button>
                <button id="roomto-<?php echo $data['id']; ?>">Assign to Room</button>
                <button id="remove-<?php echo $data['id']; ?>">Remove</button>
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

        <!-- patients didnt have that in the registration page??? -->
        <div class="prev-meds">
            <p>Previous Medications: </p>
            <div class="med-text">
                <p><?php echo $data['prevMeds']; ?></p>
            </div>
        </div>
    </div>
  </div>
</body>
</html>