<?php

include "Database/connection.php";
// Get username and password from the form.
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database to check for user credentials.
$sql = "SELECT * FROM data WHERE username = '$username' AND password = '$password'";
$result = $connection->query($sql);

if ($result->num_rows == 1) {
    // Login successful.
    session_start();
    $_SESSION['username'] = $username;
    header('Location: dashboard.php');
} else {
    // Login failed.
    header('Location: index.php?error=1');
    
}

