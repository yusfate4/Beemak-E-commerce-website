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
     <title>Admin Dashboard</title>
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
 </style>


 <body>
     <!-- Navbar -->
     <div class="container-fluid p-0">
         <!-- First child  -->
         <nav class="navbar navbar-expand-lg navbar-light">
             <div class="container-fluid">
                 <!-- <img class="logo" src="/assets/img/beemak_logo.png" alt="" /> -->
                 <img style="width: 10%" src="assets/img/beemak_logo.png" alt="Beemak Logo" />

                 <nav class="navbar navbar-expand-lg">
                     <ul class="navbar-nav">
                         <!-- <li class="nav-item">
                             <a href="" class="nav-link">Welcome Guest</a>
                         </li> -->

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
                             <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
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
         <div class="row px-1">
             <div class="col-md-10">
                 <!-- products -->
                 <div class="row">


                     <!-- Inserting the data from the database -->

                     <?php
                        // calling functions
                        view_details();
                        get_unique_categories();
                        get_unique_brands();

                        ?>
                 </div>
             </div>
             <div class="col md-2 bg-secondary p-0">
                 <!-- sidebar -->
                 <!-- brands  to be displayed-->
                 <ul class="navbar-nav me-auto">
                     <li class="nav-item delivery-bg text-center">
                         <a href="#" class="nav-link text-light">
                             <h4>Delivery Brands</h4>
                         </a>
                     </li>

                     <!-- Fetch data from database for brands -->
                     <?php
                        getbrands();
                        ?>


                 </ul>

                 <!-- categories to be displayed -->
                 <ul class="navbar-nav me-auto">
                     <li class="nav-item category-bg text-center">
                         <a href="#" class="nav-link text-light">
                             <h4>Categories</h4>
                         </a>
                     </li>


                     <!-- Fetch data from database for categories -->
                     <?php
                        getcategories();
                        ?>

                 </ul>
             </div>
         </div>

         <!-- last child -->
         <!-- Include footer -->

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
                 <img src="assets/img/pay/pay.png" alt="" />
             </div>

             <!-- <div class="copyright1">
      <p>@ 2023, Beemak Foods</p>
    </div> -->
         </footer>
         <!-- ============ FOOTER SECTION END ============== -->

     </div>

     <!-- bootstrap js link -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 </body>

 </html>