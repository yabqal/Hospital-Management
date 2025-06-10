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
                    <a href="/"><div class="back-btn"><img src="/icon/arrow-left.svg" alt="" /></div></a>
                    <a href="/"><div class="home-btn"><img src="/icon/home-2.svg" alt="" /></div></a>
                    <a href="/logout"><div class="log-out-btn">Log Out</div></a>
                </div>
            </div>
            <hr />
        </div>

        <div class="container">
            <div class="patients-list">
                <div class="patients">
                    <div class="patient-titlebar">
                        <span style="font-size: 18px; font-weight: bold;" id="title">Patients </span>
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
                        <span style="font-size: 18px; font-weight: bold;" id="title">Physicians </span>
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
                <div>
                    <div style="margin: 12px; font-weight: bold;">Date</div>
                    <input style="padding: 24px;" class="inp input-date" type="date" placeholder="Choose Date" name="date" id="date-input">
                </div>
                <div class="arranged-schedule">
                <h3>Arranged Schedule</h3>
                    <hr style="margin-bottom: 24px;"/>
                    <span">Patient: <span style="margin-left: 8px; font-weight: 500;" id="selected-patient">
                        <?php
                    if(isset($data['patient'])) echo $data['fName'] . ' ' . $data['mName'] . ' ' . $data['lName'];
                    else echo '';
                    ?>
                    </span></span>
                    <p style="font-size: 14px; color: rgba(255, 255, 255, 0.45);">Assigned to</p>
                    <span>Physician: <span style="margin-left: 8px; font-weight: 500;" id="selected-physician">
                        <?php
                    if(isset($data['doctor'])) echo $data['fName'] . ' ' . $data['lName'];
                    else echo '';
                    ?>
                    </span></span>
                    <p style="font-size: 14px; color: rgba(255, 255, 255, 0.45);">On</p>
                    <span>Date: <span style="margin-left: 8px; font-weight: 500;" id="selected-date"></span></span>
                </div>
                <div class="schedule-actions">
                    <input id="clear-btn" type="submit" name="submit" value="Clear">
                    <form action="/submit-appointment" method="POST" onsubmit="return validateDate()">
                        <input type="hidden" name="pid" id="hidden-patient">
                        <input type="hidden" name="did" id="hidden-physician">
                    <form action="/submit-appointment" method="POST">
                        <input type="hidden" name="pid" id="hidden-patient" value=<?php
                    if(isset($data['patient'])) echo $data['id'];
                    else echo '';
                    ?>>
                        <input type="hidden" name="did" id="hidden-physician" value=<?php
                    if(isset($data['doctor'])) echo $data['id'];
                    else echo '';
                    ?>>
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
                item.style.display = text.includes(searchValue) ? "block" : "none";
            });
        });
    }

    setupSearch("search-patient", "pat-scroll");
    setupSearch("search-physician", "phy-scroll");

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

    document.querySelector("#clear-btn").addEventListener("click", function(){
        patientselected.textContent = "";
        physicianselected.textContent = "";
    });

    const today = new Date().toISOString().split("T")[0];
    document.getElementById("date-input").setAttribute("min", today);

    function validateDate() {
        const selectedDate = new Date(date.value);
        const now = new Date();
        now.setHours(0, 0, 0, 0); 

        if (selectedDate < now) {
            alert("You cannot choose a past date for the appointment.");
            return false;
        }
        return true;
    }
</script>
</html>
