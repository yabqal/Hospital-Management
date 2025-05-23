<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="../../Public/styles/common.css" />
  <link rel="stylesheet" href="../../Public/styles/register-patient.css" />
  <link rel="stylesheet" href="../../Public/styles/register-doctor.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet"/>
  <title>Register Doctor</title>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Register Doctor</div>
        <div class="nav-btns">
          <div class="back-btn"><img src="../../Public/icons/arrow-left.svg" alt="" /></div>
          <div class="home-btn"><img src="../../Public/icons/home-2.svg" alt="" /></div>
          <div class="log-out-btn">Log Out</div>
        </div>
      </div>
      <hr />
    </div>

    <div class="form-container">
      <form action="/submit-doctor" method="POST">
        <div class="section-title">Basic Details</div>
        <div class="input-group">
          <input class="name-input inp" type="text" placeholder="First Name" name="firstName" required />
          <input class="name-input inp" type="text" placeholder="Last Name" name="lastName" style="margin: 0px 24px;" required />
          <input class="name-input inp" type="text" placeholder="Specialization" name="specialization" required />
        </div>

        <div class="input-group equal-inp">
          <div class="sex-input">
            <select class="inp sex-input" name="sex" required>
            <option value="" disabled selected>Sex</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
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
          <input class="inp date-input" type="date" name="startDate" placeholder="Start Date" required />
          <input class="inp wrkhrs" type="text" name="workingHours" placeholder="Working Hours (e.g. 9AM - 5PM)" required />
        </div>

        <div class="section-title" style="margin-top: 48px;">Additional Info</div>
        <textarea class="inp txt-area" name="description" placeholder="Notes or Description (optional)"></textarea>

        <div style="text-align: right; margin-top: 24px;">
          <button type="submit" class="submit-btn">Register</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
