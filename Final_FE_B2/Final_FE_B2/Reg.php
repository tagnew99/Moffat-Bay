<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Registration Page</title>
    <link rel="stylesheet" href="Styles/styles_RP.css">
    <style>
        body {
            background-color: #E8E8E9;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container2 {
            text-align: center; /* Center align the content within the container */
        }

        input[type="submit"] {
            margin-top: 20px; /* Add space between the input fields and the submit button */
            padding: 10px 20px; /* Add padding to the submit button */
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        /* Style for error message */
        .error {
            color: red;
        }
    </style>

    <script>
        // Script to validate password so user does not enter random blahness
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var errorElement = document.getElementById("password_error");

            if (password !== confirmPassword) {
                errorElement.innerHTML = "Passwords do not match";
                return false;
            } else {
                errorElement.innerHTML = ""; // Clear the error message if passwords match
                return true;
            }
        }
    </script>

</head>

<body>
    <div class="header">
        <img src="Images/logo.png" alt="Logo" />
        <h1>Registration</h1>
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

    <div class="container2">
        <h2>Moffat Bay Lodge Registration:</h2>
        <form action="registerhandler.php" method="post" onsubmit="return validatePassword()">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" placeholder="First name" required><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" placeholder="Last name" required><br>
            <label for="lname">Home Address:</label><br>
            <input type="text" id="haddress" name="haddress" placeholder="Home address" required><br>
            <label for="lname">Phone Number:</label><br>
            <input type="text" id="pnumber" name="pnumber" placeholder="Phone number" required><br>
            <label for="lname">Email:</label><br>
            <input type="email" id="email" name="email" placeholder="Email" required><br>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <br>
            <label for="password">Create Password:</label><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br>

            <!-- User must validate password, if not then IT SHALL NOT PASS!!! -->
            <label for="confirm_password">Confirm Password:</label><br>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required><br>
            <span id="password_error" class="error"></span><br> <!-- Display error message for password mismatch -->

            <br>
            <input type="submit" value="Submit">
        </form>
        <p>When finished, click submit!</p>
    </div>

    <div class="footer">
        <footer>&copy; 2024 Moffat Bay Lodge. All rights reserved.</footer>
    </div>

</body>

</html>
