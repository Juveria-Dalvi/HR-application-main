<?php
// Establish a database connection (update the credentials accordingly).
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'internal';

$connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check the connection.
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}



