<?php

include 'condb.php';
session_start();

$sql = "SELECT `p_id`, `p_name`, `p_price`, `detail`, `p_num`, `description`, `p_date`
FROM `tb_product` WHERE 1";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ดูแลสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!--  -->
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_page.php">หน้าหลัก</a>
            <a class="navbar-brand"><h3>คุณคือผู้ดูแลระบบ</h3></a>
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
                            <a class="nav-link active" aria-current="page" href="order_page.php">จัดการคำสั่งซื้อ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="frm_addpd.php">เพิ่มสินค้าใหม่</a>
                    </ul>
                    <div style="text-align: center;padding-top: 110%;">
                        <a href="logout.php" class="btn btn-outline-secondary">ออกจากระบบ</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--  -->

    <div class="container">
        <div style="margin-top: 100px;">
            <p style="text-align: center;font-size:large;">จัดการคลังสินค้า</p>

            <form class="d-flex" role="search" method="GET" action="search_admin_product.php">
        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">
            <img src="https://cdn-icons-png.flaticon.com/256/14874/14874201.png" alt="" width="18px;">
        </button>
    </form>
        </div>
    </div>
    <!--  -->
    <div class="container" style="margin-top:20px;">
        <a href="frm_addpd.php" class="btn btn-info mt-3" >เพิ่มสินค้าใหม่</a>
        <table class="table table-bordered mt-2">
            <thead>
                <tr class="text-center">
                    <th>รหัสสินค้า</th>
                    <th>รูปภาพสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>รายละเอียดสินค้า</th>
                    <th>ลงขายเมื่อวันที่</th>
                    <th>ราคา</th>
                    <th>การแก้ไขสินค้า</th>
                    <th>ลบสินค้า</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                if ($re = mysqli_query($con, $sql)) {
                    while ($row = mysqli_fetch_array($re)) {
                ?>
                        <tr>
                            <td><?= $row['p_id'] ?></td>
                            <td><img src="<?= $row['detail'] ?>" alt="" style="width: 100px;" class="img-fluid"></td>
                            <td><?= $row['p_name'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['p_date'] ?></td>
                            <td><?= $row['p_price'] ?></td>
                            <td>
                                <a href="frm_edit.php?p_id=<?= $row['p_id'] ?>" class="btn btn-warning btn-sm">แก้ไขสินค้า</a>
                            </td>
                            <td>
                                <a href="delete.php?p_id=<?= $row['p_id'] ?>" class="btn btn-danger btn-sm">ลบสินค้า</a>
                            </td>

                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>