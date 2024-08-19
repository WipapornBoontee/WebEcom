<?php

include 'condb.php';
session_start();

$p_id = $_GET['p_id'];

$sql = "DELETE FROM `tb_product` WHERE p_id = $p_id";

$re = mysqli_query($con , $sql);

if($re){
    echo "ลบสำเร็จ";
    header("location: product_page.php");
}else{
    echo "ไม่ได้";
    header("location: product_page.php");

}


?>