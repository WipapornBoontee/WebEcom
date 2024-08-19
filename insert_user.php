<?php 
include 'condb.php';

$u_name = $_POST['u_name'];
$u_pass = $_POST['u_pass'];
$u_fname = $_POST['u_fname'];
$u_lname = $_POST['u_lname'];
$u_email = $_POST['u_email'];
$u_address = $_POST['u_address'];

$sql = "INSERT INTO `tb_user`( `u_name`, `u_pass`, `u_fname`, `u_lname`, `u_email`, `u_address`, `role`) 
VALUES ('$u_name','$u_pass','$u_fname','$u_lname','$u_email','$u_address','user')";

$result = mysqli_query($con , $sql);

if($result){
    echo "สมัครสำเร็จ";
    header("location: frm_login.php");
}else{
    echo "สมัครไม่สำเร็จ";
}


?>