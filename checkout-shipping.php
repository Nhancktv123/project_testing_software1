<?php
session_start();
	$pageTitle = "THANH TOÁN | DÉP MWC - Hệ thống dép chính hãng";
	function customPageHeader(){?>
<title>$pageTitle</title>
<?php }

	include 'header.php';
?>

<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
    <div class="container">
        <form action="order.php" method="post">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 20px;">
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="page-title">Chọn một phương thức thanh toán</h2>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- CART TABLE_BLOCK START -->
                    <div class="table-responsive">
                        <!-- TABLE START -->
                        <table class="table table-bordered" id="cart-summary">
                            <!-- TABLE HEADER START -->
                            <thead>
                                <tr>
                                    <th class="cart-product">Sản phẩm</th>
                                    <th class="cart-description">Miêu tả sản phẩm</th>
                                    <th class="cart-availability text-center">Tình trạng hàng</th>
                                    <th class="cart-unit text-right">Đơn giá</th>
                                    <th class="cart_quantity text-center">Số lượng</th>
                                    <th class="cart-total text-right">Tổng</th>
                                </tr>
                            </thead>
                            <!-- TABLE HEADER END -->
                            <!-- TABLE BODY START -->
                            <tbody>
                                <!-- SINGLE CART_ITEM START -->
                                <?php 
									 $sId=session_id();// Lấy ID phiên làm việc hiện tại của người dùng.
									   $danhsach=mysqli_query($conn,"SELECT *,sum(`soLuongSanPham`) FROM `tbl_giohang` WHERE `sessionID`='$sId' GROUP BY `maSanPham` ");
									   // Lấy danh sách sản phẩm trong giỏ hàng dựa trên ID phiên làm việc.
									   $sup_total=0;// Khởi tạo biến tổng giá tiền ban đầu là 0.
									   while($rows=mysqli_fetch_assoc($danhsach))// Lặp qua từng dòng kết quả truy vấn để lấy thông tin từng sản phẩm trong giỏ hàng.
									   // Hiển thị thông tin sản phẩm trong giỏ hàng.
									   { ?>
                                <tr>
                                    <td class="cart-product">
                                        <a href="#">
                                            <img alt="Faded"
                                                src="admin/pages/uploads/<?php echo $rows['hinhAnhSanPham']; ?>">
                                        </a>
                                    </td>
                                    <td class="cart-description">
                                        <p class="product-name"><a href="#"><?php echo $rows['tenSanPham']?></a></p>
                                        <small name="ma">Mã sản phẩm: <?php echo $rows['maSanPham'];?></small>
                                        <small><a href="#">Size : <?php echo $rows['sizeSanPham'];?></a></small>
                                    </td>
                                    <td class="cart-avail">
                                        <span class="label label-success">Còn hàng</span>
                                    </td>
                                    <td class="cart-unit">
                                        <ul class="price text-right">
                                            <li class="price"><?php echo number_format($rows['giaSanPham']);?> VNĐ</li>
                                        </ul>
                                    </td>
                                    <td class="cart_quantity text-center">
                                        <span><?php echo $rows['sum(`soLuongSanPham`)'];?></span>
                                    </td>
                                    <td class="cart-total">
                                        <?php 
										  $total=$rows['giaSanPham'] *$rows['sum(`soLuongSanPham`)'];?>
                                        <span class="price"><?php echo number_format($total);?> VNĐ</span>

                                    </td>
                                </tr>
                                <?php $sup_total+=$total;?>
                                <!--tính tổng tiền-->
                                <?php }?>
                                <!-- SINGLE CART_ITEM END -->
                            </tbody>
                            <!-- TABLE BODY END -->
                            <!-- TABLE FOOTER START -->
                            <tfoot>
                                <tr>
                                    <td class="total-price-container text-right" colspan="4">
                                        <span>Tổng thanh toán</span>
                                    </td>
                                    <td id="total-price-container" class="price" colspan="2">
                                        <span id="total-price"><?php echo number_format($sup_total);?> VNĐ</span>
                                        <input type='hidden' name="price" value="<?php echo ($sup_total);?>">
                                    </td>
                                </tr>
                                <?php
									$makhachhang=$_SESSION['maKhachHang'];//lấy mã khách hàng
									$sessionid = session_id();
									$idthongtin =mysqli_query($conn,"SELECT IDTTGH FROM tbl_thongtingiaohang1 ORDER BY IDTTGH DESC LIMIT 1");
									$dataTT = mysqli_fetch_assoc($idthongtin);
									$idTTGH =  $dataTT['IDTTGH'];

									$khach_hang=mysqli_query($conn,"SELECT * FROM `tbl_thongtingiaohang1` WHERE `maKhachHang`='$makhachhang' AND `IDTTGH` = '$idTTGH' ");
									$thong_tin=mysqli_fetch_assoc($khach_hang);
									?>
                                <tr>
                                    <td class="text-right" colspan="4">Địa chỉ giao hàng</td>
                                    <td class="price" colspan="2"><?php echo $thong_tin['diachi'];?></td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4">Số điện thoại</td>
                                    <td class="price" colspan="2"><?php echo "0".$thong_tin['soDienThoai'];?> </td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4">Người nhận</td>
                                    <td class="price" colspan="2"><?php echo $thong_tin['tenNguoiNhan'];?></td>
                                </tr>
                            </tfoot>
                            <!-- TABLE FOOTER END -->
                        </table>
                        <!-- TABLE END -->
                    </div>
                    <!-- CART TABLE_BLOCK END -->
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- FOUR-PAYMENT-METHOD START -->
                    <div class="four-payment-method">
                        <!-- PRODUCT-DELIVERY-OPTION START -->
                        <div class="product-delivery-option">
                            <div class="product-delivery-address">
                                <p>Chọn một phương thức thanh toán:</p>
                            </div>
                            <!-- PRODUCT-DELIVERY-ITEM START -->
                            <div class="product-delivery-item">
                                <div class="product-delivery-single-item">
                                    <div class="table-responsive">
                                        <!-- PRODUCT-DELIVERY SINGLE OPTION START -->
                                        <table class="table table-bordered delivery-table">
                                            <tr>
                                                <td class="delivery-option-radio">
                                                    <div class="dalivery-radio">
                                                        <span class="radio-box">
                                                            <input type="radio" value="1" name="deliverymethod">
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="delivery-method-icon">
                                                    <img src="img/COD.png" alt="" />
                                                </td>
                                                <td class="carrey-info">
                                                    <strong>Thanh toán trực tiếp</strong><br>

                                                </td>
                                                <td class="carrey-cost">Vui lòng thanh toán với shipper khi nhận hàng.
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- PRODUCT-DELIVERY SINGLE OPTION END -->
                                    </div>
                                    <div class="table-responsive">
                                        <!-- PRODUCT-DELIVERY SINGLE OPTION START -->
                                        <table class="table table-bordered delivery-table">
                                            <tr>
                                                <td class="delivery-option-radio">
                                                    <div class="dalivery-radio">
                                                        <span class="radio-box">
                                                            <input type="radio" value="1" name="deliverymethod"
                                                                onchange="showImage(this)">
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="delivery-method-icon">
                                                    <img id="delivery-image" src="img/Online.png" alt="">
                                                </td>
                                                <td class="carrey-info">
                                                    <strong>Thanh toán trực tuyến</strong><br>
                                                </td>
                                                <td class="carrey-cost">
                                                    <img id="payment-qr-code" src="img/QR.jpg" alt=""
                                                        style="display: none;">
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- PRODUCT-DELIVERY SINGLE OPTION END -->
                                    </div>
                                </div>
                            </div>
                            <!-- PRODUCT-DELIVERY-ITEM START -->
                        </div>
                        <!-- PRODUCT-DELIVERY-OPTION END -->
                    </div>
                    <!-- FOUR-PAYMENT-METHOD END -->
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- RETURNE-CONTINUE-SHOP START -->
                    <div class="returne-continue-shop">
                        <input type="submit" value="ĐẶT HÀNG" onclick="return clickDatHang()" style="color: white;">
                        <a href="" class="continueshoping">
                            <!--i class="fa fa-chevron-left"-></i-->
                        </a>
                    </div>
                    <!-- RETURNE-CONTINUE-SHOP END -->
                </div>
            </div>
        </form>

    </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
