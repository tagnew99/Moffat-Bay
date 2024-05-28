<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Login</title>
    <link rel="stylesheet" href="Styles/styles_L.css">

    <?php
// Check if there's an error parameter in the URL
if(isset($_GET['error'])) {
    $error = $_GET['error'];
    // Display error popup based on error parameter value
    if($error === 'invalid_credentials') {
        echo '<script>alert("Invalid username or password. Please try again.");</script>';
    }
}
?>
</head>

<body>
    <div class="header">
        <img src="Images/logo.png" alt="Logo" /> 
        <h1>Login or Register</h1> 
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

    <div class="main-content">
        <div class="login-container">
            <h3>Login</h3>
            <form class="login-form" action="loginhandler.php" method="POST"> <!-- Updated action to login.php -->
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <footer>&copy; 2024 Moffat Bay Lodge. All rights reserved.</footer>
    </div>
</body>

</html>
