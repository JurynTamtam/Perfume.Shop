<?php
include_once "connect.php";
$id = $_GET['id'];
$CustomerID = -1;
$CustomerName = '';
$ContactName = '';
$Address = '';
$City = '';
$PostalCode = '';
$Country = '';

// Fetch customer data
$sql_customer = "SELECT * FROM tbl_customer WHERE CustomerID=$id";
$result_customer = mysqli_query($con, $sql_customer);

if ($result_customer && mysqli_num_rows($result_customer) > 0) {
    $row = mysqli_fetch_array($result_customer);
    $CustomerID = $row['CustomerID'];
    $CustomerName = $row['CustomerName'];
    $ContactName = $row['ContactName'];
    $Address = $row['Address'];
    $City = $row['City'];
    $PostalCode = $row['PostalCode'];
    $Country = $row['Country'];
} else {
    die("Error fetching customer data: " . mysqli_error($con));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
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
			margin-top: 400px;
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
		
    </style>
<body align="center">
    
    <div><h2>Update Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $id); ?>"> 
       
            <input type="hidden" name="CustomerID" value="<?php echo $CustomerID; ?>">
            <label>Customer Name: </label>
            <input type="text" placeholder="Enter customer name" name="CustomerName" value="<?php echo $CustomerName; ?>" required><br><br>
            <label>Contact Name: </label>
            <input type="text" placeholder="Enter contact name" name="ContactName" value="<?php echo $ContactName; ?>" required><br><br>
            <label>Address: </label>
            <input type="text" placeholder="Enter address" name="Address" value="<?php echo $Address; ?>" required><br><br>
            <label>City: </label>
            <input type="text" placeholder="Enter city" name="City" value="<?php echo $City; ?>" required><br><br>
            <label>PostalCode: </label>
            <input type="text" placeholder="Enter postal code" name="PostalCode" value="<?php echo $PostalCode; ?>" required><br><br>
            <label>Country: </label>
            <input type="text" placeholder="Enter country" name="Country" value="<?php echo $Country; ?>" required><br><br>
            <button class="btn btn-success" type="submit" value="Update">Update</button>
            <button class="btn btn-primary" onclick="window.location.href='index.php'">Close</button>
           
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $CustomerID = $_POST['CustomerID'];
    $CustomerName = $_POST['CustomerName'];
    $ContactName = $_POST['ContactName'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $PostalCode = $_POST['PostalCode'];
    $Country = $_POST['Country'];

    $sql = "UPDATE tbl_customer
            SET CustomerName = '$CustomerName', ContactName = '$ContactName', Address = '$Address', City = '$City', PostalCode = '$PostalCode', Country = '$Country'
            WHERE CustomerID = $CustomerID";

    if ($con->query($sql) === TRUE) {
        // Redirect back to the previous page after updating
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>

