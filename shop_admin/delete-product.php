<?php
include_once "connect.php";
$id=$_GET['id'];


// Check if 'id' parameter is set
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: Product ID is not set.");
}
 $sql = "DELETE FROM product WHERE productID = $id";


	if ($con->query($sql) === TRUE) {
	  echo "Record deleted successfully";
	  header('location:index.php');
	} else {
	  echo "Error: " . $sql . "<br>" . $con->error;
	}

?>
