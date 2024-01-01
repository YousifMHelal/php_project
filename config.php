<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

session_start();


// if ($con->connect_error) {
//   die("Connection failed: " . $con->connect_error);
// }
// echo "Connected successfully";

?>