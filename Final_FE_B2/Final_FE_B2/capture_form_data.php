<?php
session_start();

// Retrieve user email from the loginhandler session
$user_email = $_SESSION['user_email'];

$_SESSION['reservation_id'] = $user_email; // This will set the reservation ID as the user email

$_SESSION['room_size'] = $_POST['room_size'];
$_SESSION['number_of_guests'] = $_POST['number_of_guests'];
$_SESSION['check_in_date'] = $_POST['check_in_date'];
$_SESSION['check_out_date'] = $_POST['check_out_date'];

// Check if activities is not empty before assigning it to the session
if (!empty($_POST['activities'])) {
    $_SESSION['activities'] = $_POST['activities'];
}

$_SESSION['additional_info'] = $_POST['additional_info'];

header("Location: reservationsummary.php");
exit;

?>
