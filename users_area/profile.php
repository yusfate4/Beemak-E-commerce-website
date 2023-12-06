<!-- connect to file -->
<?php
include('../assets/includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <link rel="stylesheet" href="../style.css" />
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/15df32d772.js" crossorigin="anonymous"></script>

</head>
<style>
    .profile_img {
        width: 90%;
        /* height: 100%; */
        margin: auto;
        display: block;
        object-fit: contain;
    }

    .edit_image {
        width: 100px;
        height: 100px;
        object-fit: contain;

    }
</style>

<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First child  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img class="logo" src="../assets/img/beemak_logo.png" alt="" />
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price: $<?php total_cart_price(); ?> </a>
                        </li>



                    </ul>
                </nav>
                <form class="d-flex" action="../search_product.php" method="get">
                    <input type="search" class="form-control me-2" name="search_data" placeholder="Search" aria-label="Search">
                    <input type="submit" value="Search" class='btn btn-outline-light' name="search_data_product">

                </form>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <!-- <li class="nav-item">
          <a class="nav-link" href="">Welcome Guest</a>
        </li> -->
                <!-- welcome guest -->
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

                // login and logout
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

        <!-- Fourth child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav text-center bg-secondary" style="height:100vh" ;>
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#">
                            <h4>Your Profile </h4>
                        </a>
                    </li>

                    <?php
                    $username = $_SESSION['username'];
                    $user_image = "Select * from `user_table` where username = '$username'";
                    $user_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($user_image);
                    $user_image = $row_image["user_image"];
                    echo "<li class='nav-item'>
                    <img src='./users_area/user_images/$user_image' class='profile_img my-4'>
                </li>";
                    ?>

                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php">
                            Your Pending Orders
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?edit_account">
                            Edit Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?my_orders">
                            My Orders
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?delete_account">
                            Delete Account
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="logout.php">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php
                get_user_order_details();
                if (isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('user_orders.php');
                }
                if (isset($_GET['delete_account'])) {
                    include('delete_account.php');
                }
                ?>

            </div>
        </div>

        <!-- last child -->
        <!-- Include footer -->
        <?php
        include('../assets/includes/footer.php');
        ?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>