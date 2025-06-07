<!--send_data_to_serve-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add New Patient</title>
</head>
<body>
  <h1>Add New Patient</h1>
  <form action="/api/patients" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required /><br/>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required /><br/>

    <label for="diagnosis">Diagnosis:</label>
    <input type="text" id="diagnosis" name="diagnosis" required /><br/>

    <input type="submit" name="submit" value="Submit"/>
  </form>
</body>
</html>
