<?php
// Include database connection
include 'connect.php';

// Start session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    // Check if the customer is logged in
    if(isset($_SESSION['customerID'])) {
        // Retrieve customer ID from session
        $customerID = $_SESSION['customerID'];
        $productID = $_POST['productID'];
        $quantity = $_POST['quantity'];

        // Prepare and execute statement to insert/update cart
        $stmt = $con->prepare("INSERT INTO tbl_cart (customerID, productID, quantity) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + ?");
        $stmt->bind_param("iiii", $customerID, $productID, $quantity, $quantity);
        $stmt->execute();
        $stmt->close();

        // Redirect back to the product page or cart page
        header("Location: product.php"); // You can change this to redirect to the cart page
        exit;
    } else {
        // If the user is not logged in, redirect to login page
        header("Location: login.php");
        exit;
    }
} else {
    // If the form is not submitted, redirect to the product page
    header("Location: product.php");
    exit;
}
?>
