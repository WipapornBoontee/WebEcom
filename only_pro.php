<?php

include 'condb.php';
session_start();

$p_id = $_GET['p_id'];
$sql = "SELECT * FROM `tb_product` WHERE p_id = '$p_id'";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error: " . mysqli_error($con));
}

$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <!--  -->
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_page.php">หน้าหลัก</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ตัวเลือกสำหรับผู้ดูแลระบบ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="product_page.php">ดูแลสินค้า</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">จัดการคำสั่งซื้อ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">เพิ่มสินค้าใหม่</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">แก้ไขสินค้า</a>
                        </li>
                    </ul>
                    <div style="text-align: center;padding-top: 110%;">
                        <a href="frm_register.php" class="btn btn-outline-secondary">ออกจากระบบ</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--  -->
    <div class="container">
        <div class="text-center d-flex flex-row" style="margin-top: 100px; align-items: center;">
            <div class="flex-fill">
                <img src="<?= $row['detail'] ?>" alt="" style="width: 400px; border-radius: 3%;">
            </div>
            <div class="flex-fill">
                <div class="d-flex justify-content-start">
                    <h2>สินค้า : <?= $row['p_name'] ?></h2>
                </div>
                <div class="d-flex justify-content-start">
                    <p style="margin-top: 10px;">ราคา: <?= $row['p_price'] ?></p>
                </div>
                <div class="d-flex justify-content-start">
                    <p style="margin-bottom: 100px;">รายละเอียดสินค้า: <?= $row['description'] ?></p>
                </div>

                <a href="frm_edit.php?p_id=<?= $row['p_id'] ?>" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                    <img src="https://cdn-icons-png.flaticon.com/256/1159/1159633.png" alt="" style="width: 20px;"> แก้ไขสินค้า
                </a>
                <a href="delete.php?p_id=<?= $row['p_id'] ?>" class="btn btn-danger mx-5">ลบสินค้า</a>
                <br>
                <br>
                <a href="admin_page.php"  class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                    <img src="https://cdn-icons-png.flaticon.com/256/93/93634.png" alt="" style="width: 25px;"> กลับหน้าหลัก
                </a>


            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>