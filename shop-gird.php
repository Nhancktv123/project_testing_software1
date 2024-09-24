<?php
include_once 'classes/category.php';
include_once 'classes/product.php';
include_once 'admin/helpers/format.php';
?>

<?php
if (!isset($_GET['maLoai']) || $_GET['maLoai'] == '' || $_GET['maLoai'] > 30 || $_GET['maLoai'] < 0) {
	echo "<script>window.location = '404.php'</script>";
} else {
	$idLoai = $_GET['maLoai'];
}

$fm = new Format();
$prod = new product();
$category = new category();
$catList = $category->getcatbyId($idLoai);
$resultCat = $catList->fetch_assoc();
?>

<?php
$pageTitle = $resultCat['tenLoai'] . " | MWC - Hệ thống giày chính hãng";
function customPageHeader()
{ ?>
	<title>$pageTitle</title>
<?php }

include 'header.php';
?>
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
	<div class="container">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 20px;">
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<!-- PRODUCT-LEFT-SIDEBAR START -->
				<div class="product-left-sidebar">
					<h2 class="left-title pro-g-page-title">Mục lục</h2>
					<!-- SINGLE SIDEBAR ENABLED FILTERS START -->
					<div class="product-single-sidebar">
						<span class="sidebar-title">LOẠI ĐÃ LỌC: </span>
						<ul class="filtering-menu">
							<li>
								<?php echo $resultCat['tenLoai']; ?>

							</li>
						</ul>
					</div>
					<!-- SINGLE SIDEBAR ENABLED FILTERS END -->
					
					<!-- SINGLE SIDEBAR SIZE START -->
				</div>
				<!-- PRODUCT-LEFT-SIDEBAR END -->
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div class="right-all-product">
					<!-- PRODUCT-CATEGORY-HEADER END -->
					<div class="product-category-title">
						<!-- PRODUCT-CATEGORY-TITLE START -->
						<h1>
							<span class="cat-name"><?php echo $resultCat['tenLoai']; ?></span>
						</h1>
						<!-- PRODUCT-CATEGORY-TITLE END -->
					</div>


				</div>
				<!-- ALL GATEGORY-PRODUCT START -->
				<div class="all-gategory-product">
					<div class="row">
						<ul class="gategory-product">
							<?php
							$prodList = $prod->show_productbyCat($resultCat['maLoai']);
							if ($prodList) {
								while ($resultProd = $prodList->fetch_assoc()) {
									if ($resultProd['trangThaiSanPham'] == '1') {

										?>

										<!-- SINGLE ITEM START -->
										<li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">

											<div class="single-product-item">
												<div class="product-image">
													<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>"><img
															src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>"
															alt="product-image" /></a>
												</div>
												<div class="product-info">
													<div class="customar-comments-box">
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>
													</div>
													<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>">
														<span style="text-transform: uppercase;">
															<?php echo $textSh = $fm->textShorten($resultProd['tenSanPham'], 40); //Giới hạn kí tự để hiển thị 
																		?>
														</span>
													</a>
													<div class="price-box">
														<span class="price"><?php echo number_format($resultProd['giaSanPham']); ?>
															VNĐ</span>
													</div>
												</div>
											</div>

										</li>
										<!-- SINGLE ITEM END -->
										<?php
									}
								}
							}
							?>

						</ul>
					</div>

				</div>
				<!-- ALL GATEGORY-PRODUCT END -->


				<!-- PRODUCT-SHOOTING-RESULT START -->
				<div class="product-shooting-result product-shooting-result-border">

					<div class="phanTrang">
						<?php
						$productAll = $prod->getAllProductbyCat($resultCat['maLoai']);
						$productCount = mysqli_num_rows($productAll); //Đếm số dòng
						$productButton = ceil($productCount / 8); //Số button sẽ hiển thị,  sản phẩm/trang, ceil làm tròn
						//$i = 1;
						if (isset($_POST['sortby']) && !empty($_POST['sortby'])) {

						}

						if (!isset($_GET['trang'])) {
							$trangHienTai = 1;
						} else {
							$trangHienTai = $_GET['trang'];
						}

						if (isset($_GET['size']) && !empty($_GET['size'])) {
							$sizeSP = $_GET['size'];
							//Button Prev
							if ($trangHienTai > 1 && $productButton > 1) {
								echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&size=' . $sizeSP . '&trang=' . ($trangHienTai - 1) . ' "><i class="fa fa-angle-double-left"></i> Trang trước</a>';
							}

							//Create Button between start
							for ($i = 1; $i <= $productButton; $i++) {
								if ($i == $trangHienTai) {
									echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&size=' . $sizeSP . '&trang=' . $i . ' " style="background-color: grey;">' . $i . '</a>';   //echo và Active màu trang hiện tại
								} else {
									echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&size=' . $sizeSP . '&trang=' . $i . ' ">' . $i . '</a>';
								}

							}
							//Create Button between end
						
							//Button Next
							if ($trangHienTai < $productButton && $productButton > 1) {
								echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&size=' . $sizeSP . '&trang=' . ($trangHienTai + 1) . ' ">Trang sau <i class="fa fa-angle-double-right"></i></a>';
							}
						} else {
							//Button Prev
							if ($trangHienTai > 1 && $productButton > 1) {
								echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&trang=' . ($trangHienTai - 1) . ' "><i class="fa fa-angle-double-left"></i> Trang trước</a>';
							}

							//Create Button between start
							for ($i = 1; $i <= $productButton; $i++) {
								if ($i == $trangHienTai) {
									echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&trang=' . $i . ' " style="background-color: grey;">' . $i . '</a>';   //echo và Active màu trang hiện tại
								} else {
									echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&trang=' . $i . ' ">' . $i . '</a>';
								}

							}
							//Create Button between end
						
							//Button Next
							if ($trangHienTai < $productButton && $productButton > 1) {
								echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&trang=' . ($trangHienTai + 1) . ' ">Trang sau <i class="fa fa-angle-double-right"></i></a>';
							}
						}


						?>
					</div>
				</div>
				<!-- PRODUCT-SHOOTING-RESULT END -->
			</div>
		</div>
	</div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
<?php
include 'footer.php';
?>

<style type="text/css">
	.phanTrang a {
		text-decoration: none;
		cursor: pointer;
		color: black;
		float: left;
		padding: 5px 15px;
		border: 1px solid #999499;
		margin: 0px 2px 5px;
	}

	.phanTrang a:hover {
		background-color: grey;
		transition: 500ms;
	}
</style>
<!-- JS 
		===============================================-->

<script type="text/javascript">
	function thapcao() {

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