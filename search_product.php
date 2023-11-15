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
              <a href="" class="nav-link">Welcome Guest</a>
            </li>
          </ul>
        </nav>
        <form class="d-flex" action="" method="get" >
          <input type="search" class="form-control me-2" name="search_data" placeholder="Search" aria-label="Search">
          <input type="submit" value="Search" class='btn btn-outline-light' name="search_data_product">

        </form>
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
          search_product();
          get_unique_categories();
          get_unique_brands();

          ?>
        </div>
      </div>
      <div class="col md-2 bg-secondary p-0">
        <!-- sidebar -->
        <!-- brands  to be displayed-->
        <ul class="navbar-nav me-auto">
          <li class="nav-item bg-info text-center">
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
          <li class="nav-item bg-info text-center">
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
    <div class="bg-info p-3 text-center footer">
      <p>Beemak @ 2023</p>
    </div>
  </div>

  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>