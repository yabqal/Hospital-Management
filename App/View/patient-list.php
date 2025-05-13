<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Patients</title>
</head>
<body>
  <h1>All Patients</h1>
  <div id="patient-list">
    <!-- Server-rendered or JS-injected patient data will go here -->
    <!-- Example of how it might look -->
    <!-- 
    <div class="patient">
      <p>Name: John Doe</p>
      <p>Age: 30</p>
      <p>Diagnosis: Flu</p>
    </div>
    -->
  </div>
  <script>
    // Fetch and render data from server (example using fetch)
    fetch('/api/patients')
      .then(res => res.json())
      .then(data => {
        const list = document.getElementById('patient-list');
        data.forEach(patient => {
          const div = document.createElement('div');
          div.className = 'patient';
          div.innerHTML = `
            <p>Name: ${patient.name}</p>
            <p>Age: ${patient.age}</p>
            <p>Diagnosis: ${patient.diagnosis}</p>
          `;
          list.appendChild(div);
        });
      });
  </script>
</body>
</html>
