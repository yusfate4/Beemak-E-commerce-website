<!-- connect to file -->
<?php
include('../assets/includes/connect.php');
include('../functions/common_function.php');
@session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/15df32d772.js" crossorigin="anonymous"></script>

</head>
<style>
    body {
        overflow-x: hidden;
    }

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


    /* ============= FOOTER START ================== */
    footer {
        display: flex;
        /* border: 2px solid red; */
        flex-wrap: wrap;
        justify-content: space-between;
    }

    footer .col {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    footer .logo {
        margin-bottom: 30px;
    }

    footer h4 {
        font-size: 14px;
        padding-bottom: 20px;
    }

    footer p {
        font-size: 13px;
        padding-bottom: 0 0 8px 0;
    }

    footer a {
        font-size: 13px;
        text-decoration: none;
        color: #222;
        margin-bottom: 10px;
    }

    footer .follow {
        margin-top: 20px;
    }

    footer .follow i {
        color: #465b53;
        padding-right: 4px;
        cursor: pointer;
    }

    footer .install .row {
        border: 1px solid #088178;
        border-radius: 6px;
    }

    footer .install img {
        margin: 10px 0 15px 0;
    }

    footer .follow i:hover,
    footer a:hover {
        color: #088178;
    }

    footer .copyright {
        width: 100%;
        text-align: center;
    }

    @media (max-width: 477px) {
        footer .copyright {
            text-align: start;
        }
    }
</style>

<body>
    <!-- <div class="container-fluid my-3"> -->
    <div class="container-fluid p-0">

        <!-- First child  -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!-- <img class="logo" src="/assets/img/beemak_logo.png" alt="" /> -->
                <img style="width: 10%" src="../assets/img/beemak_logo.png" alt="Beemak Logo" />

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                     <a href="" class="nav-link">Welcome Guest</a>
                 </li> -->

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../contact.php">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price: $<?php
                                                                        total_cart_price();
                                                                        ?> </a>
                        </li>



                    </ul>
                </nav>
                <form class="d-flex" action="search_product.php" method="get">
                    <input type="search" class="form-control me-2" name="search_data" placeholder="Search" aria-label="Search">
                    <input type="submit" value="Search" class='search-btn btn btn-outline-light' name="search_data_product">

                </form>
            </div>
        </nav>


        <!-- calling the cart function -->
        <?php
        cart();
        ?>
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required">
                    </div>


                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required">
                    </div>



                    <div class="text-center mt-4 pt-2">
                        <input type="submit" value="Login" class="delivery-bg text-light px-3 py-2 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger">Register</a> </p>
                    </div>


                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php
if (isset($_POST["user_login"])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "Select * from `user_table` where username = '$user_username'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();


    // cart items
    $select_query_cart = "Select * from `cart_details` where ip_address  = '$user_ip'";

    $select_cart = mysqli_query($con, $select_query_cart);
    $rows_count_cart = mysqli_num_rows($select_cart);
    if ($rows_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            if ($row_count == 1 and $row_count_cart) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('payment.php', '_self')</script>";
            }
            // echo "<script>alert('Login Successful')</script>";
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}


?>