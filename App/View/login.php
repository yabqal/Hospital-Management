<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hospital Management</title>
    <link rel="stylesheet" href="../../Public/styles/login.css"/>
</head>
<body>
    <div class="main">
        <h1>Hospital Management System</h1>
        <p>This is a system designed to manage patients, physicians, rooms, schedules, etc for a medical facilities and hospitals</p>
        <div class="tasks-container">
            <div class="task1">
                <p>Manage Patients and Physicians</p>
                <img id="profile" src="../../Public/icons/profile-2 1-cropped.svg" alt="physicians and patients"/>
            </div>
            <div class="task2">
                <p>Schedule Meetings</p>
                <img id="calender" src="../../Public/icons/calendar 1-cropped.svg" alt="meetings"/>
            </div>
            <div class="task3">
                <p>Keep Records</p>
                <img id="record" src="../../Public/icons/solar_notebook-broken-cropped.svg" alt="records"/>
            </div>
        </div>
    </div>
    <!-- needs to be changed -->
    <form action="action.php" method="POST">
        <h3>Login</h3>
        <input type="text" name="username" placeholder="Username"/>
        <input type="password" name="password" placeholder="Password"/>
        <button>Login</button>
    </form>
</body>
</html>