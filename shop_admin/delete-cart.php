<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $cartID = $_GET['id'];

    $sql = "DELETE FROM tbl_cart WHERE cartID = $cartID";
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
