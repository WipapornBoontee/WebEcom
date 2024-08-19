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
    <title>การแก้ไขสินค้า</title>
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

    <div class="container" style="margin-top: 100px;text-align:center;">

        <form action="update_pro.php" method="post">
            <p style="text-align: center;font-size:larger;">การแก้ไขสินค้า</p>
            <input type="hidden" name="p_id" value="<?= $row['p_id'] ?>">

            <div class="input-group mb-3 mt-3">
                <span class="input-group-text">ชื่อสินค้า</span>
                <input type="text" name="p_name" class="form-control" placeholder="ชื่อสินค้า" value="<?= $row['p_name'] ?>">
                <span class="input-group-text">ราคา: </span>
                <input type="text" name="p_price" class="form-control" placeholder="ราคาสินค้า" value="<?= $row['p_price'] ?>" >
                <span class="input-group-text">จำนวน: </span>
                <input type="text" name="p_num" class="form-control" placeholder="ราคาสินค้า" value="<?= $row['p_num'] ?>" >
           
            </div>

            <div style="margin-top: 50px;">
                <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?= $row['description'] ?></textarea>
                    <label for="floatingTextarea2">รายละเอียด</label>
                </div>
            </div>
            <button type="submit" class="d-grid gap-2 mx-auto btn btn-warning mt-3">บันทึกการแก้ไข</button>
            <a href="admin_page.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                <img src="https://cdn-icons-png.flaticon.com/256/9312/9312240.png" alt="" style="width: 20px;">ยกเลิก
            </a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>