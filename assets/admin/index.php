<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/15df32d772.js" crossorigin="anonymous"></script>
</head>

<style>
    body {
        overflow-x: hidden;
    }

    .admin_image {
        width: 25%;
        height: 10%;
        object-fit: contain;
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
        background-color: var(--primary);
        color: var(--secondary);
    }

    footer .col {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 20px;
        color: var(--secondary);

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
        /* color: #222; */
        margin-bottom: 10px;
        color: var(--secondary);

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
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First child  -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <img style="width: 10%" src="../img/beemak_logo.png" alt="Beemak Logo" />

                <!-- <img class="logo" src="../img/beemak_logo.png" alt=""> -->
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>

                </nav>
            </div>
        </nav>

        <!-- Second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">
                Manage details
            </h3>
        </div>

        <!-- Third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#">
                        <img src="../img/yus.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Dahud Yusuf</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light delivery-bg  my-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light delivery-bg  my-1">View products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light delivery-bg  my-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light delivery-bg  my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light delivery-bg  my-1">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light delivery-bg  my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light delivery-bg  my-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light delivery-bg  my-1">All payments</a></button>
                    <button><a href="" class="nav-link text-light delivery-bg  my-1">List users</a></button>
                    <button><a href="" class="nav-link text-light delivery-bg  my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child  -->
        <div class="container my-3">
            <?php
            if (isset($_GET["insert_category"])) {
                include("insert_categories.php");
            }

            if (isset($_GET["insert_brand"])) {
                include("insert_brands.php");
            }

            ?>
        </div>

        <!-- last child -->


        <footer class="section-p1 reveal">
            <div class="col">
                <!-- <img
          class="logo"
          style="width: 10%"
          src="img/bl.png"
          alt="beemak logo"
        /> -->
                <h4>Contact</h4>
                <p>
                    <strong>Address: </strong>12b, Ogunleye Street, Eyita, Ikorodu, Lagos
                </p>
                <p><strong>Phone:</strong> +2348174485504</p>
                <p><strong>Hours:</strong> 8:00 - 20:00, Mon - Sun</p>
                <div class="follow">
                    <h4>Follow us</h4>
                    <div class="icon">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
            </div>

            <div class="col">
                <h4>About</h4>
                <a href="/assets/html/about.html">About us</a>
                <a href="#">Delivery Information</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="/assets/html/contact.html">Contact us</a>
            </div>

            <div class="col">
                <h4>My Account</h4>
                <a href="#">Sign In</a>
                <a href="/assets/html/cart.html">View Cart</a>
                <a href="#">My Wishlist</a>
                <a href="#">Track My Order</a>
                <a href="#">Help</a>
            </div>

            <div class="col install">
                <h4>Secured Payment Gateway</h4>
                <!-- <p>From App store or Google play</p> -->
                <!-- <div class="row">
          <img src="img/pay/app.jpg" alt="" />
          <img src="img/pay/play.jpg" alt="" />
        </div> -->
                <!-- <p>Secured Payment Gateway</p> -->
                <img src="../img/pay/pay.png" alt="" />
            </div>

            <!-- <div class="copyright1">
      <p>@ 2023, Beemak Foods</p>
    </div> -->
        </footer>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>