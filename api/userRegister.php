<?php
include 'config.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    // image upload process
    $target_dir = "uploads/";
    $destination_path = getcwd().DIRECTORY_SEPARATOR."";
    $profile_image=$_FILES["profile_image"]["name"];
    $target_path = $destination_path.$target_dir. basename( $profile_image);

    if (@move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_path)) {
        $sql = "INSERT INTO users (username, password, email,profile_image) VALUES ('$username', '$password', '$email','$profile_image')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['username']=$username;
            echo "Registration successful!";
            header("Location: ../dashboard.php");
            exit();        
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file.";
    }   
}
?>
