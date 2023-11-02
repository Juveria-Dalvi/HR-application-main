<?php
include "connection.php";

$tomorrow = date('Y-m-d', strtotime('+1 day'));
$birthdayQuery = "SELECT full_name, dob FROM employee_details WHERE DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT('$tomorrow', '%m-%d')";
$birthdayResult = $connection->query($birthdayQuery);

$upcomingBirthdays = [];

if ($birthdayResult->num_rows > 0) {
    while ($row = $birthdayResult->fetch_assoc()) {
        $upcomingBirthdays[] = $row;
    }
}

// Query for upcoming work anniversaries
$anniversaryQuery = "SELECT full_name, joining_date FROM employee_details WHERE DATE_FORMAT(joining_date, '%m-%d') = DATE_FORMAT('$tomorrow', '%m-%d')";
$anniversaryResult = $connection->query($anniversaryQuery);

$upcomingAnniversaries = [];

if ($anniversaryResult->num_rows > 0) {
    while ($row = $anniversaryResult->fetch_assoc()) {
        $joiningDate = new DateTime($row['joining_date']);
        $currentDate = new DateTime();

        // Calculate the work anniversary year
        $workAnniversaryYear = $currentDate->diff($joiningDate)->y + 1;

        $row['work_anniversary_year'] = $workAnniversaryYear;
        $upcomingAnniversaries[] = $row;
    }
}