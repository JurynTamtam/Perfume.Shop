<?php
include_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customers</title>
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
    </style>
</head>
<body>
    <h2 class="text-center">Manage Customer</h2>
    <div class="container">
        <div class="d-flex justify-content-end">
            <a href="save.php" class="btn btn-primary btn-custom">Add Customer</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Contact Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Postal Code</th>
                        <th>Country</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
    $sql_customer = "SELECT * FROM tbl_customer";
    $result_customer = mysqli_query($con, $sql_customer);

    if (mysqli_num_rows($result_customer) > 0) {
        while ($row = mysqli_fetch_array($result_customer)) {
            echo "<tr>";
                echo "<td>".$row['CustomerID']."</td>";
                echo "<td>".$row['CustomerName']."</td>";
                echo "<td>".$row['ContactName']."</td>";
                echo "<td>".$row['Address']."</td>";
                echo "<td>".$row['City']."</td>";
                echo "<td>".$row['PostalCode']."</td>";
                echo "<td>".$row['Country']."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>";
                    echo "<a href='update.php?id=".$row['CustomerID']."' class='btn btn-warning btn-sm me-1'>Edit</a>";
                    echo "<a href='delete.php?id=".$row['CustomerID']."' class='btn btn-danger btn-sm'>Delete</a>";
                echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9' class='no-records'>No records found</td></tr>";
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
