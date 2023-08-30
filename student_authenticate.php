<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regno = $_POST["regno"]; 
    $password = $_POST["password"];

    $sql = "SELECT * FROM students WHERE regno = ?";

    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $regno);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPasswordFromDB = $row["password"];
            if (password_verify($password, $hashedPasswordFromDB)) {
                header("Location: student_dashboard.php");
                exit();
            } else {
                echo "Invalid credentials (password mismatch)";
                echo "Entered Password: $password<br>";
            }
        } else {
            echo "Invalid credentials (username not found)";
        }
        $stmt->close();
    } else {
        echo "Statement preparation failed: " . $mysqli->error;
    }
} else {
    echo "Invalid request method";
}
$mysqli->close();
?>
