<?php
include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // select data from database
    $select_query = "Select * from brands where brand_title = '$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This Brand is present in the database')</script>";
    } else {


        $insert_query = "insert into brands (brand_title) values ('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
    }
}
?>

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
</style>

<h2 class="text-center">Insert Brands</h2>


<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text delivery-bg text-light" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" name="brand_title" class="form-control" placeholder="Insert brands" aria-label="brands" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-2 w-10 m-auto">
        <input type="submit" name="insert_brand" class="border-0 p-2 my-3 delivery-bg text-light" value="Insert brands">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Brands </button> -->
    </div>
</form>