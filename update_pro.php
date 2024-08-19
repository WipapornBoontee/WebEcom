<?php 
include 'condb.php';
session_start();

$p_id = $_POST['p_id'];
$p_name = $_POST['p_name'];
$description = $_POST['description'];
$p_price = $_POST['p_price'];
$p_num = $_POST['p_num'];

$sql = "UPDATE `tb_product` 
SET `p_name`='$p_name',`description`='$description',`p_price`='$p_price' , p_num =  '$p_num'
WHERE p_id = '$p_id'";

$re = mysqli_query($con , $sql);

if($re){
    echo "แก้ไขสำเร็จ";
    header("location: product_page.php");
}else{
    echo "ไม่สามารถแก้ไขได้" . mysqli_error($con);
    header("location: product_page.php");

}

?>