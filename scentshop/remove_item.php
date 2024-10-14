<?php
session_start();
include 'connect.php';

// Check if the user is logged in
if (!isset($_SESSION['customerID'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit;
}

// Check if productID is provided
if(isset($_POST['productID'])) {
    $productID = $_POST['productID'];
    
    // Delete the item from the cart
    $sql_delete = "DELETE FROM tbl_cart WHERE productID = $productID AND customerID = " . $_SESSION['customerID'];
    $result_delete = mysqli_query($con, $sql_delete);

    if ($result_delete) {
        echo "Item removed successfully";
    } else {
        echo "Error: Unable to remove item. " . mysqli_error($con);
    }
} else {
    echo "Error: ProductID not provided";
}
?>
