<?php

include_once "connect.php";



// Fetch cart items from the database
$sql_cart = "SELECT tbl_cart.*, tbl_customer.CustomerName, product.productname, product.price, product.image_url 
             FROM tbl_cart 
             JOIN tbl_customer ON tbl_cart.customerID = tbl_customer.CustomerID 
             INNER JOIN product ON tbl_cart.productID = product.productID";
$result_cart = mysqli_query($con, $sql_cart);

if (!$result_cart) {
    die('Error: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Cart Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include any additional CSS or JavaScript files here -->
</head>
<body>
    <div class="container">   
        <h2 class="text-center">Manage Cart</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                <th>Customer name</th>    
                <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each cart item and display it in a table row
                while ($row = mysqli_fetch_assoc($result_cart)) {
                    $CustomerName = $row['CustomerName'];
                    $productID = $row['productID'];
                    $productname = $row['productname'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $image_url = $row['image_url'];
                    $total = $price * $quantity;

                    // Output HTML for each row
                    echo "
                        <tr>
                            <td>$CustomerName</td>
                            <td><img src='$image_url' alt='$productname' style='width:100px;'></td>
                            <td>$productname</td>
                            <td>Php $price</td>
                            <td>$quantity</td>
                            <td>Php $total</td>
                            <td>
                            <a href='delete-cart.php?id=" . $row['cartID'] . "' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
        <!-- Add any additional functionalities or buttons here, like processing orders -->
    </div>
    <!-- Include footer if needed -->
</body>
</html>
