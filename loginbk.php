
<?php
session_start();
// Initialize the error message
$error_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "bookreview";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user is an admin with a specific password
    if ($email == "admin@gmail.com" && $password == "admin") {
        $_SESSION["logged_in"] = true;
        $_SESSION["user_type"] = "admin";
        echo "<script>alert('Admin Login Successfully.'); window.location.href = 'admin_home.php';</script>";
        exit();
    }

  
    // Check if a regular user with the given credentials exists
    $user_sql = "SELECT * FROM signup WHERE email = '$email' AND password = '$password'";
    $user_result = $conn->query($user_sql);

    if ($user_result->num_rows == 1) {
        // User is authenticated, set session variable to indicate login
        $_SESSION["logged_in"] = true;
        $userInfo = $user_result->fetch_assoc();
        $_SESSION["username"] = $userInfo["username"];
        $_SESSION["id"] = $userInfo["id"];
        $_SESSION["user_type"] = "regular";
        echo "<script>alert('Login Successfully.'); window.location.href = 'index.html';</script>";
        exit();
    } else {
        // Invalid credentials, set the error message
        $_SESSION["username"] = "Unknown";
        echo "<script>alert('Invalid Email and Password.'); window.location.href = 'login.php';</script>";
    }

    // Close the database connection
    $conn->close();
}
?>