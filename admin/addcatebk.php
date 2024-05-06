<?php

	// session_start();
	// $name = $_SESSION['name'];
	
	
	
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {


	$image = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./images/" . $image;
	
    $bookname = $_POST['bookname'];

	$authorname = $_POST['authorname'];
    $description = $_POST['description'];
    $language = $_POST['language'];
    $country = $_POST['country'];
    $genre = $_POST['genre'];
    $publisher = $_POST['publisher'];
    $published = $_POST['published'];
	
	// $materials = $_POST['materials'];

	// $service_type = $_POST['service_type'];


	// $name = $_SESSION['name'];
	
	// $category1 = $_POST['category1'];
	

	$db = mysqli_connect("localhost", "root", "", "bookreview");


	
	$sql = "INSERT INTO addcategory(image, bookname,authorname,description,language,country,genre,publisher,published) VALUES('$image','$bookname','$authorname','$description','$language','$country','$genre','$publisher','$published')";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
	
		echo "<script type='text/javascript'>alert('Register Successfully!');window.location.href='adminindex.php';</script>";

	} else {
		echo "<h4> Register Failed!</h4>";
	}
}
?>