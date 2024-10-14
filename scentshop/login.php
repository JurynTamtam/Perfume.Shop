<?php
include_once "connect.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Retrieve hashed password associated with the username from the database
    $sql = "SELECT * FROM tbl_customer WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPasswordFromDB = $row['password']; // Retrieve hashed password from the database
        // Compare the hashed password provided by the user with the hashed password from the database
        if (password_verify($password, $hashedPasswordFromDB)) {
            // Passwords match, login successful
            $_SESSION['username'] = $username;
            $_SESSION['customerID'] = $row['CustomerID'];  // Store customerID in session

            header("Location: index.php");
            exit();
        } else {
            // Passwords don't match, login failed
            $error_message = "Invalid username or password.";
        }
    } else {
        // No user found with the provided username
        $error_message = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        body, html {
            height: 100%;
            margin: 0;
        }
        .bg {
            background-image: url('https://images.pexels.com/photos/4466492/pexels-photo-4466492.jpeg?cs=srgb&dl=pexels-karolina-grabowska-4466492.jpg&fm=jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .login-form {
            background: rgba(255, 255, 255, 0.8);
            padding: 35px;
            border-radius: 10px;
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
    <a class="navbar-brand" href="iindex.php">
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
                    <a class="nav-link active" href="login.php">Login</a>
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

<div class="bg d-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-form">
                <h3 class="text-center">Login</h3>
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger"><?= $error_message ?></div>
                <?php endif; ?>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='register.php'">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
