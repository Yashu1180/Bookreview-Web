
<?php
session_start();

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'bookreview';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the session
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];

    // Query to select all images from the table
    $sql = "SELECT * FROM signup WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Retrieve the image data
            $username = $row['username'];
            $email = $row['Email'];
            $password = $row['Password'];
            $contact = $row['Contact'];

            // Generate the HTML for each image with Bootstrap card styling
        }
    } else {
        echo "No user found with ID: $id";
    }

    $conn->close();
} else {
    echo "Session 'id' not set.";
}
?>
<!-- Rest of your HTML code -->

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title> 
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background:white;
}
.wrapper{
  position:absolute;
  max-width: 430px;
  width: 100%;
  background: #BBE0F3;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #BC9ABD;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #1C97D6;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #1C97D6;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #BC9ABD;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color:#BC9ABD;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}
img {
    margin-left: 113px;
}
.prof{
  margin-top:20px;
  margin-bottom:550px;
}
.prof-text{
  color:#1C97D6;
}

    </style>
   </head>
<body>
<?php
include("header1.php");
?>
  <div class="prof">
    <h2 class="prof-text" style="    margin-top: 75px;">PROFILE</h2>
</div>
  
  <div class="wrapper" style="margin-top:150px;">
    
    <form action="profilebk.php" method="post">
        
      <div class="input-box">
        <input type="text" placeholder="username" value="<?php echo $username; ?>" name="username" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder=" email" value="<?php echo $email; ?>" name="email" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="password" value="<?php echo $password; ?>" name="password" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Contact" value="<?php echo $contact; ?>"  name="contact"required>
      </div>
      
      <div class="input-box button">
        <input type="Submit" value="Update">
      </div>
      
    </form>
  </div>
</body>
</html>