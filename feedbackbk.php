<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "bookreview";

// Create a connection
$con = new mysqli($host, $username, $password, $database);

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Assuming the form fields have the following names
$name = $_POST['name'];
$bookname = $_POST['bookname'];
$ratings = isset($_POST['rating']) ? implode(',', $_POST['rating']) : ''; // Convert array to string
$comments = $_POST['comments'];

$query = mysqli_query($con, "INSERT INTO feedback (id, name, bookname, view, comments) VALUES ('', '$name', '$bookname', '$ratings', '$comments')");

if ($query) {
    echo '<script>alert("Thank You..! Your Feedback is Valuable to Us"); location.replace(document.referrer);</script>';
} else {
    echo '<script>alert("Error inserting data: ' . mysqli_error($con) . '"); location.replace(document.referrer);</script>';
}

ob_end_flush();
?>
