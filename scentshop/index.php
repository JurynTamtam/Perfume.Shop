<?php
include_once "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Scent Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lobster&display=swap">


  <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .bg-image {
            background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20230512/pngtree-perfume-blue-sandy-sparkle-background-image_2459881.jpg'); /* Replace with your background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
        }
        .product-card {
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .voucher-card {
            background-color: teal;
            transition: transform 0.3s;
            border-radius: 10px;
            padding: 20px;
            color:white;
            text-align: center;
        }
        .voucher-card:hover {
            transform: scale(1.05);
        }
        h1{
            font-family: 'Lobster', cursive;
            font-weight: 400;
            font-size: 30px;
            color: black;
        }
        .p1{
            font-family: 'lobster', sans-serif;
            font-weight: 400;
        }
        h2{
            font-family: 'Roboto', serif;
            font-weight: 400;
            color: black;
        }
        .navbar-brand img {
            max-height: 40px; /* Adjust based on your logo size */
            margin-right: 10px;
            border-radius: 20px;
        }
    </style>
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
                <li class="nav-item">
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


    <div class="bg-image d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1>Welcome to Scent Sanctuary Shop</h1>
            <p class="p1">Your one-stop shop for the best perfumes</p>
            <a href="product.php" class="btn btn-primary">Shop Now</a>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4 mb-4">
                <div class="card product-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrqaNjApr4Om8geoLZsOBOwAlkEELkUvoFAw&s" class="card-img-top" alt="Product 1"> <!-- Replace with actual product image -->
                    <div class="card-body">
                        <h5 class="card-title">Pink Pasion</h5>
                        <p class="card-text">Php: 150.00</p>
                        <p>Use code: WELCOME10 at checkout.</p>

                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-md-4 mb-4">
                <div class="card product-card">
                    <img src="https://static3.depositphotos.com/1000859/118/i/450/depositphotos_1180532-stock-photo-blue-perfume.jpg" class="card-img-top" alt="Product 2"> <!-- Replace with actual product image -->
                    <div class="card-body">
                        <h5 class="card-title">Starlight</h5>
                        <p class="card-text">Php: 200.00</p>
                        <p>Use code: WELCOME10 at checkout.</p>

                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-md-4 mb-4">
                <div class="card product-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNy_JaTV2sK83RX6s04Wk72mzJSoQH9FH7Rw&s" class="card-img-top" alt="Product 3"> <!-- Replace with actual product image -->
                    <div class="card-body">
                        <h5 class="card-title">Alicia</h5>
                        <p class="card-text">Php: 300.00</p>
                        <p>Use code: WELCOME10 at checkout.</p>

                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center mb-4">Vouchers & Discounts</h2>
        <div class="row">
            <!-- Voucher 1 -->
            <div class="col-md-6 mb-4">
                <div class="voucher-card">
                <img src="https://drive.google.com/file/d/14j5pPLKVYsjqlB5OPVP6_7soYNhxkqH8/view?usp=drive_link" class="card-img-top" alt="Voucher">
                    <h5>10% Off on Your First Purchase</h5>
                    <p>Use code: WELCOME10 at checkout.</p>
                </div>
            </div>
            <!-- Voucher 2 -->
            <div class="col-md-6 mb-4">
                <div class="voucher-card">
                    <h5>Free Shipping on Orders Over $100</h5>
                    <p>No code needed.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center py-4">
        <p>&copy; 2024 Scent Sanctuary Shop. All rights reserved.</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>