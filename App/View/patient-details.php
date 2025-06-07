<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient details</title>
    <link rel="stylesheet" href="../../Public/styles/common.css"/>
    <link rel="stylesheet" href="../../Public/styles/register-patient.css"/>
    <link rel="stylesheet" href="../../Public/styles/patient-details.css"/>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Patient Details</div>
        <div class="nav-btns">
          <div class="back-btn"><img src="../../Public/icons/arrow-left.svg" alt="" /></div>
          <div class="home-btn"><img src="../../Public/icons/home-2.svg" alt="" /></div>
          <div class="leave-btn"><img src="../../Public/icons/leave-3 1.png" alt=""></div>
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
        <img src="" alt="patient image"/>
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