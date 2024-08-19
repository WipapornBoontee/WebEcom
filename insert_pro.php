<?php 
include 'condb.php';
session_start();

$p_name = $_POST['p_name'];
$p_num = $_POST['p_num'];
$p_price = $_POST['p_price'];
$description = $_POST['description'];
// $p_type = $_POST['p_type'];

$detail = "uploads/";
$target_file = $detail . ($_FILES["detail"]["name"]);
$filetype = pathinfo($target_file,PATHINFO_EXTENSION);

$sql = "INSERT INTO `tb_product`(`p_name`, `description`, `p_price`, `detail` , `p_num` ) 
VALUES ('$p_name','$description','$p_price','$target_file' , '$p_num' )";
$re = mysqli_query($con , $sql);

if($re){
    move_uploaded_file($_FILES['detail']['tmp_name'], $target_file);
    echo "สำเร็จ";
    header("location: product_page.php");
} else {
    echo "ไม่สำเร็จ: " . mysqli_error($con);
}


?>