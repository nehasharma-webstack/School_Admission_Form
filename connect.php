<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "school_admission";
$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>