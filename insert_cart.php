<?php 
include 'condb.php';
session_start();

if (!isset($_SESSION['u_name'])) {
    header("Location: login.php");
    exit();
}

// เรียกใช้ค่าจากฟอร์ม
$p_id = $_POST['p_id'];
$p_num = $_POST['p_num'];

$u_name = $_SESSION['u_name'];

$sql = "INSERT INTO `tb_order`(`u_name`, `p_id`, `p_num`) VALUES ('$u_name', '$p_id', '$p_num')";
$result = mysqli_query($con, $sql);

if ($result) {
    echo "Order successful";
    header("location: user_page.php");
} else {
    echo "Order failed: " . mysqli_error($con);
}

mysqli_close($con);
?>
