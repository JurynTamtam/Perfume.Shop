<?php
session_start();
include 'connect.php';

// Check if the user is logged in
if (!isset($_SESSION['customerID'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit;
}

$customerID = $_SESSION['customerID'];

// Query to retrieve cart items
$sql_cart = "SELECT tbl_cart.*, product.productname, product.price, product.image_url 
             FROM tbl_cart 
             INNER JOIN product ON tbl_cart.productID = product.productID 
             WHERE tbl_cart.CustomerID = $customerID";
$result_cart = mysqli_query($con, $sql_cart);

// Check for errors in the SQL query
if (!$result_cart) {
    die('Error: Unable to fetch cart items.');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        h2, h4 {
            margin-top: 20px;
        }
        .table img {
            width: 100px;
            height: auto;
        }
        @media (max-width: 768px) {
            .table img {
                width: 100px;
                height: auto;
            }
        }
        @media (max-width: 576px) {
            .table th, .table td {
                font-size: 12px;
            }
            .btn {
                font-size: 12px;
            }
        }
        .navbar-brand img {
            max-height: 40px; /* Adjust based on your logo size */
            margin-right: 10px;
            border-radius: 20px;
        }
        .navbar-brand{
            max-height: 50px; /* Adjust based on your logo size */
            margin-right: 10px;
            border-radius: 20px;
        }
    </style>
    <script>
        function removeItem(productID) {
            $.post("remove_item.php", {
                productID: productID
            }, function() {
                window.location.reload();
            });
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4">
    <div class="container">
    <a class="navbar-brand" href="#">
            <img src="https://i5.walmartimages.com/seo/Ariana-Grande-Cloud-Eau-De-Perfume-Perfume-for-Women-1-0-oz_59f68e25-04cd-474e-bff3-1210e0d81559.8b6157f5afd402ac0234cbc01c77c4a0.jpeg" alt="Logo"> <!-- Replace with the path to your logo image -->
            Scent Sanctuary Shop
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br><br>

<section class="container">
            <img src="https://static.vecteezy.com/system/resources/previews/027/381/351/original/shopping-cart-icon-shopping-trolley-icon-shopping-cart-logo-container-for-goods-and-products-economics-symbol-design-elements-basket-symbol-silhouette-retail-design-elements-vector.jpg" alt="cart" class="navbar-brand"> <!-- Replace with the path to your logo image -->
            Shopping Cart
    <table class="table table-responsive">
        <thead>
            <tr>
                <th><h5>Item</h5></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
<?php
$total_price = 0;
while ($row = mysqli_fetch_assoc($result_cart)) {
    $productID = $row['productID'];
    $productname = $row['productname'];
    $price = $row['price'];
    $quantity = $row['quantity'];
    $image_url = $row['image_url'];
    $total = $price * $quantity;
    $total_price += $total;
    echo "
        <tr>
            <td><img src='$image_url' alt='$productname'></td>
            <td></td>
            <td>$productname <br>Php $price <br>$quantity pcs <br><b> Total: Php $total</b> <br><br>
            <button onclick=\"removeItem($productID)\" class=\"btn btn-danger\">Remove</button></td>
        </tr>
    ";
}
?>
        </tbody>
    </table>
    <h5>Total Price: Php <?php echo $total_price; ?></h5>
    <a href="checkout.php" class="btn btn-success">Checkout</a>
    <a href="product.php" class="btn btn-primary">Continue Shopping</a>
</section>

</body>
</html>
