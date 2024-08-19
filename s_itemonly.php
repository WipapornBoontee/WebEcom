    <?php
    include 'condb.php';
    session_start();

    $p_id = $_GET['p_id'];
    $u_id = $_GET['u_id'];

    $sql = "SELECT * FROM `tb_product` WHERE p_id = '$p_id'";
    $result = mysqli_query($con, $sql);

    $sql2 = "SELECT * FROM `tb_user` WHERE u_id = '$u_id'";
    $result2 = mysqli_query($con, $sql2);

    if (!$result || !$result2) {
        die("Error: " . mysqli_error($con));
    }
    // ดึงข้อมูลจาก query
    $row = mysqli_fetch_array($result);
    $row2 = mysqli_fetch_array($result2);
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
        <!-- start nav -->
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <?php

                $u_name = $_SESSION['u_name'];
                $sql2 = "SELECT * FROM `tb_user` WHERE u_name = '$u_name'";

                if ($re2 = mysqli_query($con, $sql2)) {
                    while ($row2 = mysqli_fetch_array($re2)) {
                        echo '<a class="navbar-brand" href="#">ชื่อผู้ใช้งาน: ' . $row2['u_name'] . '</a>';
                    }
                }
                ?>
                </a>
                <a class="navbar-brand" href="index.php">Windows Books</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Windows Books</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">ติดต่อ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ช่วยเหลือ</a>
                            </li>
                        </ul>
                        <div style="text-align: center;padding-top: 110%;">
                            <a href="logout.php" class="btn btn-outline-secondary mx-2">ออกจากระบบ</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end nav -->
        <div class="container mt-5">
            <div class="card">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="<?= $row['detail'] ?>" alt="" style="width: 50%; border-radius: 10px;">
                    </div>
                    <div class="col-md-6">
                        <h2 class="mb-4">สินค้า : <?= $row['p_name'] ?></h2>
                        <p class="mb-4">ราคา: <?= $row['p_price'] ?></p>
                        <p class="mb-4">รายละเอียดสินค้า: <?= $row['description'] ?></p>
                        <div class="d-flex justify-content-start">
                            <form action="checkout.php" method="post" name="omiseToken" id="omiseToken" enctype="multipart/form-data">
                                <input type="hidden" name="p_id" value="<?= $row['p_id'] ?>">
                                <label for="p_num" class="me-2">จำนวน:</label>
                                <input type="number" id="p_num" name="p_num" value="1" min="1" max="<?= $row['p_num'] ?>" required>
                                <script type="text/javascript" src="https://cdn.omise.co/omise.js" data-key="pkey_test_5ytd8l5bszarha3yil1" data-image="http://bit.ly/customer_image" data-frame-label="Windows Book Shop" data-button-label="Pay now" data-submit-label="ชำระเงิน" data-location="no" data-amount="<?= $row['p_price'];?>00" data-currency="thb">
                                </script>

                                <input type="hidden" id="p_price" name="p_price" value="<?= $row['p_price'] ?>" required>
                            </form>

                        </div>

                        <div class="mt-4">
                            <a href="user_page.php" class="btn btn-secondary">
                                <img src="https://cdn-icons-png.flaticon.com/256/2459/2459427.png" alt="" style="width: 20px;" class="me-2">ย้อนกลับ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    </body>

    </html>