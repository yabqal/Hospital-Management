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
    <div class="patient-info">
        <img src="" alt="patient image"/>
        <div class="details">
            <p>Full Name: <span>Yousef Tilahun Yimer</span></p>
            <p>Age: <span>20</span></p>
            <p>Address: <span>Weltey, Oromia</span></p>
            <p>Registration Date: <span>April 6, 2025</span></p>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dignissim, tortor nec imperdiet posuere, sem elit tempus urna, et porta libero massa vitae urna. Mauris suscipit hendrerit porta. Curabitur bibendum pharetra tortor a ultrices. Maecenas consequat vehicula risus, in congue lectus. Cras interdum felis est, nec efficitur neque tempor sed. Maecenas erat nibh, dictum sed felis quis, egestas convallis orci. Quisque tempus nisi et ultrices mattis. Nam mattis massa non diam consequat, sit amet commodo nisl placerat. Curabitur diam sapien, hendrerit ac nisi in, dictum laoreet tortor.</p>
            </div>
        </div>
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