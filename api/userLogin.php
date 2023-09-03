<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"]  == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id,username,profile_image ,password FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            echo "Login successful!";
            header("Location: ../dashboard.php");
            die;
        } else {
            $_SESSION['error_message'] = "Incorrect username or password.";

            header("Location: ../index.php");
            die;
        }
    } else {
        $_SESSION['error_message'] = "User not found.";

        header("Location: ../index.php");
        die;
    }
}
?>
