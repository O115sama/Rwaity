<?php

// informations connection
$servername = "localhost";
$username = "rewaefhm_admin";
$password = "MKUW26a8nqEWZvs";
$dbname = "rewaefhm_rewaity";


// create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

