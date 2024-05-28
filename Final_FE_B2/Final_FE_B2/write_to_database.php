<?php
session_start();

if (isset($_POST['confirm'])) {
    $servername = "sql113.infinityfree.comt";
    $username = "if0_36530284";
    $password = "ml10MKnGSM7qnB0";
    $dbname = "if0_36530284_MoffatBayLodge";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO reservation (reservation_id,room_size, number_of_guests, check_in_date, check_out_date, activities, additional_info) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siss",$reservation_id, $room_size, $number_of_guests, $check_in_date, $check_out_date, $activities, $additional_info);

    // Set parameters
    $user_email = $_SESSION['user_email'];
    $reservation_id = $user_email; // This will set the reservation ID as the user email
    $room_size = $_SESSION['room_size'];
    $number_of_guests = $_SESSION['number_of_guests'];
    $check_in_date = $_SESSION['check_in_date'];
    $check_out_date = $_SESSION['check_out_date'];
    $activities = implode(", ", $_SESSION['activities']); // Convert array to comma-separated string
    $additional_info = $_SESSION['additional_info'];

    if ($stmt->execute()) {
        // If successful, unset session variables
        session_unset();
        session_destroy();
        
        echo "<script>alert('Reservation confirmed!');</script>";
        echo "<script>window.location.href = 'HMP2.php';</script>";
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} elseif (isset($_POST['edit'])) {
    // If user chooses to edit, redirect back to the form
    header("Location: reservation.php");
    exit;
}
?>
