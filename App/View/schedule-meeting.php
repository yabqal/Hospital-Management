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
                    <!-- <?php 
                    foreach($data as $row){
                        if(!isset($row['fName'])) continue;
                        echo'<div class="pat-list">'.
                            $row['fName'] . ' ' . $row['mName'] . ' ' . $row['lName'] .
                            '</div>';
                    }
                    ?> -->
                    <div class="pat-scroll">
                        <div class="list">Abebe</div>
                        <div class="list">Kebebush</div>
                        <div class="list">Ayelu</div>
                        <div class="list">Tsion</div>
                    </div>
                </div>
                <div class="physicians">
                    <div class="patient-titlebar">
                        <span id="title">Physicians </span>
                        <input type="search" name="physician-search" id="search-physician" placeholder="Search physicians">
                    </div>
                    <!-- <?php 
                    foreach($data as $row){
                        if(!isset($row['fName'])) continue;
                        echo'<div class="phy-list">'.
                            $row['fName'] . ' ' . $row['mName'] . ' ' . $row['lName'] .
                            '</div>';
                    }
                    ?> -->
                    <div class="phy-scroll">
                        <div class="list">Abebe</div>
                        <div class="list">Kebebush</div>
                        <div class="list">Ayelu</div>
                        <div class="list">Tsion</div>
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
                    <span>Date: <b><?php echo date("Y-m-d"); ?></b></span>
                </div>
                <div class="schedule-actions">
                    <input id="clear-btn" type="submit" name="submit" value="Clear">
                    <input id="confirm-btn" type="submit" name="submit" value="Confirm">
                </div>
            </div>
        </div>
    </div>
</body>
<script>

    const patientselected = document.getElementById("selected-patient");
    const physicianselected = document.getElementById("selected-physician");

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
    })
</script>
</html>