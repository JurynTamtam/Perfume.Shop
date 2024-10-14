<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    		<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            margin-top:50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
            position: relative; /* Position relative for the close button */
        }
        .container h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-submit {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            display: block;
            margin-bottom: 10px;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
        .btn-close {
            background-color: #f44336;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            display: block;
        }
        .btn-close:hover {
            background-color: #e53935;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="close-btn" onclick="window.location.href='index.php'">&times;</button>
        <h2>Add Product Form</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label for="productname">Product Name:</label>
                <input type="text" id="productname" placeholder="Enter product name" name="productname" required>
            </div>
            <div class="form-group">
                <label for="productdescription">Product Description:</label>
                <input type="text" id="productdescription" placeholder="Enter product description" name="productdescription" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" placeholder="Enter price" name="price" required>
            </div>
            <div class="form-group">
                <label for="productunit">Product Unit:</label>
                <select id="productunit" name="productunit">
                    <option value="">Select unit</option>
                    <option value="piece">Piece</option>
                    <option value="kilo">Kilo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" placeholder="Enter quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL:</label>
                <input type="text" id="image_url" placeholder="Enter image URL" name="image_url" required>
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
            <button class="btn btn-primary" onclick="window.location.href='index.php'">Close</button>
        </form>
    </div>
</body>
</html>

<?php
include_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input fields
  $productname = $_REQUEST['productname'];
  $productdescription = $_REQUEST['productdescription'];
  $price = $_REQUEST['price'];
  $productunit = $_REQUEST['productunit'];
  $quantity = $_REQUEST['quantity'];
  $image_url = $_REQUEST['image_url'];

  // Prepare and bind
  $stmt = $con->prepare("INSERT INTO `product` (`productname`, `productdescription`, `price`, `productunit`, `quantity`, `image_url`) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssdsis", $productname, $productdescription, $price, $productunit, $quantity, $image_url);

  // Execute the statement
  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";

    exit();
  } else {
    echo "Error: " . $stmt->error;
  }

  // Close the statement and connection
  $stmt->close();
  $con->close();
}
?>
