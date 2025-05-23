<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="../../Public/styles/register-patient.css" />
  <link rel="stylesheet" href="../../Public/styles/common.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet"/>
  <title>Register Patient</title>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Register Patient</div>
        <div class="nav-btns">
          <div class="back-btn"><img src="../../Public/icons/arrow-left.svg" alt="" /></div>
          <div class="home-btn"><img src="../../Public/icons/home-2.svg" alt="" /></div>
          <div class="log-out-btn">Log Out</div>
        </div>
      </div>
      <hr />
    </div>
    <div class="form-container">
      <form action="/submit-patient" method="POST">
        <div class="section-title">Basic Details</div>
        <div class="input-group">
          <input class="name-input inp" type="text" placeholder="First Name" id="fName" name="fName" required />
          <input class="name-input inp" type="text" placeholder="Father's Name" id="mName" name="mName" style="margin: 0px 24px;" required />
          <input class="name-input inp" type="text" placeholder="Grand Father's Name" id="lName" name="lName" />
        </div>

        <div class="input-group">
          <input class="inp age-input" type="number" min="0" placeholder="Age">
          <input class="inp add-input" type="text" placeholder="Address">
          <input class="inp date-input" type="date" placeholder="Date">
        </div>

        <div class="input-group equal-inp">
          <div class="sex-input">
            <select class="inp" name="sex" required>
            <option value="" disabled selected>Sex</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          </div>
          <input 
            class="inp" 
            type="tel" 
            name="phone" 
            placeholder="Phone Number" 
            pattern="(09|07)[0-9]{8}" 
            title="Phone number must start with 09 or 07 and have 10 digits" 
            style="margin-left: 24px;"
            required />
          <input class="inp" type="email" placeholder="Email (optional)" name="email" style="margin: 0px 24px;" />
          <input class="inp" type="text" placeholder="Hospital Card Number" name="cardNumber" required />
        </div>

        <div class="section-title" style="margin-top: 48px;">Emergency Contact</div>
        <div class="input-group emergency-inp-group">
          <input class="inp" type="text" placeholder="Emergency Contact Name" name="emergencyName" required />
          <input 
            class="inp" 
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
          <input type="file" name="photo" id="photo">
          <button type="submit" class="submit-btn">Register</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
