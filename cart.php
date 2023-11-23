<!-- connect to file -->
<?php
include('assets/includes/connect.php');
include('functions/common_function.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce- Cart Details</title>
    <link rel="stylesheet" href="style.css" />
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/15df32d772.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First child  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img class="logo" src="/assets/img/beemak_logo.png" alt="" />
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>




                    </ul>
                </nav>

            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">



                <li class="nav-item">
                    <a class="nav-link" href="">Welcome Guest</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">Login</a>
                </li>
            </ul>
        </nav>

        <!-- calling the cart function -->
        <?php
        cart();
        ?>



        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Beemak Store</h3>
            <p class="text-center">Oasis of food</p>
        </div>

        <!-- fourth child -->
        <div class="container">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- php code to display dynamic data -->
                        <?php

                        global $con;
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `card_details` where ip_address = '$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "Select * from `products` where product_id = '$product_id'";
                            $result_products =  mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total_price += $product_values;

                        ?>





                                <tr>
                                    <td> <?php echo $product_title ?></td>
                                    <td><img style="width:80px; height:80px; object-fit: contain;" class="cart_img" src="assets/img/<?php echo $product_image1 ?>"></td>
                                    <td><input type="text" name="" class="form-input w-50"> </td>
                                    <td><?php echo $price_table ?></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>
                                        <button class="bg-info mx-3 px-3 py-2 border-0">
                                            Update
                                        </button>
                                        <button class="bg-info mx-3 px-3 py-2 border-0">Remove</button>

                                    </td>
                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex mb-5">
                    <h4 class="px-3">
                        Subtotal: <strong class="text-info"><?php echo $total_price ?></strong>
                    </h4>
                    <a href="index.php"><button class="bg-info mx-3 px-3 py-2 border-0">Continue Shopping</button></a>
                    <a href="#"><button class="bg-secondary p-3 py-2 border-0 text-light">Checkout</button></a>

                </div>
            </div>
        </div>




        <!-- last child -->
        <!-- Include footer -->
        <?php
        include('assets/includes/footer.php');
        ?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>