<?php
session_start(); 

include_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $haddress = $_POST["haddress"];
    $pnumber = $_POST["pnumber"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirm_password) {
        // Passwords don't match, redirect back to registration page with error
        header("Location: Reg.php?error=password_mismatch");
        exit();
    }

    // Check if email already exists
    $sql_check_email = "SELECT * FROM users WHERE email = '$email'";
    $result_check_email = $conn->query($sql_check_email);
    if ($result_check_email->num_rows > 0) {
        // Email already exists, redirect back to registration page with error
        header("Location: Reg.php?error=email_exists");
        exit();
    }

    // Check if username already exists
    $sql_check_username = "SELECT * FROM users WHERE username = '$username'";
    $result_check_username = $conn->query($sql_check_username);
    if ($result_check_username->num_rows > 0) {
        // Username already exists, redirect back to registration page with error
        header("Location: Reg.php?error=username_exists");
        exit();
    }

    $sql_insert = "INSERT INTO users (fname, lname, haddress, pnumber, email, username, password) VALUES ('$fname', '$lname', '$haddress', '$pnumber', '$email', '$username', '$password')";
    if ($conn->query($sql_insert) === TRUE) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit();
    } else {
        // Registration failed, redirect back to registration page with error
        header("Location: Reg.php?error=registration_failed");
        exit();
    }
} else {
    // If the form wasn't submitted, redirect back to registration page
    header("Location: Reg.php");
    exit();
}
?>
