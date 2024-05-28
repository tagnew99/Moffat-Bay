<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "db_connect.php";

    // Get username and password from form submission
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    // Check if a matching user was found
    if (mysqli_num_rows($result) == 1) {
        // User exists, fetch user's email
        $row = mysqli_fetch_assoc($result);
        $user_email = $row['email'];
        
        // Set variables for later use
        $_SESSION["username"] = $username;
        $_SESSION["user_email"] = $user_email; // Assuming $user_email contains the user's email
        
        // Redirect to home page
        header("Location: HMP2.php");
        exit();
    } else {
        // User doesn't exist or credentials are incorrect, redirect back to login page
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
} else {
    // If the form wasn't submitted, redirect back to login page
    header("Location: login.php");
    exit();
}
?>
