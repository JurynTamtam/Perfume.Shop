<?php
// Start session
session_start();

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    // Check if the customer is logged in
    if(isset($_SESSION['customerID'])) {
        // Retrieve customer ID from session
        $customerID = $_SESSION['customerID'];
        $productID = $_POST['productID'];
        $quantity = $_POST['quantity'];

        // Check if the product is already in the cart
        $sql_check_cart = "SELECT * FROM tbl_cart WHERE customerID = $customerID AND productID = $productID";
        $result_check_cart = mysqli_query($con, $sql_check_cart);

        if (mysqli_num_rows($result_check_cart) > 0) {
            // Update quantity if the product already exists in the cart
            $sql_update_cart = "UPDATE tbl_cart SET quantity = quantity + $quantity WHERE customerID = $customerID AND productID = $productID";
            mysqli_query($con, $sql_update_cart);
        } else {
            // Insert new product into the cart
            $sql_add_to_cart = "INSERT INTO tbl_cart (customerID, productID, quantity) VALUES ($customerID, $productID, $quantity)";
            mysqli_query($con, $sql_add_to_cart);
        }
    } else {
        // If the user is not logged in, redirect to login page
        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scent Sanctuary Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lobster&display=swap">

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myList li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            $(".addtocart").click(function() {
                var num = $(this).data("id");
                var productname = $("#scentname" + num).text();
                var price = $("#scentprice" + num).text();
                var unit = $("#scentunit" + num).attr("name");
                var image = $("#scentimage" + num).attr("src");

                $("#scentname").text(productname);
                $("#scentprice").text("Php " + price + "/" + unit);
                $("#scentimage").attr("src", image);
                $("#scentunit").text(unit + "/s");
                $("#price").val(price);
                $("#productID").val(num);
                $("#quantity").val(1);
                $("#total").text(price + " pesos");
                $("#cartModal").modal("show");

                calculateTotal();
            });

            $("#quantity").change(function() {
                calculateTotal();
            });

            function calculateTotal() {
                var quantity = $("#quantity").val();
                var price = $("#price").val();
                var total = quantity * price;
                $("#total").text(total + " pesos");
            }

            $("#addToCartForm").submit(function(e) {
                e.preventDefault();
                var productID = $("#productID").val();
                var productname = $("#scentname").text();
                var price = $("#price").val();
                var quantity = $("#quantity").val();

                $.post("product.php", {
                    add_to_cart: true,
                    productID: productID,
                    productname: productname,
                    price: price,
                    quantity: quantity
                }, function() {
                    window.location.href = "cart.php";
                });
            });
        });
    </script>

    <style type="text/css">
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
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .card img {
            height: 100%;
            object-fit: cover;  
        }
        @media (max-width: 768px) {
            .card img {
                height: 500px;
            }
        }
        @media (max-width: 576px) {
            .card img {
                height: 100%;
            }
            .card h4, .card p {
                font-size: 14px;
            }
            .btn {
                font-size: 12px;
            }
        }
        .navbar-brand img {
            max-height: 40px; /* Adjust based on your logo size */
            margin-right: 10px;
            border-radius: 20px;
        }
        .navbar-brand{
            max-height: 50px; /* Adjust based on your logo size */
            margin-right: 10px;
            border-radius: 20px;
        }
        body {
    font-family: Arial, sans-serif;
}

.search-section {
    margin: 20px;
}

.search-bar {
    position: relative;
    width: 300px; /* Adjust the width as needed */
}

.search-icon {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px; /* Adjust the size as needed */
    height: 20px; /* Adjust the size as needed */
}

.form-control1 {
    width: 100%;
    padding: 10px 10px 10px 40px; /* Adjust padding to make space for the icon */
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}
.pname{
    font-family: 'Lobster', cursive;
            font-weight: 200;
            font-size: 30px;
            color: black;
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
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="product.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
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
<br><br>
<section class="container-fluid bg-image"> 
    <div class="row">
        <div class="col-md-9">
        <section class="search-section">
        <div class="search-bar">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqLRqbzf7cgqwZPQJc-XNuNcDlMdhjyZM9MA&s" alt="search" class="search-icon">
            <input id="myInput" class="form-control1" type="text" placeholder="Search...">
        </div>
    </section>
            <ul id="myList" class="row">
                <?php
                include 'connect.php';

                $sql_product = "SELECT * FROM product";
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
                ?>        
                <li class="col-sm-6 col-lg-4 mt-3">
                    <div class="card h-100">
                        <div class="d-flex justify-content-center align-items-center">
                            <img id="scentimage<?php echo $productID; ?>" class="img-fluid card-img-top" src="<?php echo $image_url; ?>" alt="<?php echo $productname; ?>">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title pname" id="scentname <?php echo $productID; ?>"><?php echo $productname; ?></h4>
                            <p class="card-text">
                                <label><b>Php. </b></label>
                                <b><label id="scentprice<?php echo $productID; ?>"><?php echo $price; ?></label></b>
                                <b><label id="scentunit<?php echo $productID; ?>" name="piece"><?php echo $productunit; ?></label></b>
                            </p>
                            <label id="productdescription<?php echo $productID; ?>"><?php echo $productdescription; ?></label>
                            <button class="btn btn-primary addtocart" data-id="<?php echo $productID; ?>">Add to Cart</button>
                        </div>
                    </div>
                </li>
                <?php
                    }
                }
                ?>      
            </ul>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <img id="scentimage" class="img-fluid card-img-top" src="" alt="">
                </div>
                <h4 class="card-title" id="scentname"></h4>
                <div id="tohide">
                    <p class="card-text" id="scentprice"></p>
                    <input type="number" class="form-control mb-3" min="1" id="quantity" value="">
                    <span class="card-text" id="scentunit"></span>
                    <input type="hidden" id="price">
                    <input type="hidden" id="productID">
                    <form id="addToCartForm" method="post" action="product.php">
                        <button type="submit" class="btn btn-danger btn-block">Check Out</button>
                    </form>
                    <span class="text-xl">Total: <label id="total"></label></span> 
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