<?php
	include 'footer.php';
?>
<!-- JS 
		===============================================-->
<script type="text/javascript">
function clickDatHang() {
    var deliveryMethod = document.getElementsByName("deliverymethod");
    var isPaymentSelected = false;

    for (var i = 0; i < deliveryMethod.length; i++) {
        if (deliveryMethod[i].checked) {
            isPaymentSelected = true;
            break;
        }
    }

    if (!isPaymentSelected) {
        alert("Vui lòng chọn phương thức thanh toán");
        return false; // Ngăn form được submit nếu không có phương thức thanh toán được chọn
    } else {
        alert("Đã đặt hàng thành công");
        return true; // Cho phép form được submit nếu có phương thức thanh toán được chọn
    }
}
</script>

<script>
function showImage(radioButton) {
    var qrCodeImage = document.getElementById("payment-qr-code");

    if (radioButton.checked) {
        qrCodeImage.style.display = "block";
    } else {
        qrCodeImage.style.display = "none";
    }
}
</script>

<!-- jquery js -->
<script src="js/vendor/jquery-1.11.3.min.js"></script>

<!-- fancybox js -->
<script src="js/jquery.fancybox.js"></script>

<!-- bxslider js -->
<script src="js/jquery.bxslider.min.js"></script>

<!-- meanmenu js -->
<script src="js/jquery.meanmenu.js"></script>

<!-- owl carousel js -->
<script src="js/owl.carousel.min.js"></script>

<!-- nivo slider js -->
<script src="js/jquery.nivo.slider.js"></script>

<!-- jqueryui js -->
<script src="js/jqueryui.js"></script>

<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>

<!-- wow js -->
<script src="js/wow.js"></script>
<script>
new WOW().init();
</script>

<!-- main js -->
<script src="js/main.js"></script>
</body>

</html>