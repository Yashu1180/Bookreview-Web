
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

	   $email = $_POST['email'];

       $password= $_POST['password'];

    //  $email = $_POST['RegEmailAddress'];

    //  $password = $_POST['RegPassword'];
     
    //  $confirmpassword = $_POST['RegConfirmPassword'];

     $sql = "INSERT INTO adminlogin(email , Password ) VALUES('$email','$password')";
	 

if ($conn->query($sql) === TRUE) {
  
  echo "<script type='text/javascript'>alert('$message');window.location.href='adminindex.php';</script>";
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

