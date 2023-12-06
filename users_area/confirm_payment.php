<!-- connect to file -->
<?php
include('../assets/includes/connect.php');
// include('../functions/common_function.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "Select * from `user_orders` where order_id = $order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "insert into `user_payments` (order_id, invoice_number, amount, payment_mode) values ($order_id, $invoice_number, $amount, '$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if ($result) {
        echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }

    $update_orders = "update `user_orders` set order_status = 'Complete' where order_id = $order_id";
    $result_orders = mysqli_query($con,$update_orders);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <link rel="stylesheet" href="../style.css" />
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/15df32d772.js" crossorigin="anonymous"></script>

</head>

<body class='bg-secondary'>
    <div class="container my-5">
        <h1 class="text-center text-light">
            Confirm Payment
        </h1>
        <form action="" method='post'>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class='form-control w-50 m-auto' name='invoice_number' value="<?php echo $invoice_number ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <label class='text-light' for="">Amount</label>
                <input type="text" class='form-control w-50 m-auto' name='amount' value="<?php echo $amount_due ?>>
            </div>
            <div class=" form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class='form-select w-50 m-auto'>
                    <option>Paypal</option>
                    <option>Paystack</option>
                    <option>Cash on Delivery</option>
                    <option>Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="Submit" value="Confirm" name="confirm_payment" class='bg-info py-2 px-3 border-0'>
            </div>

        </form>
    </div>

</body>

</html>