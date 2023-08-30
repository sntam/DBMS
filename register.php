<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $regno = $_POST["regno"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (name, regno, password) VALUES ('$name', '$regno', '$password')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Successfully registered. ";
        echo "<a href='student_login.html'>Go to Student Login</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>
