<?php
session_start();

// update.php

// Database connection (same as before)
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'bookreview';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_SESSION["id"];
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];

    // Update user details in the database
    $sql = " UPDATE signup SET username='$name', Email='$email', Password='$password', Contact='$contact' WHERE id=$id ";
    if ($conn->query($sql) === TRUE) {
        // echo 'User details updated successfully.';
        echo "<script type='text/javascript'>alert('Profile Updated Successfully');window.location.href='profile.php';</script>";
 
    } else {
        echo 'Error updating user details: ' . $conn->error;
    }
}

$conn->close();
?>