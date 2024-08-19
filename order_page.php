<?php
include 'condb.php';
session_start();

$sql = "SELECT o.o_id, o.p_id, o.p_num, o.o_date, u.u_name, p.p_name, p.p_price, (p.p_price * o.p_num) AS total_price
FROM tb_order o
JOIN tb_user u ON o.u_name = u.u_name
JOIN tb_product p ON o.p_id = p.p_id";


$re = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการคำสั่งซื้อ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

<nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_page.php">หน้าหลัก</a>
            <a class="navbar-brand">คุณคือผู้ดูแลระบบ</a>
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
    <div class="container" style="margin-top: 100px;">
        <h3 style="text-align: center;">จัดการคำสั่งซื้อ</h3>
        <?php
        if ($re = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($re) > 0) {
        ?>
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr class="text-center">
                            <th>รหัสสั่งซื้อ</th>
                            <th>รหัสสินค้า</th>
                            <th>ชื่อผู้สั่งซื้อ</th>
                            <th>จำนวนการสั่งซื้อ</th>
                            <th>ยอดรวมทั้งหมด</th>
                            <th>วันสั่งซื้อ</th>
                            <th>อนุมัติคำสั่งซื้อ</th>
                            <th>ยกคำสั่งซื้อ</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        while ($row = mysqli_fetch_array($re)) {
                        ?>
                            <tr>
                                <td><?= $row['o_id'] ?></td>
                                <td><?= $row['p_id'] ?></td>
                                <td><a href="show_address.php?u_name=<?= $row['u_name'] ?>"><?= $row['u_name'] ?></a></td>
                                <td><?= $row['p_num'] ?></td>
                                <td><?= $row['total_price'] ?></td>
                                <td><?= $row['o_date'] ?></td>
                                <td>
                                <a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="cancel_order.php?o_id=<?= $row['o_id'] ?>">
                                อนุมัติ    <img src="https://cdn-icons-png.flaticon.com/256/6815/6815090.png" alt="" style="width: 18px;"> 
                                </a>

                                </td>
                                <td>
                                    <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"  href="cancel_order.php?o_id=<?= $row['o_id'] ?>">
                                    ยกเลิกคำสั่งซื้อ <img src="https://cdn-icons-png.flaticon.com/256/458/458594.png" alt="" style="width: 18px;">
                                </a>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
        <?php
            } else {
                echo "<p style='text-align:center;'>ยังไม่มีคำสั่งซื้อเข้ามาเลย !  :(</p>";
            }
        } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>
