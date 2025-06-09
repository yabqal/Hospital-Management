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
    <link rel="icon" type="image/png" href="/icons/face-recognition-2.svg">
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Patient Details</div>
        <div class="nav-btns">
          <div class="back-btn"><img src="/icons/arrow-left.svg" alt="" /></div>
          <div class="home-btn"><img src="/icons/home-2.svg" alt="" /></div>
          <div class="leave-btn"><img src="/icons/leave-3 1.png" alt=""></div>
          <div class="back-btn"><img src="/icons/arrow-left.svg" alt="" /></div>
          <div class="home-btn"><img src="/icons/home-2.svg" alt="" /></div>
          <div class="leave-btn"><img src="/icons/leave-3 1.png" alt=""></div>
        </div>
      </div>
      <hr />
    </div>
    <?php
    # to connect the db 
      if (isset($_GET['id'])) {
          $patientId = $_GET['id'];

          $stmt = $conn->prepare("SELECT * FROM patients WHERE id = ?");
          $stmt->bind_param("i", $patientId);
          $stmt->execute();
          $result = $stmt->get_result();
          $patient = $result->fetch_assoc();

          if (!$patient) {
            echo "<p>Patient not found.</p>";
            exit;
          }
      }else{
          echo "<p>No patient ID specified.</p>";
          exit;
      }
    ?>
    <div class="patient-info">
        
        <?php
        echo "<img src=/uploads/{$data['photo']} alt='patient image'/>"
        ?>
        
        <div class="details">
            <p>Full Name: <span><?php echo $patient['fName'] . ' ' . $patient['mName'] . ' ' . $patient['lName']; ?></span></p>
            <p>Age: <span><?php echo $patient['age']; ?></span></p>
            <p>Address: <span><?php echo $patient['address']; ?></span></p>
            <p>Registration Date: <span><?php echo $patient['regDate']; ?></span></p>
            <div class="actions">
                <button id="physicianto-<?php echo $patientId; ?>">Assign to Physician</button>
                <button id="roomto-<?php echo $patientId; ?>">Assign to Room</button>
                <button id="remove-<?php echo $patientId; ?>">Remove</button>
            </div>
        </div>
    </div>
    <div class="medication-details">
        <div class="description">
            <p>Description: </p>
            <div class="description-text">
                <p><?php echo $patient['description']; ?></p>
            </div>
        </div>

        <!-- patients didnt have that in the registration page??? -->
        <div class="prev-meds">
            <p>Previous Medications: </p>
            <div class="med-text">
                <p><?php echo $patient['prevMeds']; ?></p>
            </div>
        </div>
    </div>
  </div>
</body>
</html>