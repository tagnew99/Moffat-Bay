<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page with an alert message
    echo "<script>alert('You must be logged in to view the reservation summary.'); window.location.href='login.php';</script>";
    exit(); // Stop further execution
}

// Check if reservation session data exists
if (!isset($_SESSION['room_size']) || !isset($_SESSION['number_of_guests']) || !isset($_SESSION['check_in_date']) || !isset($_SESSION['check_out_date'])) {
    // Redirect the user to the reservation page
    echo "<script>alert('Must start a reservation before viewing this page.'); window.location.href='reservation.php';</script>";
    exit(); // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reservation Summary</title>
    <link rel="stylesheet" href="Styles/styles_Sum.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <div class="header">
        <img src="Images/logo.png" alt="Logo" />
        <h1>Check Your Reservation</h1>
    </div>

    <div class="navbar">
        <a class="nav-item" href="HMP2.php"> <i class="fa-solid fa-house"></i> Home</a>
        <a class="nav-item" href="AP.php"> <i class="fa-solid fa-book"></i> About Us</a>
        <div class="dropdown nav-item">
            <a class="nav-item" href="#"> <i class="fa-solid fa-check"></i> Reservations</a>
            <div class="dropdown-content">
                <a class="dropdown-item" href="reservation.php">Make a Reservation</a>
                <a class="dropdown-item" href="attractions.php">Explore</a>
                <a class="dropdown-item" href="lookup.php">Reservation Confirmation</a>
                <a class="dropdown-item" href="reservationsummary.php">Reservation Summary</a>
            </div>
        </div>

        <?php
        include 'user_status.php';
        ?>
    </div>

    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="center-box">
            <h2>Reservation Summary</h2>
            <p><strong>Room Size:</strong> <?php echo $_SESSION['room_size']; ?></p>
            <p><strong>Number of Guests:</strong> <?php echo $_SESSION['number_of_guests']; ?></p>
            <p><strong>Check-in Date:</strong> <?php echo $_SESSION['check_in_date']; ?></p>
            <p><strong>Check-out Date:</strong> <?php echo $_SESSION['check_out_date']; ?></p>
            <?php if (!empty($_SESSION['activities'])): ?>
                <p><strong>Selected Activity:</strong> <?php echo $_SESSION['activities']; ?></p>
            <?php endif; ?>
            <p><strong>Additional Information:</strong> <?php echo isset($_SESSION['additional_info']) ? $_SESSION['additional_info'] : "None"; ?></p>

            <form action="write_to_database.php" method="post">
                <input type="submit" name="confirm" class="confirm-btn" value="Confirm Reservation">
                <button type="button" class="cancel-btn" onclick="window.location.href='HMP2.php';">Cancel</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <footer>&copy; 2024 Moffat Bay Lodge. All rights reserved.</footer>
    </div>
</body>

</html>
