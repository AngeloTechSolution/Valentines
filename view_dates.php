<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "valentines_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM dates ORDER BY created_at DESC";
$result = $conn->query($sql);

echo "<h2>Stored Dates & Times</h2>";
echo "<table border='1'><tr><th>ID</th><th>User IP</th><th>Date</th><th>Time</th><th>Submitted At</th></tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['user_ip']}</td>
            <td>{$row['selected_date']}</td>
            <td>{$row['selected_time']}</td>
            <td>{$row['created_at']}</td>
          </tr>";
}

echo "</table>";

$conn->close();
?>
