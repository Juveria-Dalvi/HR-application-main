<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
include "Database/upcomingdb.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Employee Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom styles here -->
    <link rel="stylesheet" href="Assets/style.css">
</head>

<body>
    <!-- Header with logo -->
    <div class="header">
        <img src="Assets/martechs_logo.png" alt="logo" class="img-fluid">
    </div>

    <!-- Main container with three columns -->
    <div class="main-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile-photo">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <div id="profile-container">
                    <image id="profileImage" src="images/PF.png" />
                </div>
                <input id="imageUpload" type="file" onchange="loadFile(event)" name="profile_photo" placeholder="Photo"
                    required="" capture>
            </div>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> &nbsp;Dashboard</a></li>
                <li><a href="#"><i class="fas fa-user"></i> &nbsp;Staff Management</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i> &nbsp;Email Notification</a></li>
                <li><a href="#"><i class="fas fa-calendar-minus"></i> &nbsp;Leave Management</a></li>
                <li><a href="#"><i class="fas fa-calendar"></i> &nbsp;Calendar</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> &nbsp;Logout</a></li>
            </ul>
        </div>

        <!-- Form -->
        <div class="form-container">
            <h1>Welcome, John Doe</h1>
            <form method="post" action="mail.php">
                <h2>Select Functionality:</h2>
                <select name="functionality">
                    <option value="festive_notification">Festive Notification</option>
                    <option value="new_employee_welcome">New Employee Welcome</option>
                    <option value="festive_email">Festive Email</option>
                    <option value="birthday_card">Birthday Card</option>
                    <option value="company_update">Company Update</option>
                </select>

                <h2>Select Email Sender:</h2>
                <select name="email_sender">
                    <option value="martechs_email">Martechs Email</option>
                    <option value="hr_email">HR Email</option>
                </select>

                <h2>Select Recipients:</h2>
                <input type="text" name="recipients" placeholder="Enter email addresses, comma-separated">

                <h2>Set Email Template:</h2>
                <textarea name="email_template" rows="5" placeholder="Paste your email template here"></textarea>

                <button type="submit">Send Email</button>
        </div>

        <!-- Result -->
        <div class="result-container">
            <div class="upcoming-events">
                <h2>Upcoming Birthday</h2>
                <ul class="event-list">
                    <?php foreach ($upcomingBirthdays as $birthday) : ?>
                    <li>
                        <span class="name">Name Of Employee:</span> <?php echo $birthday['full_name']; ?><br>
                        <span>Birthdate:</span> <?php echo $birthday['dob']; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="upcoming-events">
                <h2>Upcoming Work Anniversary</h2>
                <ul class="event-list">
                    <?php foreach ($upcomingAnniversaries as $anniversary) : ?>
                    <li>
                        <span class="name">Name Of Employee:</span> <?php echo $anniversary['full_name']; ?><br>
                        <span>Joining Date:</span> <?php echo $anniversary['joining_date']; ?><br>
                        <span class="work-anniversary">Work Anniversary Year:</span>
                        <?php echo $anniversary['work_anniversary_year']; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (jQuery is required) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="Assets/script.js"></script>

    
</body>

</html>