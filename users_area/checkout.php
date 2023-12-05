<!-- connect to file -->
<?php
include('../assets/includes/connect.php');
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
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </nav>
                <form class="d-flex" action="search_product.php" method="get">
                    <input type="search" class="form-control me-2" name="search_data" placeholder="Search" aria-label="Search">
                    <input type="submit" value="Search" class='btn btn-outline-light' name="search_data_product">

                </form>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
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
                    <a class='nav-link' href='./user_login.php'>Login</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Logout</a>
                </li>";
                }

                ?>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="">Login</a>
                </li> -->
            </ul>
        </nav>




        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Beemak Store</h3>
            <p class="text-center">Oasis of food</p>
        </div>

        <!-- fourth child -->
        <div class="row px-1">
            <div class="col-md-12">
                <!-- products -->
                <div class="row">
                    <?php
                    if (!isset($_SESSION['username'])) {
                        include('user_login.php');
                    } else {
                        include('payment.php');
                    }

                    ?>
                </div>
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