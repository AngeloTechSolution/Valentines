<?php
$servername = "localhost"; // Change if using remote server
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$database = "valentines_db"; // Database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $time = $_POST["time"];

    $stmt = $conn->prepare("INSERT INTO dates (date, time) VALUES (?, ?)");
    $stmt->bind_param("ss", $date, $time);

    if ($stmt->execute()) {
        echo "Date and time saved successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
