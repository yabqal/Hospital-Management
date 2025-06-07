<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient details</title>
    <link rel="stylesheet" href="/styles/common.css"/>
    <link rel="stylesheet" href="/styles/register-patient.css"/>
    <link rel="stylesheet" href="/styles/patient-details.css"/>
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
        </div>
      </div>
      <hr />
    </div>
    <div class="patient-info">
        
        <?php
        echo "<img src=/uploads/{$data['photo']} alt='patient image'/>"
        ?>
        
        <div class="details">
            <?php
              echo "<p>Full Name: <span>{$data['fName']} {$data['mName']} {$data['lName']}</span></p>" .
              "<p>Age: <span>{$data['age']}</span></p>".
              "<p>Address: <span>{$data['address']}</span></p>"; 
            ?>
            
            
            <!-- do we need this bruh ??? -->
            <p>Registration Date: <span>April 6, 2025</span></p>

            <!-- add this to the php part if you see fit -->
            <div class="actions">
                <button id="physician">Assign to Physician</button>
                <button id="room">Assign to Room</button>
                <button id="remove">Remove</button>
            </div>
        </div>
    </div>
    <div class="medication-details">
        <div class="description">
            <p>Description: </p>
            <div class="description-text">
                
                <p>
                  <?php 
                  echo $data['description'];
                  ?>
                </p>
            </div>
        </div>

        <!-- patients didnt have that in the registration page??? -->
        <div class="prev-meds">
            <p>Previous Medications: </p>
            <div class="med-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dignissim, tortor nec imperdiet posuere, sem elit tempus urna, et porta libero massa vitae urna. Mauris suscipit hendrerit porta.</p>
            </div>
        </div>
    </div>
  </div>
</body>
</html>