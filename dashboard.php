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
    <style>
        /* Add your custom styles here */
        .main-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
        }

        /* Set a custom background color for the header */
        .header {
            background-color: #007bff; /* Replace 'your-banner-image.jpg' with the path to your banner image */
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 20px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .header-logo {
            max-width: 70%; /* Adjust the logo size as needed */
        }
        .header-logout {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .header-logout button {
            background-color: #e74c3c;
            color: #fff;
        }
        .sidebar {
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            width:25%;
        }
        .sidebar ul {
            list-style: none;
            margin-left: -30px;
            }
      

        .profile-photo {
            text-align: center;
        }
        .profile-photo img {
            width: 150px; /* Adjust the size of the profile photo */
            border-radius: 50%; /* Make it round */
        }
        .sidebar a{
            padding: 12px 5px 12px 15px;
            display: block;
            color: #fefefe;
            position: relative;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.3px;
            
        }
        .sidebar a:hover{
            text-decoration:none;
            color:#EC6746;
        }
        

        .dashboard-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: left;
            position: relative; /* Added to enable absolute positioning */
        }

        h1 {
            color: #333;
            font-size: 24px;
        }

        select, input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        /* Position the logout button */
        #logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #e74c3c; /* Button style */
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        #logout-button:hover {
            background-color: #c0392b; /* Hover style */
        }


        .column {
            flex: 1;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .upcoming-events {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin: 10px 0;
        }

        .event-list {
            list-style-type: none;
            padding: 0;
        }

        .event-list li {
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
            font-size: 18px;
            margin: 0;
        }

        .name {
            font-weight: bold;
        }

        .work-anniversary {
            color: #3498db;
        }

       
        .option {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #fff;
            text-decoration: none;
        }
        .option i {
            margin-right: 10px;
        }
        .form-container {
            flex: 1;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin-left: 10px;
        }
        .result-container {
            flex: 1;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin-left: 10px;
        }
        #imageUpload
{
    display: none;
}

#profileImage
{
    cursor: pointer;
}

#profile-container {
    width: 150px;
    height: 150px;
    overflow: hidden;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
}

#profile-container img {
    width: 150px;
    height: 150px;
}
    </style>
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
                <image id="profileImage" src="Assets/PF.png" />
            </div>
                <input id="imageUpload" type="file"  onchange="loadFile(event)"
                name="profile_photo" placeholder="Photo" required="" capture>
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
                            <span class="work-anniversary">Work Anniversary Year:</span> <?php echo $anniversary['work_anniversary_year']; ?>
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
<script>$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});

var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
</body>
</html>