<?php
include_once "connect.php";

$id = $_GET['id'];

$sql = "DELETE FROM tbl_customer WHERE CustomerID = $id";

if ($con->query($sql) === TRUE) {
    // Redirect back to the previous page
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
