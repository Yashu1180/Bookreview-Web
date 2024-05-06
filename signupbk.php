
<?php
 $servername = "localhost";

    $username = "root";

    $password = "";

    $dbname = "bookreview"; 
	
	$message = "Register successful";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	   $username = $_POST['username'];

       $contact = $_POST['RegContactnumber'];

     $email = $_POST['RegEmailAddress'];

     $password = $_POST['RegPassword'];
     
     $confirmpassword = $_POST['RegConfirmPassword'];

     $sql = "INSERT INTO signup(username,Contact , Email , Password, Confirm ) VALUES('$username','$contact','$email','$password','$confirmpassword')";
	 

if ($conn->query($sql) === TRUE) {
  
  echo "<script type='text/javascript'>alert('$message');window.location.href='login.php';</script>";
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

