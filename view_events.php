<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL password
$database = "calendar_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch events from the database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Check if there are events
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<h2>Saved Events:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["title"] . " - Date: " . $row["event_date"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No events found.";
}

// Close the database connection
$conn->close();
?>
