<?php
session_start();
	$pageTitle = "GIỎ HÀNG | DÉP MWC - Hệ thống dép chính hãng";
	function customPageHeader(){?>
<title>$pageTitle</title>
<?php }
    include_once 'config.php';
	include 'header.php';
	//include 'add_cart.php';
?>
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
    <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" 
		style="margin: 20px;">
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- SHOPPING-CART SUMMARY START -->
                <h2 class="page-title">GIỎ HÀNG<span class="shop-pro-item">
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
                                <th class="cart-avail text-center">Tình trạng hàng</th>
                                <th class="cart-unit text-right">Đơn giá</th>
                                <th class="cart_quantity text-center">Số lượng</th>
                                <th class="cart-delete">&nbsp;</th>
                                <th class="cart-total text-right">Tổng</th>
                            </tr>
                        </thead>
                        <!-- TABLE HEADER END -->
                        <!--Chức năng xóa sản phẩm khỏi giỏ hàng-->
                        <!--Xóa số lượng trong giỏ hàng-->
                        <?php
								$sId=session_id(); // lấy session ID
								?>
                        <?php 
							  if(isset($_GET['id_cart'])) //kiểm tra có tham số `id_cart` được truyền qua trang web hay không
							  {
									   $id_cart=$_GET['id_cart']; //lấy giá trị của tham số này và lưu vào biến `$id_cart`
							        //Nếu không có tham số này, biến `$id_cart` sẽ không được khởi tạo.}

							  //kiểm tra xem có sản phẩm trong giỏ hàng tương ứng với giá trị của `$id_cart` hay không
							  $query=mysqli_query($conn,"SELECT `soLuongSanPham`,`maSanPham`,`sessionID`FROM `tbl_giohang` WHERE `sessionID`='$sId'AND `maSanPham`='$id_cart'");
									$rows=mysqli_fetch_assoc($query);
									$xemma= $rows['maSanPham'] ;

							  if($id_cart==$xemma){ //kiểm tra nếu giá trị của `$id_cart` khớp với giá trị của "maSanPham"
										$rowsp=mysqli_query($conn,"DELETE FROM `tbl_giohang` WHERE `maSanPham`='$id_cart' AND `sessionID`='$sId' ");//xóa sản phẩm trong giỏ hàng	
									if($rowsp)
										{
										echo "<script>window.location = 'cart.php';</script>";// xóa sản phẩm thành công, mã sẽ chuyển hướng người dùng đến trang "cart.php
										}

									}
								}
								?>
                        <!-- TABLE BODY START   -->
                        <tbody>
                            <!-- SINGLE CART_ITEM START -->
                            <?php  
							   //truy vấn đến CSDL và lấy ra tất cả các sản phẩm đang có trong giỏ của người dùng
							   $danhsach=mysqli_query($conn,"SELECT *,sum(`soLuongSanPham`) FROM `tbl_giohang` WHERE `sessionID`='$sId' and `soLuongSanPham`>0 GROUP BY `maSanPham`");
							   $sup_total=0;//tính tổng số lượng sản phẩm của người dùng
							   while($rows=mysqli_fetch_assoc($danhsach))//gán kết quả vào biến `$rows` để truy cập thông tin của từng sản phẩm
							   //sử dụng các biến `$rows` để hiển thị thông tin sản phẩm
							   { ?>
                            <tr>
                                <td class="cart-product">
                                    <a href="#"><img alt="Blouse"
                                            src="admin/pages/uploads/<?php echo $rows['hinhAnhSanPham']; ?>"></a>
                                </td>
                                <td class="cart-description">
                                    <p class="product-name"><a href="#"><?php echo $rows['tenSanPham'];?></a></p>

                                    <small><a href="#">Size : <?php echo $rows['sizeSanPham'];?></a></small>
                                </td>
                                <td class="cart-avail"><span class="label label-success">Còn hàng</span></td>
                                <td class="cart-unit">
                                    <ul class="price text-right">
                                        <li class="price special-price"><?php echo number_format($rows['giaSanPham']);?>
                                            VNĐ</li>
                                       
                                    </ul>
                                </td>
                                <td class="cart_quantity text-center">

                                    <input class="cart-plus-minus" type="text" name="quantybutton"
                                        value="<?php echo $rows['sum(`soLuongSanPham`)'];?>" readonly="readonly">
                                    <a
                                        href="?maSPTru=<?php echo $rows['maSanPham'];?>&soluonght=<?php echo $rows['soLuongSanPham'];?>">
                                        <div class="dec qtybutton" name="dec">-</div>
                                    </a>

                                    <?php //trừ sản phẩm start
												  if(isset($_GET['maSPTru']) && isset($_GET['soluonght']))//nếu 2 biến được truyền qua, lấy giá trị của hai biến và thực hiện lệnh sql.
												  {
												  	$maSPTru=$_GET['maSPTru'];
													$queryTru=mysqli_query($conn,"SELECT `soLuongSanPham`,`maSanPham`,`sessionID`FROM `tbl_giohang` WHERE `sessionID`='$sId'AND `maSanPham`='$maSPTru'");
													//điều kiện session ID bằng với session ID của người dùng hiện tại và mã sản phẩm bằng với '$maSPTru'
													$rows=mysqli_fetch_assoc($queryTru);
													$xemma= $rows['maSanPham'] ;
												  	$soluonght = $_GET['soluonght'];
                                                    //kiểm tra xem giá trị của `$maSPTru` có khớp với giá trị của "maSanPham" lấy từ kết quả truy vấn không
												  	if ($soluonght <= 1){ //Nếu số lượng hiện tại là 1, mã sẽ xóa sản phẩm khỏi giỏ hàng
													  
													  	if($maSPTru==$xemma){
															$rowsp=mysqli_query($conn,"DELETE FROM `tbl_giohang` WHERE `maSanPham`='$maSPTru' AND `sessionID`='$sId' ");

																if($rowsp)
																{
																echo "<script>window.location = 'cart.php';</script>";
																}else{
																	echo "That bai!";
																}

														}

													}else{			
														if($maSPTru==$xemma){
															$rowsp=mysqli_query($conn,"UPDATE tbl_giohang SET soLuongSanPham = $soluonght - 1 WHERE `sessionID`='$sId'AND `maSanPham`='$maSPTru' ");
																if($rowsp){
																	echo "<script>window.location = 'cart.php';</script>";
																}else{
																	echo "That bai!";
																}
														}														
												  	}
												}
										
												?>
                                    <a
                                        href="?maSPCong=<?php echo $rows['maSanPham'];?>&soluonght=<?php echo $rows['soLuongSanPham'];?>">
                                        <div class="inc qtybutton" name="inc">+</div>
                                    </a>
                                    <?php //cộng sản phẩm start
												  if(isset($_GET['maSPCong']) && isset($_GET['soluonght'])) ////nếu 2 biến được truyền qua, lấy giá trị của hai biến và thực hiện lệnh sql.
												  {
													$maSPCong=$_GET['maSPCong'];
													$soluonght = $_GET['soluonght'];

												  	$queryCong=mysqli_query($conn,"SELECT `soLuongSanPham`,`maSanPham`,`sessionID`FROM `tbl_giohang` WHERE `sessionID`='$sId'AND `maSanPham`='$maSPCong'");
													$rows=mysqli_fetch_assoc($queryCong);

													$xemma= $rows['maSanPham'] ;
													//Lấy số lượng hiện có để só sánh
													$querySLHC=mysqli_query($conn,"SELECT `soLuongSanPham` FROM `tbl_sanpham` WHERE `maSanPham`='$maSPCong'");
													$resultSLHC=mysqli_fetch_assoc($querySLHC);
													$soluonghienco = $resultSLHC['soLuongSanPham'];
													//Lấy số lượng hiện có để só sánh
													if ($soluonght > $soluonghienco){
														echo "<script>alert('Vượt quá số lượng còn lại!');
																window.location = 'cart.php';</script>";
													}else{
														if($maSPCong==$xemma){	
														$rowsp=mysqli_query($conn,"UPDATE tbl_giohang SET soLuongSanPham = $soluonght + 1 WHERE `sessionID`='$sId'AND `maSanPham`='$maSPCong' ");
															if($rowsp){
																echo "<script>window.location = 'cart.php';</script>";
															}else{
																echo "That bai!";
															}

														}
													}
													
												}
										?>
                                </td>
                                <td class="cart-delete text-center">
                                    <a href="?id_cart=<?php echo $rows['maSanPham'];?>" class="cart_quantity_delete"
                                        title="Xóa"><i class="fa fa-trash-o"></i></a>
                                </td>
                                <td class="cart-total">
                                    <?php 
										  $total=$rows['giaSanPham'] *$rows['sum(`soLuongSanPham`)'];?>
                                    <span class="price"><?php echo number_format($total);?> VNĐ</span>
                                </td>
                            </tr>
                            <?php $sup_total+=$total;?>
                            <!--tính tổng tiền-->
                            <?php }
									 ?>
                            <!--/div-->
                            <!-- SINGLE CART_ITEM END -->

                            <!-- SINGLE CART_ITEM START -->


                            <!-- SINGLE CART_ITEM END -->
                        </tbody>
                        <!-- TABLE BODY END -->
                        <!-- TABLE FOOTER START -->
                        <tfoot>
                            <!-- Tính số lượng sản phẩm trong giỏ hàng-->

                            <tr class="cart-total-price">
                                <td class="setup" colspan="3" rowspan="4"></td>
                                <td class="text-right" colspan="3">Tổng thanh toán:</td>

                                <td id="total_product" class="price" colspan="1"><?php echo number_format($sup_total);?>
                                    VNĐ</td>
                            </tr>

                            <tfoot>
                    </table>
                    <!-- CART TABLE_BLOCK END -->
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- RETURNE-CONTINUE-SHOP START -->
                    <div class="returne-continue-shop">

                        <?php  if( isset($_SESSION['ten']) )
						            {
										if(isset($_SESSION['soluong'])){
											$so=$_SESSION['soluong'];
											if($so>0)
											{
												echo'<a  href="checkout-address.php" class="continueshoping"><input type="submit" class="procedtocheckout" style="color: white;" value="Tiếp tục đơn hàng" ></a>';
											}
										}
										else{
											echo '<input type="submit" class="procedtocheckout" value="Tiếp tục đơn hàng" style="color: white;" onClick="alert(\'Chưa có sản phẩm trong giỏ hàng\')";>';
										}
									}
								else {
										echo'<a  href="registration.php" class="continueshoping"><input type="submit" class="procedtocheckout" value="Tiếp tục đơn hàng" style="color: white;"></a>';
									}?>
                    </div>
                    <!-- RETURNE-CONTINUE-SHOP END -->
                </div>
            </div>
        </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
<?php
	include 'footer.php';
?>
<!--===============================================-->
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