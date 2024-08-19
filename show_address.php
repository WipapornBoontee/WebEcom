<?php

include 'condb.php';
session_start();

$u_name = $_GET['u_name'];

$sql = "SELECT * FROM `tb_user` WHERE u_name = '$u_name'";
$re = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php
    if ($re = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_array($re)) {
    ?>

            <div class="container" style="margin-top:50px;">
                    <h3 style="text-align: center;">ข้อมูลผู้สั่งซื้อ</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>รหัสสมาชิก</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>อีเมล</th>
                                <th>ที่อยู่</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td><?= $row['u_id'] ?></td>
                                <td><?= $row['u_name'] ?></td>
                                <td> <?= $row['u_fname'] ?></td>
                                <td><?= $row['u_lname'] ?></td>
                                <td><?= $row['u_email'] ?></td>
                                <td> <?= $row['u_address'] ?></td>
                                <td><?= $row['role'] ?></td>
                            </tr>

                        </tbody>

                    </table>
                </div>
    <?php
        }
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>