<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <!-- start nav -->
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
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
                            <a class="nav-link active" aria-current="page" href="index.html">หน้าหลัก</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ประเภทหนังสือการ์ตูน
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">ผจญภัย</a></li>
                                <li><a class="dropdown-item" href="#">ต่อสู้</a></li>
                                <li><a class="dropdown-item" href="#">กีฬา</a></li>
                                <li><a class="dropdown-item" href="#">โรแมนติก</a></li>
                                <li><a class="dropdown-item" href="#">ดราม่า/โศกนาฏกรรม</a></li>
                                <li><a class="dropdown-item" href="#">ตลก/คอเมดี้</a></li>
                                <li><a class="dropdown-item" href="#">แฟนตาซี</a></li>
                                <li><a class="dropdown-item" href="#">สืบสวนสอบสวน</a></li>
                                <li><a class="dropdown-item" href="#">ฮาเร็ม</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">ทั้งหมด</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">ติดต่อ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="help.php">ช่วยเหลือ</a>
                        </li>
                    </ul>
                    <div style="text-align: center;padding-top: 110%;">
                        <a href="frm_login.php" class="btn btn-dark mx-2">Login</a>
                        <a href="frm_register.php" class="btn btn-secondary">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- end nav -->

    <!-- Form register start -->
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 40rem;height:max-content;margin-top:100px;">
                <div class="card-body">

                    <h5 style="text-align: center;">ลงทะเบียน</h5>
                    <form action="insert_user.php" method="post">
                        <div class="row">
                            <!--  -->
                            <label for="u_name">ชื่อผู้ใช้</label>
                            <input type="text" name="u_name" id="u_name" class="form-control" id="formGroupExampleInput" placeholder="ระบุชื่อผู้ใช้">
                            <label for="u_pass">รหัสผ่าน</label>
                            <input type="password" name="u_pass" id="u_pass" class="form-control" id="formGroupExampleInput" placeholder="ระบุรหัสผ่าน">
                            <!--  -->
                        </div>
                        <!--  -->
                        <div class="row mt-3">
                            <div class="col">
                                <!--  -->
                                <label for="u_fname">ชื่อ</label>
                                <input type="text" name="u_fname" id="u_fname" class="form-control" placeholder="ระบุชื่อ" aria-label="First name">
                            </div>
                            <div class="col">
                                <label for="u_lname">นามสกุล</label>
                                <input type="text" name="u_lname" id="u_lname" class="form-control" placeholder="ระบุนามสกุล" aria-label="Last name">
                                <!--  -->
                            </div>
                        </div>

                        <!--  -->
                        <div class="row">
                            <!--  -->
                            <label for="exampleFormControlInput1" class="form-label ">อีเมล</label>
                            <input name="u_email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            <label for="exampleFormControlTextarea1" class="form-label mt-3">ที่อยู่(ที่ติดต่อได้)</label>
                            <textarea name="u_address" id="u_address" cols="30" rows="5" class="form-control" id="exampleFormControlTextarea1"></textarea>
                            <!--  -->
                        </div>
                        <!--  -->

                        <button type="submit" class="mt-3 btn btn-outline-dark d-grid gap-2 col-6 mx-auto">ลงทะเบียน</button>
                        <p style="text-align: center;" class="mt-3">หรือ<a href="frm_login.php">มีบัญชี</a>อยู่แล้ว ?</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form register end -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
