<?php 

$con = mysqli_connect('localhost','root','','ecom_project2');

if($con){
    // echo "เชื่อมต่อสำเร็จ";
}else{
    echo "เชื่อมต่อไม่สำเร็จ" . mysqli_connect_error();
}


?>