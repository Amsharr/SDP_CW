<?php
$servername = "localhost";
$username = "sdpm01";
$password = "Sdp_CW123$#";
$database = "sdp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
