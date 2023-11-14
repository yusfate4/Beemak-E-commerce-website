<?php

$con = mysqli_connect("localhost", "root", "", "beemak_store");
if (!$con) {
    die(mysqli_error($con));
}
