<?php
include_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        header {
            padding: 20px 0;
            background-color: #007bff;
            color: white;
        }
        header h2 {
            margin: 0;
        }
        .container {
            margin-top: 20px;
        }
        .btn-custom {
            margin-bottom: 15px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .no-records {
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
  
        
  
    <div class="container"><h2 class="text-center">Manage Product</h2>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-custom" onclick="window.location.href='add-product.php';">Add Product</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
    $sql_profile = "SELECT * FROM product ORDER BY productname";
    $result_profile = mysqli_query($con, $sql_profile);

    if (mysqli_num_rows($result_profile) > 0) {
        while ($row = mysqli_fetch_array($result_profile)) {
            echo "<tr>";
                echo "<td>".$row['productID']."</td>";
                echo "<td>".$row['productname']."</td>";
                echo "<td>".$row['productdescription']."</td>";
                echo "<td>".$row['price']."/".$row['productunit']."</td>";
                echo "<td>".$row['quantity']."</td>";
                echo "<td><img src='".$row['image_url']."' width='50px'></td>";
                echo "<td>";
                    echo "<a href='update-product.php?id=".$row['productID']."' class='btn btn-warning btn-sm me-1'>Edit</a>";
                    echo "<a href='delete-product.php?id=".$row['productID']."' class='btn btn-danger btn-sm'>Delete</a>";
                echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7' class='no-records'>No records found</td></tr>";
    }
?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
