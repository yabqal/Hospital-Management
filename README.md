# Hospital Management System

## Overview

The **Hospital Management System (HMS)** is a web-based application built using plain **HTML**, **CSS**, **JavaScript**, and **PHP**. It is designed to efficiently manage hospital operations, including adding and removing doctors, scheduling patient appointments, and assigning rooms.

## Features

* **Doctor Management**:

  * Add new doctors with their specialization and availability.
  * Remove doctors from the system.

* **Patient Management**:

  * Register new patients and manage their details.
  * View patient lists and their assigned doctors.

* **Appointment Scheduling**:

  * Schedule appointments for patients with the desired doctor.
  * View, update, and cancel scheduled appointments.

* **Room Assignment**:

  * Assign patients to available rooms based on their treatment requirements.
  * Manage room availability and occupancy.

## Technologies Used

* Frontend: HTML, CSS, JavaScript
* Backend: PHP
* Database: MySQL

## Project Structure

```
📂 hospital-management-system
│
├── 📁 Abstract
│   ├── Controller.php
│   ├── Model.php
│   └── View.php
│
├── 📁 App
│   ├── 📁 Controller
│   │   └── HomeController.php
│   ├── 📁 Model
│   │   ├── Appointment.php
│   │   ├── Doctor.php
│   │   ├── Patient.php
│   │   └── Room.php
│   └── 📁 View
│       ├── add-patient.php
│       ├── home.php
│       ├── patient-list.php
│       ├── register-doctor.html
│       └── register-patient.html
│
├── 📁 Public
│   ├── 📁 icons
│   │   ├── arrow-left.svg
│   │   ├── arrow-right.svg
│   │   ├── calendar-2.svg
│   │   ├── check-2.svg
│   │   ├── home-2.svg
│   │   ├── key-2.svg
│   │   ├── paragraph.svg
│   │   └── profile-2.svg
│   └── 📁 styles
│       ├── common.css
│       ├── register-doctor.css
│       └── register-patient.css
│
├── .htaccess
├── index.php
├── .gitattributes
└── README.md
```

## Setup Instructions

1. **Clone the repository**

   ```bash
   git clone https://github.com/your-username/hospital-management-system.git
   cd hospital-management-system
   ```
2. **Start Local Server**
   Use a local server environment **XAMPP**

   * Move the project folder to the `htdocs` directory.
   * Start Apache and MySQL from the XAMPP control panel.
   * Access the system at: `http://localhost/`

## Usage

* Navigate to `Doctors` to **Add** or **Remove** doctors.
* Go to `Appointments` to **Schedule**, **Update**, or **Cancel** appointments.
* Visit `Rooms` to **Assign** rooms to patients and manage availability.
* Check `Patients` to view, register, and manage patient details.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

---

Developed by **QIBE LLC.**
