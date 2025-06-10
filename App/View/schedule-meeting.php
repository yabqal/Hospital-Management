<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Physician Meeting</title>
    <link rel="stylesheet" href="/styles/common.css" />
    <link rel="stylesheet" href="/styles/register-patient.css" />
    <link rel="stylesheet" href="/styles/patient-details.css" />
    <link rel="stylesheet" href="/styles/schedule-meetings.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/icon/face-recognition-2.svg">
</head>

<body>
    <div class="page-container">
        <div class="top-bar">
            <div class="title-button">
                <div class="title">Schedule Patient Meeting</div>
                <div class="nav-btns">
                    <div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div>
                    <div class="home-btn"><img src="/icon/home-2.svg" alt="" /></div>
                    <div class="leave-btn"><img src="/icon/leave-3 1.png" alt=""></div>
                </div>
            </div>
            <hr />
        </div>

        <div class="container">
            <div class="patients-list">
                <div class="patients">
                    <div class="patient-titlebar">
                        <span id="title">Patients </span>
                        <input type="search" name="patient-search" id="search-patient" placeholder="Search patient">
                    </div>
                    <div class="pat-scroll">
                        <?php 
                            foreach($data['patients'] as $row){
                                if(!isset($row['fName'])) continue;
                                echo'<div class="list">'.
                                    $row['fName'] . ' ' . $row['mName'] . ' ' . $row['lName'] .
                                    '</div>';
                            }
                        ?>
                    </div>
                </div>
                <div class="physicians">
                    <div class="patient-titlebar">
                        <span id="title">Physicians </span>
                        <input type="search" name="physician-search" id="search-physician" placeholder="Search physicians">
                    </div>
                    <div class="phy-scroll">
                        <?php 
                            foreach($data['doctors'] as $row){
                                if(!isset($row['fName'])) continue;
                                echo'<div class="list">'.
                                    $row['fName'] . ' ' . $row['lName'] .
                                    '</div>';
                            }
                    ?>
                    </div>
                </div>
            </div>
            <div class="scheduling">
                <input class="inp input-date" type="date" placeholder="Choose Date" name="date">
                <div class="arranged-schedule">
                    <h4>Arranged Schedule</h4>
                    <hr/>
                    <span>Patient: <b id="selected-patient"></b></span>
                    <p>Assigned to</p>
                    <span>Physician: <b id="selected-physician"></b></span>
                    <p>On</p>
                    <span>Date: <b id="selected-date"></b></span>
                </div>
                <div class="schedule-actions">
                    <input id="clear-btn" type="submit" name="submit" value="Clear">
                    <form action="/submit-appointment" method="POST">
                        <input type="hidden" name="patient" id="hidden-patient">
                        <input type="hidden" name="physician" id="hidden-physician">
                        <input type="hidden" name="date" id="hidden-date">
                        <input id="confirm-btn" type="submit" name="submit" value="Confirm">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>

    const patientselected = document.getElementById("selected-patient");
    const physicianselected = document.getElementById("selected-physician");
    const date = document.querySelector(".input-date");
    const dateselected = document.getElementById("selected-date");
    const hiddenpatient = document.getElementById("hidden-patient");
    const hiddenphysician = document.getElementById("hidden-physician");
    const hiddendate = document.getElementById("hidden-date");

    function setupSearch(inputid, listClass) {
        const input = document.getElementById(inputid);
        const listItems = document.querySelectorAll(`.${listClass} .list`);

        input.addEventListener("input", () => {
            const searchValue = input.value.toLowerCase();
            listItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if(text.includes(searchValue)){
                    item.style.display = "block";
                }else{
                    item.style.display = "none";
                }
            });
        });
    }

    setupSearch("search-patient", "pat-scroll");
    setupSearch("search-physician", "phy-scroll");

    document.querySelectorAll(".pat-scroll .list").forEach(item => {
        item.addEventListener("click", () => {
            patientselected.textContent = item.textContent;
        });
    });

    document.querySelectorAll(".phy-scroll .list").forEach(item => {
        item.addEventListener("click", () => {
            physicianselected.textContent = item.textContent;
        });
    });

    document.querySelector("#clear-btn").addEventListener("click", function(){
        patientselected.textContent = "";
        physicianselected.textContent = "";
    });

    date.addEventListener("input", () => {
        dateselected.textContent = date.value;
    });

    document.querySelectorAll(".pat-scroll .list").forEach(item => {
        item.addEventListener("click", () => {
            patientselected.textContent = item.textContent;
            hiddenpatient.value = item.textContent;
        });
    });

    document.querySelectorAll(".phy-scroll .list").forEach(item => {
        item.addEventListener("click", () => {
            physicianselected.textContent = item.textContent;
            hiddenphysician.value = item.textContent;
        });
    });

    date.addEventListener("input", () => {
        dateselected.textContent = date.value;
        hiddendate.value = date.value;
    });
</script>
</html>