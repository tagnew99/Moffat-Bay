<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if search term is provided
    if (!isset($_GET['search'])) {
        echo "Please provide a search term.";
        exit; // Terminate the script
    }

    // Get the search term from the form
    $searchTerm = $_GET['search'];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM bookings WHERE unique_id = '$searchTerm'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Room Size</th><th>Number of Guests</th><th>Check-in Date</th><th>Check-out Date</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["room_size"] . "</td><td>" . $row["number_of_guests"] . "</td><td>" . $row["check_in_date"] . "</td><td>" . $row["check_out_date"] . "</td></tr>";
            }

            echo "</table>";
        } else {
            // If no matching reservation found, display a message
            echo "No reservations found.";
        }
    } else {
        // If query execution fails, display an error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>