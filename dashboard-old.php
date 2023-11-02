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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            position: relative;
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

        @media (max-width: 768px) {
            .column, .column-right {
                flex: 100%;
            }
        }

        @media (max-width: 400px) {
            .dashboard-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
<button id="logout-button" onclick="location.href='logout.php'">Logout</button>
    <div class="dashboard-container">
        <div class="column">
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
            </form>
        </div>
    </div>


    <div class="container">
        <div class="column">
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
    
</body>
</html>
