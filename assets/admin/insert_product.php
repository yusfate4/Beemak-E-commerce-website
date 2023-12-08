<?php
include('../includes/connect.php');

// Insert product data into the database
if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    //   Access the images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // Accessing img tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Checking the empty conditions
    if (
        $product_title == '' ||  $description == '' ||
        $product_keywords == '' || $product_category == ''
        || $product_brands == '' ||  $product_price == '' ||
        $product_image1 == '' ||   $product_image2 == '' ||
        $product_image3 == ''
    ) {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, './product_images/' . $product_image1);
        move_uploaded_file($temp_image2, './product_images/' . $product_image2);
        move_uploaded_file($temp_image3, './product_images/' . $product_image3);

        // insert query
        $insert_products = "insert into `products` (product_title,
        product_description,product_keywords,category_id,
        brand_id, product_image1, product_image2, 
        product_image3, product_price,date, status) values ('$product_title',
        '$description', '$product_keywords', '$product_category', '$product_brands',
        '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";
        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('Successfully inserted the products')</script>";
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product-Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
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

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <img style="width: 10%" src="../img/beemak_logo.png" alt="Beemak Logo" />

            <!-- <img class="logo" src="../img/beemak_logo.png" alt=""> -->
            <nav class="navbar navbar-expand-lg ">
                <ul class="navbar-nav ">

                    <li class="nav-item">
                        <a href="insert_product.php" class="nav-link">Insert Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?insert_category" class="nav-link">Insert Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?insert_brand" class="nav-link">Insert Brand</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome Guest</a>
                    </li>

                </ul>

            </nav>
        </div>
    </nav>

    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method='post' enctype="multipart/form-data">
            <!-- Title  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id='product_title' class='form-control' placeholder="Enter Product Title" required autocomplete="off">
            </div>

            <!-- Description  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id='description' class='form-control' placeholder="Enter Product Description" required autocomplete="off">
            </div>


            <!-- Keyword  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id='product_keywords' class='form-control' placeholder="Enter Product Keywords" required autocomplete="off">
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class='form-select'>
                    <option value="">
                        Select Category
                    </option>

                    <?php
                    // Select categories
                    $select_query = "Select * from categories";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>


            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class='form-select'>
                    <option value="">
                        Select Brand
                    </option>


                    <?php
                    // Select brands
                    $select_query = "Select * from brands";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- image 1  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id='product_image1' class='form-control' required>
            </div>


            <!-- image 2  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id='product_image2' class='form-control' required>
            </div>


            <!-- image 3  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id='product_image3' class='form-control' required>
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id='product_price' class='form-control' placeholder="Enter Product Price" required autocomplete="off">
            </div>

            <!-- Submit button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name='insert_product' value='Insert Products' class='btn delivery-bg text-light btn-info mb-3 px-3'>
            </div>

        </form>
        </div>

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

</body>

</html>