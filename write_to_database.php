<?php
session_start(); 

$servername = "sql113.infinityfree.com";
$username = "if0_36530284";
$password = "ml10MKnGSM7qnB0";
$dbname = "if0_36530284_MoffatBayLodge";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['confirm'])) {
    if (isset($_SESSION['user_email'], $_SESSION['room_size'], $_SESSION['selected_guests'], $_SESSION['check_in_date'], $_SESSION['check_out_date'], $_SESSION['activities'], $_SESSION['additional_info'])) {
        $booking_id = md5(uniqid()); // Generate a unique ID
        $unique_id = $_SESSION['user_email']; // Use user's email as unique identifier
        
        $activities = is_array($_SESSION['activities']) ? implode(", ", $_SESSION['activities']) : '';

        // Convert date strings to proper format
        $check_in_date = date('Y-m-d', strtotime($_SESSION['check_in_date']));
        $check_out_date = date('Y-m-d', strtotime($_SESSION['check_out_date']));

        $stmt = $conn->prepare("INSERT INTO bookings (booking_id, unique_id, room_size, number_of_guests, check_in_date, check_out_date, activities, additional_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("ssisssss", $booking_id, $unique_id, $_SESSION['room_size'], $_SESSION['selected_guests'], $check_in_date, $check_out_date, $activities, $_SESSION['additional_info']);

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

        // Close statement
        $stmt->close();
    } else {
        echo "<script>alert('Please fill out all required fields before confirming.');</script>";
        echo "<script>window.location.href = 'reservation.php';</script>";
        exit;
    }
} elseif (isset($_POST['edit'])) {
    // If user chooses to edit, redirect back to the form
    header("Location: reservation.php");
    exit;
}

$conn->close();
?>
