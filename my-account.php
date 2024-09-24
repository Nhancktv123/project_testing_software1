<?php
session_start();
	$pageTitle = "TÀI KHOẢN CỦA TÔI | DÉP MWC - Hệ thống dép chính hãng";
	function customPageHeader(){?>
		<title>$pageTitle</title>
	<?php }

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
						<h2 class="page-title">Tài khoản của tôi</h2>
					</div>	
					<div class="account-info-text">
						Xin chào,<br>
						Bạn có thể quản lý tất cả thông tin cá nhân và đơn hàng ở đây.
					</div>
					<!-- ACCOUNT-INFO-TEXT START -->
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="account-info">
							<div class="single-account-info">
								<ul>
									
									<li><a href="order_status.php"><i class="fa fa-list-ol"></i><span>Chi tiết và lịch sử đơn hàng</span>	</a></li>
									
									
									<li><a href="information.php"><i class="fa fa-user"></i><span>Thông tin cá nhân</span>	</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<?php 
					  if($_SERVER['REQUEST_METHOD']=="POST")
					  {
						  if(isset($_POST['logout']))
						  {
							  unset($_SESSION['ten']);?>
							  <script>window.location="index.php";</script>
						 <?php }
					  }
					?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BACK TO HOME START -->
						<div class="home-link-menu">
							<ul>
							<!--?php if(isset($_SESSION['ten']))-->
								<form method="post" action="">
								<?php
								echo '<input type="submit" value="ĐĂNG XUẤT" name="logout">';
								 ?>
								 </form>
							</ul>
						</div>
						<!-- BACK TO HOME END -->
					</div>
				</div>
			</div>
		</section>
		
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