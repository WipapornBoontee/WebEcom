<?php
include 'condb.php';
session_start();

if (!isset($_SESSION['u_name'])) {
    header("Location: login.php");
    exit();
}

// เรียกใช้ค่าจากฟอร์ม
$p_id = $_POST['p_id'];
$p_num = $_POST['p_num'];

$u_name = $_SESSION['u_name'];

$sql = "INSERT INTO `tb_order`(`u_name`, `p_id`, `p_num`) VALUES ('$u_name', '$p_id', '$p_num')";
$result = mysqli_query($con, $sql);

if ($result) {
    // ดึงข้อมูลสินค้าที่สั่งซื้อจากฐานข้อมูล
    $sql_product = "SELECT * FROM `tb_product` WHERE `p_id` = '$p_id'";
    $result_product = mysqli_query($con, $sql_product);

    if ($result_product) {
        $row = mysqli_fetch_array($result_product);

        // สร้าง Charge ด้วย Omise API
        require_once dirname(__FILE__).'/omise-php/lib/Omise.php';
        define('OMISE_API_VERSION', '2015-11-17');
        define('OMISE_PUBLIC_KEY', 'pkey_test_5ytd8l5bszarha3yil1');
        define('OMISE_SECRET_KEY', 'skey_test_5ytd8l62nannejrdlux');

        try {
            $charge = OmiseCharge::create(array(
                'amount' => $row['p_price'] * $p_num * 100,
                'currency' => 'thb',
                'card' => $_POST["omiseToken"]
            ));

            echo "Order successful";
            header("location: user_page.php");

            print('<pre>');
            print_r($charge);
            print('</pre>');
        } catch (OmiseUsedTokenException $e) {
            echo "Error: Token has already been used.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "เกิดข้อผิดพลาดในการเรียกข้อมูล : " . mysqli_error($con);
    header("location: user_page.php");

    }
} else {
    echo "คำสั่งซื้อล้มเหลว: " . mysqli_error($con);
    header("location: user_page.php");
}

mysqli_close($con);
?>
