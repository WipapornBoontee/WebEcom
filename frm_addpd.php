<?php

include 'condb.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้าใหม่</title>
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
    <div class="container" style="margin-top: 100px;">
        <h3 style="text-align: center;">เพิ่มสินค้าใหม่</h3>
        <div style=" width: 800px; margin: 0 auto;">
            <form action="insert_pro.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <label for="detail" class="mt-3"><span>เลือกรูปภาพ</span> </label>
                        <input type="file" name="detail" id="detail" class="form-control mb-3" id="formFile">
                    </div>

                    <div class="row g-2">
                        <div class="col">
                            <label for="p_name">ชื่อสินค้า</label>
                            <input type="text" name="p_name" class="form-control" placeholder="ระบุชื่อสินค้า" aria-label="ระบุชื่อสินค้า">
                        </div>
                        <div class="col">
                            <label for="p_price">ราคา</label>
                            <input type="number" name="p_price" class="form-control" placeholder="ระบุราคา" aria-label="ระบุราคา">
                        </div>
                        <div class="col">
                            <label for="">จำนวน</label>
                            <input type="number" name="p_num" class="form-control" placeholder="ระบุจำนวน" aria-label="ระบุราคา">
                        </div>
                    </div>

                    <label for="inputState" class="form-label mt-2">ประเภท</label>
                    <select id="inputState" class="form-select" name="p_type">
                        <option selected>ตัวเลือก</option>
                        <option>ผจญภัย</option>
                        <option>ต่อสู้</option>
                        <option>กีฬา</option>
                        <option>โรแมนติก</option>
                        <option>ดราม่า/โศกนาฏกรรม</option>
                        <option>ตลก/คอเมดี้</option>
                        <option>แฟนตาซี</option>
                        <option>สืบสวนสอบสวน</option>
                        <option>ฮาเร็ม</option>
                    </select>

                    <div class="form-floating mt-3">
                        <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">รายละเอียดสินค้า</label>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto mt-3" style="text-align:center;">
                        <button type="submit" class="btn btn-primary">เพิ่มสินค้า</button>
                        <a href="product_page.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                            <img src="https://cdn-icons-png.flaticon.com/256/9312/9312240.png" alt="" style="width: 20px;"> ยกเลิก
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>