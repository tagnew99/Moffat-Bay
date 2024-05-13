<?php
session_start();

if(isset($_SESSION['user_email'], $_POST['room_size'], $_POST['number_of_guests'], $_POST['check_in_date'], $_POST['check_out_date'])) {
    // Sanitize and set other session variables
    $_SESSION['unique_id'] = $_SESSION['user_email'];

    $_SESSION['room_size'] = $_POST['room_size'];
    $_SESSION['selected_guests'] = $_POST['number_of_guests'];

    $_SESSION['check_in_date'] = $_POST['check_in_date'];
    $_SESSION['check_out_date'] = $_POST['check_out_date'];

    // Check if activities is not empty before assigning it to the session
    if (!empty($_POST['activities'])) {
        $_SESSION['activities'] = $_POST['activities'];
    }

    $_SESSION['additional_info'] = $_POST['additional_info'];

    // Redirect to reservation summary page
    header("Location: reservationsummary.php");
    exit;
} else {
    // Handle the case when any required session variable is not set
    echo "Please fill out all required fields.";
}
?>

