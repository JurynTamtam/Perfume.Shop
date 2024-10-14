<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            position: relative;
        }
        .container h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
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
        <h2>Customer Registration Form</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter customer name" name="CustomerName" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter contact name" name="ContactName" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter address" name="Address" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter city" name="City" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter postal code" name="PostalCode" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter country" name="Country" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter username" name="username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter password" name="password" required>
            </div>
            <button class="btn-submit" type="submit">Submit</button>
            <button class="btn-close" type="button" onclick="window.location.href='index.php'">Close</button>
        </form>
    </div>
</body>
</html>

<?php
include_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CustomerName = $_REQUEST['CustomerName'];
    $ContactName = $_REQUEST['ContactName'];
    $Address = $_REQUEST['Address'];
    $City = $_REQUEST['City'];
    $PostalCode = $_REQUEST['PostalCode'];
    $Country = $_REQUEST['Country'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    
    $sql = "INSERT INTO tbl_customer (CustomerName, ContactName, Address, City, PostalCode, Country, username, password)
            VALUES('$CustomerName', '$ContactName', '$Address', '$City', '$PostalCode', '$Country', '$username', '$password')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";

    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
