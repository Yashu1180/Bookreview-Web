<?php
session_start();
require_once("dbconfig.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the delete operation
    $delete_query = "DELETE FROM addcategory WHERE id = '$id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request. Please provide an ID.";
}

mysqli_close($conn);
?>
