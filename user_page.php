<?php

include 'condb.php';
session_start();
$sql = "SELECT * FROM `tb_product`";

if (isset($_SESSION['u_name'])) {
    $u_name = $_SESSION['u_name'];
    $sql2 = "SELECT * FROM `tb_user` WHERE u_name = '$u_name'";
    $user_result = mysqli_query($con, $sql2);

    if (!$user_result) {
        die("Error: " . mysqli_error($con));
    }

    $user_row = mysqli_fetch_array($user_result);
} else {

    header("Location: frm_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <!-- start nav -->
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <?php if ($re2 = mysqli_query($con, $sql2)) {
                while ($row2 = mysqli_fetch_array($re2)) {
            ?>
                    <a class="navbar-brand" href="#">ชื่อผู้ใช้งาน: <?=$row2['u_name'];?>
                <?php        }
            }
                ?>
                    </a>
                    <a class="navbar-brand" href="user_page.php">Windows Books</a>

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
                                    <a class="nav-link active" aria-current="page" href="user_page.php">หน้าหลัก</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">ติดต่อ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="help.php">ช่วยเหลือ</a>
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


    <div class="container">
            <!-- search -->

    <form class="d-flex" role="search" method="GET" style="margin-top: 100px;" action="search_user_product.php">
        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">
            <img src="https://cdn-icons-png.flaticon.com/256/14874/14874201.png" alt="" width="18px;">
        </button>
    </form>
    <!-- end search -->
        <div class="row">
            <?php
            if ($re = mysqli_query($con, $sql)) {
                while ($row = mysqli_fetch_array($re)) {
            ?>
                    <div class="col-md-3">
                        <div class="card" style="margin-top: 20px; width: 20rem; height: 500px; border: 1px solid #ddd; border-radius: 10px; overflow: hidden;">
                            <img src="<?= $row['detail'] ?>" class="card-img-top" alt="Product Image" style="max-height: 300px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;">ชื่อสินค้า: <?= $row['p_name'] ?></h5>
                                <p class="card-text">รายละเอียด: <?= $row['description'] ?></p>
                                <div style="text-align: center;">
                                    <a href="s_itemonly.php?p_id=<?= $row['p_id'] ?>" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">ดูเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>