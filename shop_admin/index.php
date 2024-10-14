<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<title>ScentShop</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button" id="productnav">Product</a>
  <a href="#" class="w3-bar-item w3-button" id="customernav">Customer</a>
  <a href="#" class="w3-bar-item w3-button" id="cartnav">Cart</a>
  <a href="logout.php" class="w3-bar-item btn btn-danger">Logout</a>
</div>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <h1>Admin Dashboard</h1>
        
        
  </div>
</div>


<div class="w3-container">
  <div id="product">
    <?php 
        include 'view-product.php';
     ?>
  </div>
  <div id="customer">
    <?php 
        include 'customer.php';
     ?>
  </div>
  <div id="cart">
    <?php 
        include 'admin-cart.php';
     ?>
  </div>

 
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

$(document).ready(function(){
  $("#product").show();
  $("#customer").hide();
  $("#cart").hide();

  $("#productnav").click(function(){
    $("#product").show();
    $("#customer").hide();
    $("#cart").hide();
  });
 $("#customernav").click(function(){
    $("#product").hide();
    $("#customer").show();
    $("#cart").hide();
  }); 

 $("#cartnav").click(function(){
    $("#product").hide();
    $("#customer").hide();
    $("#cart").show();
  });
});
</script>
     
</body>
</html>
