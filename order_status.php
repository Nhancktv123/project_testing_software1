<?php
session_start();
	$pageTitle = "TÀI KHOẢN CỦA TÔI | DÉP MWC - Hệ thống dép chính hãng";
	function customPageHeader(){?>
		<title>$pageTitle</title>
	<?php }
	include 'config.php';
	include 'header.php';
?>
		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" 
		style="margin: 20px;">
        </div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Chi tiết và lịch sử đơn hàng</h2>
					</div>          
					
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="width: 100%">
						<?php	
						if(isset($_SESSION['ten']))
						{	
							$ten=$_SESSION['ten'];
							
							$khachhang=mysqli_query($conn,"SELECT `maKhachHang`,`tenDangNhap` FROM `tbl_khachhang` WHERE `tenDangNhap`='$ten' ");
							$khachhangArr = mysqli_fetch_assoc($khachhang);

							$maKH = $khachhangArr['maKhachHang'];
							
							$chitietdh = mysqli_query($conn, "SELECT * FROM tbl_donhang WHERE maKhachHang = '$maKH' ");
						
						?>
						<div >
							<div class="table-responsive" style="margin-top: 2%">
                           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Ngày lập đơn hàng</th>
                                                    <th>Tổng tiền đơn hàng</th>
                                                    <th>Trạng thái đơn hàng</th>    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                	$i = 0;
                                                 while ($resultDH = mysqli_fetch_array($chitietdh)){
						                    		$i++;
						                      
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $resultDH['maDonHang']; ?></td>
                                                    <td><?php echo $resultDH['ngayLapDH']; ?></td>
                                                    <td><?php echo number_format($resultDH['tongTienDH']); ?> VNĐ</td>
                                                 	 <td><?php echo $resultDH['trangThaiDH']; ?></td>
                                                 	 <td>
													  <a href="chitietdonhang.php?maDonHang=<?php echo $resultDH['maDonHang'] ?>">
  <button type="button" class="btn btn-info" id="btnShow" style="height: 20%;width: 90%;">Xem chi tiết</button>
                                                 	 </td>
                                                </tr>
                                                <?php 
                                                	}
                                                ?>
                                     		 </tbody>
                            </table>
                      </div>
						</div>
					</div>
					<?php 
						}else{
							echo "Chưa có đơn hàng!";	
						}
					?>

					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BACK TO HOME START -->
						<div class="home-link-menu">
							<ul>
								<li><a href="my-account.php"><i class="fa fa-chevron-left"></i> TRỞ LẠI</a></li>
							</ul>
						</div>
						<!-- BACK TO HOME END -->
					</div>

				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
<?php
	include 'footer.php';
?>
		<!-- JS 
		===============================================-->

		 <script language="javascript" type="text/javascript"> 

            function popitup(url) { //Popup cửa sổ
                newwindow=window.open(url,'name','height=600,width=800');
                if (window.focus) {
                    newwindow.focus()
                    }
                return false;
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