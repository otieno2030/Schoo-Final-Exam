<?php


// Connect to MySQL database

$servername = "localhost";
$username = "root";
$password = ""; // Default password for XAMPP
$database = "calendar_db"; // Your database name
$conn = new mysqli($servername, $username, $password, $database);
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

$events = array(); // Initialize the $events array


if ($result->num_rows > 0) {
    // Populate $events with event details
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
} else {
    echo "No events found.";
}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted for event creation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["event_title"]) && isset($_POST["event_date"])) {
    // Sanitize input data
    $event_title = mysqli_real_escape_string($conn, $_POST["event_title"]);
    $event_date = mysqli_real_escape_string($conn, $_POST["event_date"]);

    // Insert event into the database
    $sql = "INSERT INTO events (title, event_date) VALUES ('$event_title', '$event_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Event created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if the event deletion form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_event_id"])) {
    // Sanitize input data
    $event_id = mysqli_real_escape_string($conn, $_POST["delete_event_id"]);

    // Delete event from the database
    $sql = "DELETE FROM events WHERE id = $event_id";
    if ($conn->query($sql) === TRUE) {
        echo "Event deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch events from the database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Create an array to store events
$events = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar Application</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="main">
        <h1 class="title">Calendar Application</h1>
        <div class="calendar">
            <header>
                <nav>
                    <button id="prev">←</button>
                    <button id="next">→</button>
                </nav>
                <h3></h3>
            </header>
            <div class="days">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <!-- ...existing form elements... -->
    <input type="hidden" name="user_email" value="<?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; ?>">
</form>
            <ul class="dates">
                <?php
                // Loop through days of the month
                for ($i = 1; $i <= 31; $i++) {
                    echo '<li>' . $i;
                    // Check if there's an event for this date
                    foreach ($events as $event) {
                        $event_date = date('j', strtotime($event['event_date']));
                        if ($event_date == $i) {
                            echo '<br>' . $event['title'] . ' <form method="post" action="' . $_SERVER["PHP_SELF"] . '"><input type="hidden" name="delete_event_id" value="' . $event['id'] . '"><input type="submit" value="Delete"></form>';
                            break;
                        }
                    }
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>

    <!-- Event Creation Form -->
    <div class="event-form">
        <h2>Create Event</h2>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="event_title">Event Title:</label><br>
            <input type="text" id="event_title" name="event_title" required><br>
            <label for="event_date">Event Date:</label><br>
            <input type="date" id="event_date" name="event_date" required><br><br>
            <input type="submit" value="Create Event">
            
        </form>
        
    </div>
</body>
</html>
