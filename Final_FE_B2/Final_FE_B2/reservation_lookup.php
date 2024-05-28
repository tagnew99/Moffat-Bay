<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the search term from the form
    $searchTerm = $_GET['search'];

    $query = "SELECT * FROM reservations WHERE reservation_id = '$searchTerm' OR email = '$searchTerm'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Output table headers
        echo "<table>";
        echo "<tr><th>Room Size</th><th>Number of Guests</th><th>Check-in Date</th><th>Check-out Date</th></tr>";

        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["room_size"] . "</td><td>" . $row["num_guests"] . "</td><td>" . $row["check_in_date"] . "</td><td>" . $row["check_out_date"] . "</td></tr>";
        }

        echo "</table>";
    } else {
        // If no matching reservation found, display a message
        echo "No reservations found.";
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
