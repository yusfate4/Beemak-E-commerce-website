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
</style>

<body>
    <div class="container-fluid my-3">
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
                        <input type="submit" value="Login" class="bg-info px-3 py-2 border-0" name="user_login">
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