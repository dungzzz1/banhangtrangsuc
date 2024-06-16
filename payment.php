<?php 
include ("admin/config/config.php");   
session_start();
$user = (isset($_SESSION['khachhang'])) ? $_SESSION['khachhang']:[];
if(isset($_POST['dh'])) 
{
    
    $tenkh = $_POST['ten'];
    $dc = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    
    $sqlkh = "INSERT INTO  khachhang1(tenkh, sdt, gioitinh, ngaysinh, diachi, Email) VALUES('$tenkh','$sdt','nam','2001-07-2','$dc', '$email')";
    $resultkh = $conn->query($sqlkh);
    if($resultkh == TRUE){
        // echo '<script>alert("Thêm mới thành công!");</script>';
        // echo '<script>window.location="shopingcart.php"</script>';
        session_destroy();
    }else{
        echo "Error:". $sqlkh . "</br>". $conn->error;
    }
    
    include ("dh.php");
}
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}
if(isset($_POST['payUrl'])) 
{
    $tongtien = 0;
    foreach($_SESSION['cart'] as $cart_item){
        $thanhtien = $cart_item['soluong'] * $cart_item['gia'];
        $tongtien+=$thanhtien;}
    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


    $partnerCode = 'MOMOBKUN20180529';
    $accessKey = 'klm05TvNBzhg7h7j';
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
    $orderInfo = "Thanh toán qua MoMo";
    $amount = $thanhtien;
    $orderId = time() ."";
    $redirectUrl = "http://localhost/banhangtrangsuc/shopingcart.php";
    $ipnUrl = "http://localhost/banhangtrangsuc/shopingcart.php";
    $extraData = "";
    
    
    if (!empty($_POST)) {
        $partnerCode =  $partnerCode;
        $accessKey = $accessKey;
        $serectkey =  $secretKey;
        $orderId = $orderId; // Mã đơn hàng
        $orderInfo =  $orderInfo;
        $amount =   $amount;
        $ipnUrl =  $ipnUrl;
        $redirectUrl = $redirectUrl;
        $extraData = $extraData;
    
        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
    
        //Just a example, please check more in there
    
        header('Location: ' . $jsonResult['payUrl']);
    }
    $tenkh = $_POST['ten'];
    $dc = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    
    $sqlkh = "INSERT INTO  khachhang1(tenkh, sdt, gioitinh, ngaysinh, diachi, Email) VALUES('$tenkh','$sdt','nam','2001-07-2','$dc', '$email')";
    $resultkh = $conn->query($sqlkh);
    if($resultkh == TRUE){
        // echo '<script>alert("Thêm mới thành công!");</script>';
        // echo '<script>window.location="shopingcart.php"</script>';
        session_destroy();
    }else{
        echo "Error:". $sqlkh . "</br>". $conn->error;
    }
    
    include ("dh.php");
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="./accset/css/trangchu.css">
    <link rel="stylesheet" href="./accset/css/payment.css">
</head>
<body>
    
</body>
</html>
<div id="main">
    <div class="wrapper">
        <!-- header -->
        <div class="header">
            <div class="wrapper__header">
                <div class="top__bar">
                    <div class="header__container d-flex">
                        <div class="contact_top-bar">
                            <ul class="contact_top-items">
                                <li style="margin-right: 15px;"><i class="fas fa-home"></i>536 Hoàng Quốc Việt,Q.Cầu Giấy, Hà nội</li>
                                <li><i class="fas fa-mobile-alt"></i><a href="tel: 076 922 0162">076 922 0162</a></li>
                            </ul>
                        </div>
                        <div class="acount__top-bar">
                            <ul class="acount__items">
                                <li style="margin-right: 15px;"><a href=""><i class="fas fa-search"></i></a></li>
                                <li><a href="dangnhap.php">
                                <?php
                                    if(isset($_SESSION['khachhang'])){
                                        echo $user['tenkh'];?>
                                            <li style = "margin-left: 15px;"><a href="dangxuat.php"><i class="fas fa-sign-out-alt"></i></a></li>
                                        <?php
                                    }else{
                                        ?>
                                            <i class="fas fa-user"> </i>
                                        <?php
                                    }
                                ?>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="navbar">
                    <div class="navbar__container">
                        <div class="navbar__logo">
                            <a href="" class="navbar__logo-link">
                                <img width="150px" height="60px" src="./accset/img/logo-mona.png" alt="" title="Karo">
                            </a>
                        </div>
                        <div class="navbar__list d-flex">
                            <div class="navbar__list__modul">
                                <ul class="modul__list d-flex">
                                    <li class="modul__item">
                                        <a href="index.php" class="modul__item-link">Trang chủ</a>
                                    </li>
                                    <li class="modul__item">
                                        <a href="" class="modul__item-link">giới thiệu</a>
                                    </li>
                                    <li class="modul__item">
                                        <a href="#" class="modul__item-link">sản phẩm</a>
                                        <ul class="modul__item-list">
                                            <?php 
                                                include ("loaisp.php");
                                            ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="modul__item">
                                        <a href="" class="modul__item-link">tin tức</a>
                                    </li>
                                    <li class="modul__item">
                                        <a href="" class="modul__item-link">liên hệ</a>
                                    </li>
                                    <li class="" style="list-style: none; border-right: 1px solid #ccc;"></li>
                                    <li class="modul__item navbar__icon navbar__cart" title="Giỏ hàng">
                                        <a href="" class=" cart-text">GIỎ HÀNG</a>
                                        <a href="" class="navbar__acount " style="font-size: 27px;">
                                            <i class="fas fa-shopping-bag" ></i>
                                            <?php 
                                                $count = 0;
                                                if(isset($_SESSION['cart'])){
                                                    $count = count($_SESSION['cart']);
                                                }
                                            ?>
                                            <p style = ""><?php echo $count ?></p>
                                        </a>
                                        <ul class="modul__item-list" style="margin-top: 30px;">
                                            <li class="item-list__link" style="color: #000;background-color: #fff;">
                                                Chưa có sản phẩm nào trong giỏ hàng
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->
        <!-- Payment Cart -->
        <div class="payment__Cart"  >
            <div class="payment__Order">
                <form method="POST" action="">

                    <div class="row" style="display: flex;justify-content: space-between;" >
                        <div class="payment__Infor">
                            <h4 class="infor_header">Thông tin thanh toán</h4>
                            <div class="1" style="display: flex;justify-content: space-between;">
                                <p class="form__name-pay" data-priority="10" style="margin-right: 30px;">
                                    <label style="display: block;"  class="">Họ&nbsp;<span>*</span></label>
                                    <span class="">
                                        <input type="text" class="input-text " name=""  placeholder="" value="">
                                    </span>
                                </p>
                                <p class="form__name-pay" data-priority="10">
                                    <label style="display: block;"  class="">Tên&nbsp;<span>*</span></label>
                                    <span class="">
                                        <input type="text" class="input-text " name="ten"  placeholder="" value="">
                                    </span>
                                </p>
                            </div>
                            <p class="form__name-pay" data-priority="10" style="margin-top: 25px;">
                                <label style="display: block;"  class="">Quốc gia&nbsp;<span>*</span></label>
                                <span class="">
                                    <input type="text" class="input-text " name=""  placeholder="" value="" style="width: 100%;" >
                                </span>
                            </p>
                            <p class="form__name-pay" data-priority="10" style="margin-top: 25px;">
                                <label style="display: block;"  class="">Địa chỉ&nbsp;<span>*</span></label>
                                <span class="">
                                    <input type="text" class="input-text " name="diachi"  placeholder="" value="" style="width: 100%;" >
                                </span>
                            </p>
                            <p class="form__name-pay" data-priority="10" style="margin-top: 25px;">
                                <label style="display: block;"  class="">Tỉnh / Thành phố&nbsp;<span>*</span></label>
                                <span class="">
                                    <input type="text" class="input-text " name=""  placeholder="" value="" style="width: 100%;" >
                                </span>
                            </p>
                            <p class="form__name-pay" data-priority="10" style="margin-top: 25px;">
                                <label style="display: block;"  class="">Số điện thoại&nbsp;<span>*</span></label>
                                <span class="">
                                    <input type="tel" class="input-text " name="sdt"  placeholder="" value="" style="width: 100%;" >
                                </span>
                            </p>
                            <p class="form__name-pay" data-priority="10" style="margin-top: 25px;">
                                <label style="display: block;"  class="">Địa chỉ email&nbsp;<span>*</span></label>
                                <span class="">
                                    <input type="email" class="input-text " name="email"  placeholder="" value="" style="width: 100%;" >
                                </span>
                            </p>
                            <p class="form__name-pay" data-priority="10" style="margin-top: 25px;">
                                <label style="display: block;"  class="">Ghi chú đơn hàng (tùy chọn)</label>
                                <span class="">
                                    <textarea placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa chỉ giao hàng chi tiết hơn." name="" id="" cols="30" rows="10" style="width: 100%;border: 1px solid #ddd;height: 9em;padding: 8px;margin-top: 15px;font-size: 15px;font-family: sans-serif;"></textarea>
                                </span>
                            </p>
                        </div>
                        <div class="Order__infor">
                            <div class="border_with">
                                <div class="order__sidebar">
                                    <h3 style="text-transform: uppercase; font-size: 18px; margin-top: 15px;">Đơn hàng của bạn</h3>
                                    <div class="order__review">
                                        <table>
                                            <thead class="header__order">
                                                <tr style="text-transform: uppercase; border-bottom: 2px solid #ccc;">
                                                    <th class="mg-left">Sản phẩm</th>
                                                    <th>Tổng</th>
                                                </tr>
                                            </thead>
                                        <?php
                                        if(isset($_SESSION['cart'])){
                                            $tongtien = 0;
                                            foreach($_SESSION['cart'] as $cart_item){
                                                $thanhtien = $cart_item['soluong'] * $cart_item['gia'];
                                                $tongtien+=$thanhtien;
                                                ?>
                                                <tbody class="product__body">
                                                    <tr>
                                                        <td class="mg-left product__name" style="font-size: 14px;" ><?php echo $cart_item['tensp'] ?> <span>× <?php echo $cart_item['soluong'] ?></span> </td>
                                                        <td class="product__total" style="font-size: 15px;"><?php echo number_format($thanhtien,0,',','.') ?><span style="font-size: 14px;"> ₫</span> </td>
                                                    </tr>
                                                </tbody>
                                                
                                                <?php
                                                }
                                                }else{
                                                    
                                                    
                                                }
                                                ?>
                                                <tfoot>
                                                    <tr>
                                                        <th class="mg-left">Tổng phụ</th>
                                                        <td><span> <?php echo number_format($tongtien,0,',','.') ?><span> ₫</span></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="mg-left">Giao hàng</th>
                                                        <td><span> Miễn phí</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="mg-left">Tổng</th>
                                                        <td><span > <strong><?php echo number_format($tongtien,0,',','.') ?> </strong> <span> ₫</span></span></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        <div class="payment__review">
                                            <ul>
                                                <li>
                                                    <input checked name="payment" value="Trả tiền mặt" onclick="tm()" id="radio_tm" type="radio">
                                                    <label for=""> <strong>Trả tiền mặt khi nhận hàng</strong></label>
                                                    <div id="payment_tm" class="payment__box">
                                                        <p>Trả tiền mặt khi nhận hàng</p>
                                                    </div>
                                                </li>
                                                <li style="border-top: 1px solid #ececec; padding-top: 10px;">
                                                    <input onclick="tk()" value="Chuyển khoản" name="payment" id="radio_ck" type="radio">
                                                    <label for=""> <strong>Chuyển khoản ngân hàng</strong></label>
                                                    <div id="payment_ck" class="payment__box" style="display: none;">
                                                        <div class="btn__payment">
                                                            <button name="payUrl" >Thanh Toán MOMO</button>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="btn__payment">
                                                <button name="dh" >Đặt hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
        <script>
            var rd_tm = document.getElementById("radio_tm")
            var rd_tk = document.getElementById("radio_ck")
            var pay_tm = document.getElementById("payment_tm")
            var pay_tk = document.getElementById("payment_ck")

            function tm() {
                if(rd_tm.checked == true) {
                    pay_tk.style.display = "none"
                    pay_tm.style.display = "block"
                }else{
                    pay_tk.style.display = "block"
                    pay_tm.style.display = "none"
                }
            }
            function tk() {
                if(rd_tk.checked == true) {
                    pay_tm.style.display = "none"
                    pay_tk.style.display = "block"
                }
                else{
                    pay_tk.style.display = "none"
                    pay_tm.style.display = "none"
                }
            }

        </script>
        <!-- end Payment Cart cart -->
 

        <!-- footer -->
        <div class="footer">
            <div class="footer-container">
                <div class="footer__head">
                    <div class="footer__logo">
                        <img src="./accset/img/logo-mona.png" alt="" style="max-width: 100px;" class="footer__logo-img">
                    </div>
                    <div class="footer__block">
                        <div class="footer__block-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="footer__block__body">
                            <span class="footer__name">Địa chỉ:</span>
                            <p class="footer__value">Cổ Nhuế - Bắc Từ Liêm - Hà Nội</p>
                        </div>
                    </div>
                    <div class="footer__block">
                        <div class="footer__block-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="footer__block__body">
                            <span class="footer__name">Email:</span>
                            <a href="mailto:Haibh0903@gmail.com" class="footer__value">Nguyentientuananh@gmail.com</a>
                        </div>
                    </div>
                    <div class="footer__block">
                        <div class="footer__block-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="footer__block__body">
                            <span class="footer__name">Điện thoại:</span>
                            <a href="tel:035 285 0379" class="footer__value">035 285 0379</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="payment">
            <div class="payment__logo">
                <img src="./accset/img/payment-icon.png" style="max-width: 100%; max-height: 40px;" alt="">
            </div>
            <ul class="payment__list">
                <li class="payment__item">
                    <a href="#" class="payment__item-link">Trang chủ</a>
                </li>
                <li class="payment__item">
                    <a href="#" class="payment__item-link">giới thiệu</a>
                </li>
                <li class="payment__item">
                    <a href="#" class="payment__item-link">sản phẩm</a>
                </li>
                <li class="payment__item">
                    <a href="#" class="payment__item-link">tin tức
                <li class="payment__item" style="border-right: none">
                    <a href="#" class="payment__item-link">liên hệ</a>
                </li>
            </ul>
            <div class="payment__license">
                © Bản quyền thuộc về Nguyentientuananh | <a href="https://www.facebook.com/Haibuihoang.09" class="NTTA">NTTA</a>
            </div>
        </div>

        <!--End  footer -->
    </div>
</div>