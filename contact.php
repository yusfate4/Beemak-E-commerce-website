<!-- connect to file -->
<?php
include('assets/includes/connect.php');
include('functions/common_function.php');

session_start();

// include('assets/includes/footer.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beemak E-commerce</title>
    <!-- <link rel="stylesheet" href="assets/css/shop.css" />
    <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/15df32d772.js" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/15df32d772.js"></script>
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

    /* ============= CONTACT PAGE SECTION START ================== */
    #contact-details {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    #contact-details .details {
        width: 40%;
    }

    #contact-details .details span,
    #form-details form span {
        font-size: 20px;
    }

    #contact-details .details h2,
    #form-details form h2 {
        font-size: 26px;
        line-height: 35px;
        padding: 20px 0;
    }

    #contact-details .details h3 {
        font-size: 16px;
        padding-bottom: 15px;
    }

    #contact-details .details li {
        list-style: none;
        display: flex;
        padding: 10px 0;
    }

    #contact-details .details li i {
        font-size: 14px;
        padding-right: 22px;
    }

    #contact-details .details li p {
        margin: 0;
        font-size: 14px;
    }

    #contact-details .map {
        width: 55%;
        height: 400px;
    }

    #contact-details .map iframe {
        width: 100%;
        height: 100%;
    }

    /* ============= ABOUT PAGE SECTION END ================== */
    .section-p1 {
        padding: 40px 80px;
    }

    .section-m1 {
        margin: 40px 0;
    }


    /* ============= FORM DETAILS SECTION START ================== */
    #form-details form {
        display: flex;
        width: 100%;
        flex-direction: column;
        align-items: flex-start;
    }

    #form-details form input,
    #form-details form textarea {
        width: 100%;
        padding: 12px 15px;
        outline: none;
        margin-bottom: 20px;
        border: 1px solid var(--primary);
    }

    @media (max-width: 790px) {
        #form-details form {
            /* width: 50%; */
            margin: 0 auto;
        }
    }

    @media (max-width: 478px) {
        #contact-details {
            flex-direction: column;
        }

        #contact-details .details {
            width: 100%;
            margin-bottom: 30px;
        }

        #contact-details .map {
            width: 100%;
        }

        #form-details form {
            width: 100%;
            margin-bottom: 30px;
        }
    }


    /* ============= ABOUT PAGE SECTION START ================== */
    /* ============= PAGE HEADER SECTION START ================== */
    #page-header {
        background-image: url("assets/img/banner/b1.webp");
        width: 100%;
        height: 40vh;
        background-size: cover;
        display: flex;
        justify-content: center;
        text-align: center;
        flex-direction: column;
        /* border: 2px solid red; */
        padding: 14px;
    }

    #page-header h2,
    #page-header p {
        color: var(--secondary);
    }

    /* #page-header.about-header {
        background-image: url("assets/img/banner/b1.webp");
    } */

    #about-head {
        display: flex;
        /* border: 2px solid red; */
        /* flex-direction: column; */
    }

    #about-head div {
        padding-right: 40px;

    }

    #about-head img {
        width: 50%;
        height: auto;
    }

    @media (max-width: 477px) {
        #about-head {
            flex-direction: column;
        }

        #about-head img {
            width: 100%;
            margin-top: 20px;
        }

        #about-head div {
            padding-right: 0px;
        }
    }


    /* ============= NEWSLETTER START ================== */
    #newsletter {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        align-items: center;
        background-image: url("img/banner/b14.png");
        background-repeat: no-repeat;
        background-position: 20% 30%;
        background-color: #041e42;
    }

    #newsletter .form {
        display: flex;
        width: 40%;
    }

    #newsletter h4 {
        font-size: 22px;
        font-weight: 700;
        color: #fff;
    }

    #newsletter p {
        font-size: 14px;
        font-weight: 600;
        color: #818ea0;
    }

    #newsletter p span {
        color: #ffbd27;
    }

    #newsletter input {
        font-size: 14px;
        height: 3.125rem;
        padding: 0 1.25em;
        width: 100%;
        border: 1px solid transparent;
        border-radius: 4px;
        outline: none;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    #newsletter button {
        background-color: #088187;
        color: #fff;
        white-space: nowrap;
        border: none;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
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

    /* ============= FOOTER END ================== */
