<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "university";

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>