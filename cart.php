<!-- connect to file -->
<?php
include('assets/includes/connect.php');
include('functions/common_function.php');
session_start();

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
<style>
    :root {
        /* --primary: #636afa; */
        /* --primary: #4caf50; */
        --primary: #041e42;
        --secondary: #ffffff;
        /* --brown: #795548; */
        --brown: #02b388;
        --gray: #757575;
        --aqua: #4dd0e1;
        --red: #ff5722;
    }

    .delivery-bg,
    .category-bg {
        background-color: var(--primary);

    }

    .navbar {
        background-color: var(--primary);
    }

    .nav-link {
        color: var(--secondary);
        /* margin-left: 10px; */

    }

    .navbar li a:hover,
    .navbar li a.active {
        background-color: var(--brown);
        border-radius: 5px;
    }

    .search-btn {
        /* border: 3px solid red; */
        padding: 10px 25px;

    }

    .search-btn:hover {
        background-color: var(--brown);
        border: none;
        color: var(--secondary);
    }

    .navbar-dark {
        background-color: var(--brown);
    }

    .navbar-dark li a:hover {
        background-color: var(--primary);
    }


    .section-p1 {
        padding: 40px 80px;
    }

    .section-m1 {
        margin: 40px 0;
    }
</style>

<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First child  -->
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
        <img style="width: 10%" src="assets/img/beemak_logo.png" alt="Beemak Logo" />

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                    </ul>
                </nav>

            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <ul class="navbar-nav me-auto">

                <?php
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                      <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
                  </li>";
                }


                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";
                }

                ?>
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
                <form action="" method="post">
                    <table class="table table-bordered text-center">


                        <!-- php code to display dynamic data -->
                        <?php

                        // global $con;
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo " <thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                ";

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
                                        <td><img style="width:80px; height:80px; object-fit: contain;" class="cart_img" src="assets/admin/product_images/<?php echo $product_image1 ?>"></td>
                                        <td><input type="text" name="qty" class="form-input w-50"> </td>
                                        <?php
                                        $get_ip_add = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $update_cart = "update `cart_details` set quantity = $quantities where ip_address = '$get_ip_add'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantities;
                                        }

                                        ?>
                                        <td> $<?php echo $price_table ?></td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <input type="submit" value="Update Cart" class="delivery-bg text-light mx-3 px-3 py-1 border-0" name="update_cart">
                                            <input type="submit" value="Remove Cart" class="delivery-bg text-light mx-3 px-3 py-1 border-0" name="remove_cart">
                                            <!-- <button class="bg-info mx-3 px-3 py-2 border-0">Remove</button> -->

                                        </td>
                                    </tr>
                        <?php }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart is empty!</h2>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- subtotal -->
                    <div class="d-flex mb-5">
                        <?php

                        $get_ip_add = getIPAddress();
                        $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "
                     <h4 class='px-3'>
                            Subtotal: <strong class='text-info'>$ $total_price </strong>
                        </h4>
                        <input type='submit' value='Continue Shopping' class='delivery-bg text-light mx-3 px-3 py-2 border-0' name='continue_shopping'>

                        <button class='bg-secondary p-3 py-2 border-0 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                        } else {
                            echo " <input type='submit' value='Continue Shopping' class='delivery-bg text-light mx-3 px-3 py-2 border-0' name='continue_shopping'> ";
                        }

                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }

                        ?>

                    </div>
            </div>
        </div>
        </form>
        <!-- function to remove items -->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "Delete from `cart_details` where product_id = $remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = remove_cart_item();

        ?>



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