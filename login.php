<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate credentials
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Compare hashed password from database
    // ... (Code to fetch hashed password from the 'users' table)

    if (password_verify($password, $hashedPasswordFromDb)) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $loginError = "Invalid username or password";
    }
}
?>