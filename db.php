<?php

// informations connection
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "rewity";


// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