</style>

<body>
    <!-- ============ NAV BAR START ============== -->
    <section id="header">
        <!-- Navbar -->
        <div class="container-fluid p-0">
            <!-- First child  -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <!-- <a href="index.php">
          </a> -->
                    <img style="width: 10%" src="assets/img/beemak_logo.png" alt="Beemak Logo" />
                    <!-- <img class="logo" src="/assets/img/beemak_logo.png" alt="" /> -->
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="display_all.php">Products</a>
                            </li>

                            <?php
                            if (isset($_SESSION['username'])) {
                                echo " <li class='nav-item'>
              <a class='nav-link' href='./users_area/profile.php'>My Account</a>
            </li> ";
                            } else {
                                echo " <li class='nav-item'>
              <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
            </li> ";
                            }
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Total price: $<?php total_cart_price(); ?> </a>
                            </li>



                        </ul>
                    </nav>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input type="search" class="form-control me-2" name="search_data" placeholder="Search" aria-label="Search">
                        <input type="submit" value="Search" class='search-btn btn btn-outline-light' name="search_data_product">

                    </form>
                </div>
            </nav>

            <!-- second child -->
            <nav class="navbar navbar-expand-lg navbar-dark">
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


    </section>
    <!-- ============ NAV BAR END ============== -->

    <!-- ============ HERO SECTION START ============== -->
    <section id="page-header" class="about-header">
        <p>Leave a message for us, we are always available</p>
    </section>
    <!-- ============ HERO SECTION END ============== -->

    <!-- ============ CONTACT DETAILS SECTION START ============== -->
    <section id="contact-details" class="section-p1">
        <div class="details reveal">
            <span>Get in Touch</span>
            <h2>Visit us today or contact us</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fa-solid fa-map-pin"></i>
                    <p>12b, Ogunleye Eyinta, Lagos, Nigeria</p>
                </li>

                <li>
                    <i class="fa-regular fa-envelope"></i>
                    <p>beemakfoods@gmail.com</p>
                </li>

                <li>
                    <i class="fa-solid fa-phone"></i>
                    <p>+2348174485504</p>
                </li>

                <li>
                    <i class="fa-regular fa-clock"></i>
                    <p>Monday to Sunday: 10:00 to 20:00</p>
                </li>
            </div>
        </div>

        <div class="map reveal">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253630.6973179563!2d3.394376781108143!3d6.649444343326612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bee62d44ab573%3A0x44ddf6ea18edfcb3!2sIkorodu%2C%20Lagos!5e0!3m2!1sen!2sng!4v1698928605602!5m2!1sen!2sng" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!-- ============ CONTACT DETAILS SECTION END ============== -->

    <!-- ============ CONTACT FORM DETAILS SECTION START ============== -->
    <section id="form-details" class="section-p1 reveal">
        <form action="" class="reveal">
            <span>Leave a message</span>
            <h2>We are here to help you</h2>
            <input type="text" placeholder="Your Name" />
            <input type="text" placeholder="E-mail" />
            <input type="text" placeholder="Subject" />
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button class="normal">Send Message</button>
        </form>
    </section>
    <!-- ============ CONTACT FORM DETAILS SECTION END ============== -->

    <!-- ============ NEWSLETTER SECTION START ============== -->
    <section id="newsletter" class="section-p1 section-m1 reveal">
        <div class="newstext">
            <h4>Subscribe to our emails</h4>
            <p>
                Be the first to know about new products and
                <span>exclusive offers.</span>
            </p>
        </div>
        <div class="form">
            <input type="text" placeholder="Email" />
            <button class="normal">Sign Up</button>
        </div>
    </section>
    <!-- ============ NEWSLETTER SECTION END ============== -->

    <!-- ============ FOOTER SECTION START ============== -->
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
            <img src="img/pay/pay.png" alt="" />
        </div>

        <div class="copyright">
            <p>@ 2023, Beemak Foods</p>
        </div>
    </footer>
    <!-- ============ FOOTER SECTION END ============== -->

    <script src="../js/script.js"></script>
</body>

</html>