<?php
// session_start();
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
  <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
  <title>Update Patient</title>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Update Patient</div>
        <div class="nav-btns">
          <a href="/"><div class="home-btn"><img src="/icons/home-2.svg" alt="" /></div></a>
          <a href="/logout"><div class="log-out-btn">Log Out</div></a>
        </div>
      </div>
      <hr />
    </div>
    <div class="form-container">
      <form action="/patient/updateP" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <div class="section-title">Basic Details</div>
        <div class="input-group">
          <input class="name-input inp" type="text" name="fName" value="<?php echo $data['fName']; ?>" required />
          <input class="name-input inp" type="text" name="mName" value="<?php echo $data['mName']; ?>" style="margin: 0px 24px;" required />
          <input class="name-input inp" type="text" name="lName" value="<?php echo $data['lName']; ?>" />
        </div>

        <div class="input-group">
          <input class="inp age-input" type="number" min="0" name="age" value="<?php echo $data['age']; ?>">
          <input class="inp add-input" type="text" name="address" value="<?php echo $data['address']; ?>">
          <input class="inp date-input" type="date" name="date" value="<?php echo $data['date']; ?>">
        </div>

        <div class="input-group equal-inp">
          <select class="inp" name="sex" required>
            <option value="" disabled>Sex</option>
            <option value="1" <?php if ($data['sex'] == '1') echo 'selected'; ?>>Male</option>
            <option value="0" <?php if ($data['sex'] == '0') echo 'selected'; ?>>Female</option>
          </select>
          <input class="inp" type="tel" name="phone" value="<?php echo $data['phone']; ?>" style="margin-left: 24px;" required />
          <input class="inp" type="email" name="email" value="<?php echo $data['email']; ?>" style="margin: 0px 24px;" />
          <input class="inp" type="text" name="cardNumber" value="<?php echo $data['cardNumber']; ?>" required />
        </div>

        <div class="section-title" style="margin-top: 48px;">Emergency Contact</div>
        <div class="input-group emergency-inp-group">
          <input class="inp" type="text" name="emergencyName" value="<?php echo $data['emergencyName']; ?>" required />
          <input class="inp" type="tel" name="emergencyPhone" value="<?php echo $data['emergencyPhone']; ?>" style="margin: 0px 24px;" required />
          <input class="inp" type="text" name="emergencyRelation" value="<?php echo $data['emergencyRelation']; ?>" required />
        </div>

        <div class="section-title" style="margin-top: 48px;">Additional Details</div>
        <textarea class="inp txt-area" name="description"><?php echo $data['description']; ?></textarea>

        <div class="photo-and-btn">
          <div></div>
          <input type="submit" class="submit-btn" value="Save Changes">
        </div>
      </form>
    </div>
  </div>
</body>
</html>