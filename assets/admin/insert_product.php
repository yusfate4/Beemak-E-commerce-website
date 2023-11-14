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
        move_uploaded_file($temp_image1, './product_images/$product_image1');
        move_uploaded_file($temp_image2, './product_images/$product_image2');
        move_uploaded_file($temp_image3, './product_images/$product_image3');

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

<body class="bg-light">
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
                <input type="submit" name='insert_product' value='Insert Products' class='btn btn-info mb-3 px-3'>
            </div>

        </form>
    </div>

</body>

</html>