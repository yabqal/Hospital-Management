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
  <link rel="stylesheet" href="/styles/common.css" />
  <link rel="stylesheet" href="/styles/register-patient.css" />
  <link rel="stylesheet" href="/styles/register-doctor.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
  <title>Register Doctor</title>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Register Doctor</div>
        <div class="nav-btns">
          <a href="/register-choice"><div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div></a>
          <a href="/"><div class="home-btn"><img src="/icon/home-2.svg" alt="" /></div></a>
          <a href="/logout"><div class="log-out-btn">Log Out</div></a>
        </div>
      </div>
      <hr />
    </div>

    <div class="form-container">
      <form action="/submit-doctor" method="POST" enctype="multipart/form-data">
        <div class="section-title">Basic Details</div>
        <div class="input-group">
          <input class="name-input inp" type="text" placeholder="First Name" name="fName" required />
          <input class="name-input inp" type="text" placeholder="Last Name" name="lName" style="margin: 0px 24px;" required />
          <input class="name-input inp" type="text" placeholder="Specialization" name="specialization" required />
        </div>

        <div class="input-group equal-inp">
          <div class="sex-input">
            <select class="inp sex-input" name="sex" required>
            <option value="" disabled selected>Sex</option>
            <option value="1">Male</option>
            <option value="0">Female</option>
          </select>
          </div>
          <input class="inp" type="number" min="22" max="100" placeholder="Age" name="age" required />
          <input 
            class="inp" 
            type="tel" 
            name="phone" 
            placeholder="Phone Number" 
            pattern="(09|07)[0-9]{8}" 
            title="Must start with 09 or 07 and have 10 digits" 
            required />
        </div>

        <div class="input-group equal-inp">
          <input class="inp email-input" type="email" name="email" placeholder="Email (optional)" />
          <input class="inp" type="text" name="license" placeholder="Medical License Number" required />
          <input class="inp add-input" type="text" name="address" placeholder="Address" required />
        </div>

        <div class="input-group">
          <input id="startDate" class="inp date-input" type="date" name="startDate" placeholder="Start Date" required />
          <!-- make sure the format/pattern is followed? -->
          <input class="inp wrkhrs" type="text" name="workingHours" placeholder="Working Hours (e.g. 9AM - 5PM)" required />
        </div>

        <div class="section-title" style="margin-top: 48px;">Additional Info</div>
        <textarea class="inp txt-area" name="description" placeholder="Notes or Description (optional)"></textarea>

        <div class="photo-and-btn">
          <div></div>
          <button type="submit" class="submit-btn">Register</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Set the minimum date for startDate input to today
    const startDateInput = document.getElementById('startDate');
    const today = new Date().toISOString().split('T')[0];
    startDateInput.setAttribute('min', today);
  </script>
</body>
</html>
