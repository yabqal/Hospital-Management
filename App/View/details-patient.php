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
          <div class="title">Patient Detail</div>
          <div class="nav-btns">
            <a href="/patients"><div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div></a>
            <a href="/"><div class="home-btn"><img src="/icon/home-2.svg" alt="" /></div></a>
            <a href="/logout"><div class="log-out-btn">Log Out</div></a>
          </div>
        </div>
        <hr />
      </div>

    <div class="patient-info">
        
        <?php
        echo "<img src=/uploads/{$data['photo']} alt='patient image'/>"
        ?>
        
        <div class="details">
           <p>Full Name: <span class="detail"><?php echo $data['fName'] . ' ' . $data['mName'] . ' ' . $data['lName']; ?></span></p>
            <p>Age: <span class="detail"><?php echo $data['age']; ?></span></p>
            <p>Sex: <span class="detail"><?php if($data['sex'] == 0) {echo 'Female';} else{echo 'Male';} ?></span></p>
            <p>Address: <span class="detail"><?php echo $data['address']; ?></span></p>
            <p>Registration Date: <span class="detail"><?php echo $data['date']; ?></span></p>
            <div class="buttons-container">
            <?php
              echo '<a href=""><div class="button assign-physician">'. '<img src="/icon/accessibility-2.svg" />' . ' Assign to Physician ' . '</div></a>' .
              '<a href=""><div class="button assign-room">'. '<img src="/icon/key-2.svg" />' . ' Assign to Room ' . '</div></a>' .
              '<a href="/update-patient.php?id='.$data['id'].'"><div class="button update"><img src="/icon/update.png" /> Update </div></a>' .
              '<a href="/patients/remove?id='.$data['id'].'" onclick="return confirm(\'Are you sure you want to delete this patient?\');">  <div class="button remove"> <img src="/icon/c-delete-2.svg" /> Remove</div></a>';
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