<?php
include_once "connect.php";
$id = $_GET['id'];
$productID = -1;
$productname = '';
$productdescription = '';
$price = 0;
$productunit = '';
$quantity = 0;
$image_url = '';

$sql_product = "SELECT * FROM product WHERE productID=$id";
$result_product = mysqli_query($con, $sql_product);

if (mysqli_num_rows($result_product) > 0) {
    while ($row = mysqli_fetch_array($result_product)) {
        $productID = $row['productID'];
        $productname = $row['productname'];
        $productdescription = $row['productdescription'];
        $price = $row['price'];
        $productunit = $row['productunit'];
        $quantity = $row['quantity'];
        $image_url = $row['image_url'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            margin-top: 600px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        .container h2 {
            margin-top: 0;
        }
        .container input[type="text"],
        .container input[type="number"],
        .container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .container input[type="submit"]:hover {
            background-color: #45a049;
        }
        form img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $id); ?>">
            <input type="hidden" name="productID" value="<?php echo $productID; ?>">
            <label>Product Name</label>
            <input type="text" placeholder="Enter product name" name="productname" value="<?php echo $productname; ?>" required><br><br>
            <label>Product Description</label>
            <input type="text" placeholder="Enter product description" name="productdescription" value="<?php echo $productdescription; ?>" required><br><br>    
            <label>Price</label>
            <input type="number" placeholder="Enter price" name="price" value="<?php echo $price; ?>" required step="0.01"><br><br>
            <label>Product Unit</label>
            <select id="productunit" name="productunit">
                <option value="<?php echo $productunit; ?>"><?php echo $productunit; ?></option>
                <option value="piece">piece</option>
                <option value="kilo">kilo</option>
            </select><br><br>
            <label>Quantity</label>
            <input type="number" placeholder="Enter quantity" name="quantity" value="<?php echo $quantity; ?>" required><br><br>
            <label>Image URL</label>
            <input type="text" placeholder="Enter image URL" name="image_url" value="<?php echo $image_url; ?>" required><br><br>
            <?php if (!empty($image_url)) : ?>
                <img src="<?php echo htmlspecialchars($image_url); ?>" alt="Product Image">
            <?php endif; ?>
            <br>
            <input class="btn btn-success" type="submit" value="Update">
        </form>
        <button class="btn btn-primary" onclick="window.location.href='index.php'">Close</button>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_REQUEST['productID'];
    $productname = $_REQUEST['productname'];
    $productdescription = $_REQUEST['productdescription'];
    $price = $_REQUEST['price'];
    $productunit = $_REQUEST['productunit'];
    $quantity = $_REQUEST['quantity'];
    $image_url = $_REQUEST['image_url'];
    $sql = "UPDATE product
            SET productname = '$productname', productdescription = '$productdescription', price = '$price', productunit = '$productunit', quantity = '$quantity', image_url = '$image_url'
            WHERE productID = $productID";

    if ($con->query($sql) === TRUE) {
        echo "<script> window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
