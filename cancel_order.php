<?php
include 'condb.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $o_id = $_GET['o_id'];

    $sql = "DELETE FROM `tb_order` WHERE o_id = '$o_id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Order cancelled successfully";
        header("location: order_page.php");
    } else {
        echo "Failed to cancel order: " . mysqli_error($con);
        header("location: order_page.php");
    }
    header("location: order_page.php");
    exit();
}
