<?php
include "connection.php";

// Define the redirect URL
$redirectURL = "http://localhost/calender/employeeinformation.php";

// Retrieve data from the form
$employee_id = $_POST["employee_id"];
$email = $_POST["email"];

// Check if the email or employee ID already exists in the database
$emailCheckQuery = "SELECT * FROM employee_details WHERE email = '$email'";
$employeeIdCheckQuery = "SELECT * FROM employee_details WHERE employee_id = '$employee_id'";
$emailCheckResult = $connection->query($emailCheckQuery);
$employeeIdCheckResult = $connection->query($employeeIdCheckQuery);

if ($emailCheckResult->num_rows > 0 && $employeeIdCheckResult->num_rows > 0) {
    // Both email and employee ID already exist in the database
    echo '<script>alert("Email ID and Employee ID already exist.");</script>';
    echo '<script>window.setTimeout(function() { window.location = "' . $redirectURL . '"; }, 2000);</script>';
} elseif ($emailCheckResult->num_rows > 0) {
    // Email already exists in the database
    echo '<script>alert("Email ID already exists.");</script>';
    echo '<script>window.setTimeout(function() { window.location = "' . $redirectURL . '"; }, 2000);</script>';
} elseif ($employeeIdCheckResult->num_rows > 0) {
    // Employee ID already exists in the database
    echo '<script>alert("Employee ID already exists.");</script>';
    echo '<script>window.setTimeout(function() { window.location = "' . $redirectURL . '"; }, 2000);</script>';
} else {
    // Email and employee ID are unique; proceed with the insertion
    $full_name = $_POST["full_name"];
    $designation = $_POST["designation"];
    $dob = $_POST["dob"];
    $joining_date = $_POST["joining_date"];
    $address = $_POST["address"];
    $blood_group = $_POST["blood_group"];
    $emergency_number = $_POST["emergency_number"];

    // Insert the data into the database
    $insertQuery = "INSERT INTO employee_details (employee_id, full_name, email, designation, dob, joining_date, address, blood_group, emergency_number)
        VALUES ('$employee_id', '$full_name', '$email', '$designation', '$dob', '$joining_date', '$address', '$blood_group', '$emergency_number')";

    if ($connection->query($insertQuery) === TRUE) {
        // Data has been successfully saved
        echo '<script>alert("Employee information has been successfully saved.");</script>';
        echo '<script>window.setTimeout(function() { redirectToURL("' . $redirectURL . '"); }, 2000);</script>';
    } else {
        echo "Error: " . $insertQuery . "<br>" . $connection->error;
    }
}
?>

<script>
function redirectToURL(url) {
    window.location = url;
}
</script>
