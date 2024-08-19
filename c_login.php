<?php 
include 'condb.php';
session_start();

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    // รับค่าจากแบบฟอร์มมา post
    $u_name = $_POST['u_name'];
    $u_pass = $_POST['u_pass'];

    $sql = "SELECT * FROM `tb_user` WHERE u_name = '$u_name' and u_pass = '$u_pass'";
    $re = mysqli_query($con ,$sql);
    $row = mysqli_fetch_array($re);

    if (mysqli_num_rows($re) == 1 ){
        $_SESSION['u_name'] = $row ['u_name'];
        $_SESSION['u_pass'] = $row ['u_pass'];
        $_SESSION['role'] = $row ['role'];

        if($row ['role'] == 'admin'){
            header("Location: admin_page.php");
            exit();
        }else if ($row ['role'] == 'user'){
            header("location: user_page.php");
            exit();

        }
    }else{
        echo "ล็อคอินไม่สำเร็จ";
        header("location: frm_login.php");
        exit();

    }
}

?>