<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient List</title>
    <link rel="stylesheet" href="../../Public/styles/common.css"/>
    <link rel="stylesheet" href="../../Public/styles/register-patient.css"/>
    <link rel="stylesheet" href="../../Public/styles/patient-details.css"/>
    <link rel="stylesheet" href="../../Public/styles/patient-list.css"/>
</head>
<body>
  <div class="page-container">
    <div class="top-bar">
      <div class="title-button">
          <div class="title">Patient List</div>
          <div class="search-wrapper">
            <input type="search" name="searchpatient" placeholder="Search">
          </div>
            <div class="nav-btns">
              <div class="back-btn"><img src="../../Public/icons/arrow-left.svg" alt="" /></div>
              <div class="home-btn"><img src="../../Public/icons/home-2.svg" alt="" /></div>
              <div class="log-out-btn">Log Out</div>
            </div>
          </div>
        <hr />
      </div>
      <div class="choice-list">
        <div class="list-item">
            <p>Abebe</p>
            <div class="buttons">
              <button id="physician">Assign to Physician</button>
              <button id="room">Assign to Room</button>
              <button id="remove">Remove</button>
            </div>
        </div>
        <div class="list-item">
            <p>Kebede</p>
            <div class="buttons">
              <button id="physician">Assign to Physician</button>
              <button id="room">Assign to Room</button>
              <button id="remove">Remove</button>
            </div>
        </div>
        <div class="list-item">
            <p>Ayele</p>
            <div class="buttons">
              <button id="physician">Assign to Physician</button>
              <button id="room">Assign to Room</button>
              <button id="remove">Remove</button>
            </div>
        </div>
        <div class="list-item">
            <p>Chala</p>
            <div class="buttons">
              <button id="physician">Assign to Physician</button>
              <button id="room">Assign to Room</button>
              <button id="remove">Remove</button>
            </div>
        </div>
      </div>
    </div>
    <script>
        const searchinp = document.querySelector('input[name="searchpatient"]');
        const patientlist = document.querySelectorAll(".list-item");

        searchinp.addEventListener("input", function () {
          const searchword = this.value.trim().toLowerCase();
          patientlist.forEach(patient => {
            const patientname = patient.querySelector("p").textContent.toLowerCase();
            if(!patientname.includes(searchword)){
              patient.style.display = "none";
            }else{
              patient.style.display = "";
            }
          })
      });
    </script>
</body>
</html>