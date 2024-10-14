<?php
include_once "connect.php";

$CustomerName = '';
$ContactName = '';
$Address = '';
$City = '';
$PostalCode = '';
$Country = '';
$username = '';
$password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input fields
    $CustomerName = $_POST['CustomerName'];
    $ContactName = $_POST['ContactName'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $PostalCode = $_POST['PostalCode'];
    $Country = $_POST['Country'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash the password

    $sql = "INSERT INTO tbl_customer (CustomerName, ContactName, Address, City, PostalCode, Country, username, password)
            VALUES ('$CustomerName', '$ContactName', '$Address', '$City', '$PostalCode', '$Country', '$username', '$password')";
    
    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20230512/pngtree-perfume-blue-sandy-sparkle-background-image_2459881.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .registration-form {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            position: relative;
            max-width: 500px;
        }
        .close-btn {
            position: absolute;
            right: 15px;
            top: 15px;
        }
        .form-group {
            margin-bottom: 10px;
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
            </ul>
        </div>
    </div>
</nav>

    <div class="bg d-flex align-items-start">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 registration-form">
                    <button type="button" class="close close-btn" aria-label="Close" onclick="window.location.href='login.php'">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="text-center">Customer Registration Form</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <label for="CustomerName">Customer Name</label>
                            <input type="text" class="form-control" id="CustomerName" name="CustomerName" placeholder="Enter customer name" required value="<?php echo $CustomerName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="ContactName">Contact Name</label>
                            <input type="text" class="form-control" id="ContactName" name="ContactName" placeholder="Enter contact name" required value="<?php echo $ContactName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter address" required value="<?php echo $Address; ?>">
                        </div>
                        <div class="form-group">
                            <label for="City">City</label>
                            <input type="text" class="form-control" id="City" name="City" placeholder="Enter city" required value="<?php echo $City; ?>">
                        </div>
                        <div class="form-group">
                            <label for="PostalCode">Postal Code</label>
                            <input type="text" class="form-control" id="PostalCode" name="PostalCode" placeholder="Enter postal code" required value="<?php echo $PostalCode; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Country">Country</label>
                            <input type="text" class="form-control" id="Country" name="Country" placeholder="Enter country" required value="<?php echo $Country; ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required value="<?php echo $username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required value="<?php echo $password; ?>">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
