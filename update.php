<?php
session_start();
	$pageTitle = "TÀI KHOẢN CỦA TÔI | DÉP MWC - Hệ thống dép chính hãng";
	function customPageHeader(){?>
		<title>$pageTitle</title>
	<?php }
	include 'config.php';
	include 'header.php';
?>
<?php

?>
		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" 
		style="margin: 20px;">
        </div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Thông tin cá nhân</h2>
					</div>	
			
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- PERSONAL-INFOMATION START -->
						<div class="personal-infomation">
							<?php
							if(isset($_SESSION['ten']))
							{
								$khachhang=$_SESSION['ten'];
							
							$thongtin=mysqli_query($conn,"SELECT maKhachHang,hoTenKhachHang,thuDienTuKH FROM tbl_khachhang WHERE tenDangNhap='$khachhang' ");
							$row=mysqli_fetch_assoc($thongtin);
							
						  ?>
						  		
							   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- REGISTERED-ACCOUNT START -->
						<div class="primari-box registered-account">
							<form class="new-account-box" id="accountLogin" method="post" action="edit-account.php">
								<h3 class="box-subheading">Thông tin cá nhân của bạn</h3>
								<div class="form-content">
									<div class="form-group primary-form-group">
										<label for="loginemail">Tên khách hàng</label>
										<input type="hidden" name="id" value="<?php echo $row['maKhachHang']; ?>">
										<input type="text" value="<?php echo $row['hoTenKhachHang']; ?>" name="name" id="name" class="form-control input-feild" required>
									</div>
									<div class="form-group primary-form-group">
										<label for="password">Thư điện tử</label>
										<input type="email" value="<?php echo $row['thuDienTuKH']; ?>" name="mail" id="mail" class="form-control input-feild" required>
									</div>
									<div class="submit-button">
										<input type="submit" value="Cập nhật" style="width: 20%;">
									</div>
								</div>
							</form>							
						</div>
						<!-- REGISTERED-ACCOUNT END -->
					</div>
						
						</div>
							<?php } ?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BACK TO HOME START -->
						<!-- BACK TO HOME END -->
					</div> 
					</div>
					</div>              
					
					<!-- ACCOUNT-INFO-TEXT END -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BACK TO HOME START -->
						<div class="home-link-menu">
							<ul>
							<li><a href="my-account.php"><i class="fa fa-chevron-left"></i> TRỞ VỀ</a></li>							</ul>
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