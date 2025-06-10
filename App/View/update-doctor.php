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
  <link rel="stylesheet" href="/styles/common.css" />
  <link rel="stylesheet" href="/styles/register-doctor.css"/>
  <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
  <title>Update Doctor</title>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
        <div class="title">Update Doctor</div>
        <div class="nav-btns">
          <a href="/"><div class="home-btn"><img src="/icons/home-2.svg" alt="" /></div></a>
          <a href="/logout"><div class="log-out-btn">Log Out</div></a>
        </div>
      </div>
      <hr />
    </div>

    <div class="form-container">
      <form action="/update-doctor-save.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
        <div class="section-title">Basic Details</div>
        <div class="input-group">
          <input class="inp" type="text" name="fName" value="<?php echo $data['fName']; ?>" required />
          <input class="inp" type="text" name="lName" value="<?php echo $data['lName']; ?>" style="margin: 0px 24px;" required />
          <input class="inp" type="text" name="specialization" value="<?php echo $data['specialization']; ?>" required />
        </div>

        <div class="input-group equal-inp">
          <select class="inp sex-input" name="sex" required>
            <option value="" disabled>Sex</option>
            <option value="1" <?php if ($data['sex'] == '1') echo 'selected'; ?>>Male</option>
            <option value="0" <?php if ($data['sex'] == '0') echo 'selected'; ?>>Female</option>
          </select>
          <input class="inp" type="number" name="age" value="<?php echo $data['age']; ?>" required />
          <input class="inp" type="tel" name="phone" value="<?php echo $data['phone']; ?>" required />
        </div>

        <div class="input-group equal-inp">
          <input class="inp" type="email" name="email" value="<?php echo $data['email']; ?>" />
          <input class="inp" type="text" name="license" value="<?php echo $data['license']; ?>" required />
          <input class="inp" type="text" name="address" value="<?php echo $data['address']; ?>" required />
        </div>

        <div class="input-group">
          <input class="inp" type="date" name="startDate" value="<?php echo $data['startDate']; ?>" required />
          <input class="inp" type="text" name="workingHours" value="<?php echo $data['workingHours']; ?>" required />
        </div>

        <div class="section-title" style="margin-top: 48px;">Additional Info</div>
        <textarea class="inp txt-area" name="description"><?php echo $data['description']; ?></textarea>

        <div class="photo-and-btn">
          <div></div>
          <button type="submit" class="submit-btn">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>