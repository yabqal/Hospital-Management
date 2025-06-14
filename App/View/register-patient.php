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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="/styles/register-patient.css" />
  <link rel="stylesheet" href="/styles/common.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
  <title>Register Patient</title>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Register Patient</div>
        <div class="nav-btns">
          <a href="/register-choice"><div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div></a>
          <a href="/"><div class="home-btn"><img src="/icon/home-2.svg" alt="" /></div></a>
          <a href="/logout"><div class="log-out-btn">Log Out</div></a>
        </div>
      </div>
      <hr />
    </div>
    <div class="form-container">
      <form action="/submit-patient" method="POST" enctype="multipart/form-data" id="patientForm">
        <div class="section-title">Basic Details</div>
        <div class="input-group">
          <input class="name-input inp" type="text" placeholder="First Name" id="fName" name="fName" required />
          <input class="name-input inp" type="text" placeholder="Father's Name" id="mName" name="mName" style="margin: 0px 24px;" required />
          <input class="name-input inp" type="text" placeholder="Grand Father's Name" id="lName" name="lName" />
        </div>

        <div class="input-group">
          <input class="inp age-input" type="number" min="0" placeholder="Age" name="age">
          <input class="inp add-input" type="text" placeholder="Address" name="address">
          <input class="inp date-input" title="Registration Date" type="date" placeholder="Date" name="date" id="regDate" />
        </div>

        <div class="input-group equal-inp">
          <div class="sex-input">
            <select class="inp" name="sex" required>
            <option value="" disabled selected>Sex</option>
            <option value="1">Male</option>
            <option value="0">Female</option>
          </select>
          </div>
          <input 
            class="inp"
            id="phoneno" 
            type="tel" 
            name="phone" 
            placeholder="Phone Number" 
            pattern="(09|07)[0-9]{8}" 
            title="Phone number must start with 09 or 07 and have 10 digits" 
            style="margin-left: 24px;"
            required />
          <input class="inp" type="email" placeholder="Email (optional)" id="email" name="email" style="margin: 0px 24px;" />
          <input class="inp" type="text" placeholder="Hospital Card Number" name="cardNumber" required />
        </div>

        <div class="section-title" style="margin-top: 48px;">Emergency Contact</div>
        <div class="input-group emergency-inp-group">
          <input class="inp" type="text" placeholder="Emergency Contact Name" name="emergencyName" required />
          <input 
            class="inp"
            id="emgtel" 
            type="tel" 
            name="emergencyPhone" 
            placeholder="Emergency Phone" 
            pattern="(09|07)[0-9]{8}" 
            title="Phone number must start with 09 or 07 and have 10 digits"
            style="margin: 0px 24px;" 
            required />
          <input class="inp" type="text" placeholder="Relationship" name="emergencyRelation" required />
        </div>

        <div class="section-title" style="margin-top: 48px;">Additional Details</div>
        <textarea class="inp txt-area" name="description" id="description" placeholder="Description"></textarea>
        <div class="photo-and-btn">
          <div>
            <label style="margin-right: 12px;" for="photo">Patient Image: </label>
            <input type="file" name="photo" id="photo">
          </div>
          <button type="submit" class="submit-btn">Register</button>
        </div>
      </form>
    </div>
  </div>

<script>
  // Set minimum date of registration date input to today to prevent past dates
  document.addEventListener('DOMContentLoaded', () => {
    const regDateInput = document.getElementById('regDate');
    const today = new Date().toISOString().split('T')[0];
    regDateInput.setAttribute('min', today);

    // Optional: Prevent form submission if date is in the past (extra safety)
    document.getElementById('patientForm').addEventListener('submit', (e) => {
      if (regDateInput.value) {
        if (regDateInput.value < today) {
          alert('Registration date cannot be in the past.');
          e.preventDefault();
        }
      }
    });
  });
</script>
</body>
</html>
