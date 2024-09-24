<?php 
    if (session_status() == PHP_SESSION_NONE) {
		   session_start();
	  }

	  $sID = session_id();  

	include_once 'classes/product.php';
	include_once 'classes/category.php';
	include 'config.php';
	
	$ds=mysqli_query($conn,"SELECT `id_giohang`,`sessionID`, SUM(soLuongSanPham) FROM `tbl_giohang` WHERE `sessionID`='$sID' ");
    $datads = mysqli_fetch_assoc($ds);
    $soluongsanpham= $datads['SUM(soLuongSanPham)'];
              
    $_SESSION['soluong']=$soluongsanpham;

?>
<?php 
	$prod = new product();
	$cat = new category();

?>
<!doctype html>

<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= isset($pageTitle) ? $pageTitle : "DÉP MWC - Hệ thống dép chính hãng"?></title>
    <?php if (function_exists('customPageHeader')){
      		customPageHeader();
    	}?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <script src="library/jquery-3.4.1.min.js"></script>
    <!-- FONTS
		============================================ -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,400italic&amp;subset=latin,latin-ext'
        rel='stylesheet' type='text/css'>

    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">

    <!-- FANCYBOX CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.fancybox.css">

    <!-- BXSLIDER CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.bxslider.css">

    <!-- MEANMENU CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">

    <!-- JQUERY-UI-SLIDER CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery-ui-slider.css">

    <!-- NIVO SLIDER CSS
		============================================ -->
    <link rel="stylesheet" href="css/nivo-slider.css">

    <!-- OWL CAROUSEL CSS 	
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">

    <!-- OWL CAROUSEL THEME CSS 	
		============================================ -->
    <link rel="stylesheet" href="css/owl.theme.css">

    <!-- BOOTSTRAP CSS 
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FONT AWESOME CSS 
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- NORMALIZE CSS 
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">

    <!-- MAIN CSS 
		============================================ -->
    <link rel="stylesheet" href="css/main.css">

    <!-- STYLE CSS 
		============================================ -->
    <link rel="stylesheet" href="style.css">

    <!-- RESPONSIVE CSS 
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- IE CSS 
		============================================ -->
    <link rel="stylesheet" href="css/ie.css">

    <!-- MODERNIZR JS 
		============================================ -->
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <!-- MODERNIZR JS 
		============================================ -->
    <script src="js/check.js"></script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script-->
    <script src="js/jquery.min.js"></script>


    <style>
    label.errorMessage {
        border-color: red;
        color: red;
    }
    </style>
</head>

<body>


    <!-- Add your site or application content here -->

    <!-- HEADER-TOP START -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- HEADER-LEFT-MENU START -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-left-menu">
                        <div class="welcome-info">
                            CHÀO MỪNG ĐẾN VỚI <span>MWC</span>
                        </div>

                    </div>
                </div>
                <!-- HEADER-LEFT-MENU END -->
                <!-- HEADER-RIGHT-MENU START -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-right-menu">
                        <nav>
                            <ul class="list-inline">
                                <li><a href="order_status.php">Kiểm tra đơn hàng</a></li>
                                <?php
									//$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
									 if(isset($_SESSION['ten']))
									{
										$ten=$_SESSION['ten'];
										$khachhang=mysqli_query($conn,"SELECT `maKhachHang`,`tenDangNhap` FROM `tbl_khachhang` WHERE `tenDangNhap`='$ten' ");
										$row=mysqli_fetch_assoc($khachhang);
										$_SESSION['maKhachHang']=$row['maKhachHang'];
										echo'<li style="font-size:17px" ><a href="my-account.php" id="userNameAccount" >'.$ten.'</a></li>';
									}
									else {
										echo'<li class="tenDN"><a href="registration.php">ĐĂNG NHẬP / ĐĂNG KÝ</a></li>';
									}?>

                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- HEADER-TOP END -->
    <!-- HEADER-MIDDLE START -->
    <section class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- LOGO START -->
                    <div class="logo">
                        <a href="index.php"><img src="img/logo.png" alt="MVC logo" /></a>
                    </div>
                    <!-- LOGO END -->
                    <!-- CATEGORYS-PRODUCT-SEARCH START -->
                    <div class="categorys-product-search">
                        <form action="search-result.php" method="get" name="form-search" class="search-form-cat"
                            onsubmit=" return checkSearch();">
                            <div class="search-product form-group">
                                <input type="text" style="width:90%;" class="form-control search-form" name="nameSearch"
                                    placeholder="Tìm kiếm... "
                                    value="<?php if(isset($_GET['nameSearch'])) echo $_GET['nameSearch'] 			
									?>" />
                                <input class="search-button" style="width:15%; text-align: center;" value="Tìm kiếm"
                                    name="search" id="search" type="submit">
                            </div>
                        </form>
                    </div>
                    <!-- CATEGORYS-PRODUCT-SEARCH END -->
                </div>
            </div>
        </div>
    </section>
    <!-- HEADER-MIDDLE END -->
    <!-- MAIN-MENU-AREA START -->
    <header class="main-menu-area">
        <div class="container">
            <div class="row">
                <!-- SHOPPING-CART START -->
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right shopingcartarea">
                    <div class="shopping-cart-out pull-right">
                        <div class="shopping-cart">
                            <a class="shop-link" href="cart.php" title="View my shopping cart">
                                <i class="fa fa-shopping-cart cart-icon"></i>
                                <b>GIỎ HÀNG</b>
                                <span class="ajax-cart-quantity">
                                    <?php 
									     if(isset($_SESSION['soluong']))
									       {
										  $sanpham= $_SESSION['soluong'];
										  echo $sanpham;
										 } 
										   else{
										   	echo 0;
										   }
									   ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- SHOPPING-CART END -->
                <!-- MAINMENU START -->
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding-right menuarea">
                    <div class="mainmenu">
                        <nav>
                            <ul class="list-inline mega-menu">
                                <li class="active"><a href="index.php">TRANG CHỦ</a>
                                </li>
                                <?php 
										$catTitle = $cat->show_categoryLimit5();
										if ($catTitle){
											while ($resultCatTitle = $catTitle->fetch_assoc()){	
									?>
                                <li>
                                    <a href="shop-gird.php?maLoai=<?php echo $resultCatTitle['maLoai']; ?>">DÉP
                                        <?php echo $resultCatTitle['tenLoai']; ?></a>
                                </li>
                                <?php 
										}
									}
									?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- MAINMENU END -->
                <div class="row">
                    <!-- MOBILE MENU START -->
                    <div class="col-sm-12 mobile-menu-area">
                        <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                            <span class="mobile-menu-title">MENU</span>
                            <nav>
                                <ul>
                                    <?php 
										$catTitle = $cat->show_categoryLimit5();
										if ($catTitle){
											while ($resultCatTitle = $catTitle->fetch_assoc()){
									?>
                                    <li>
                                        <a href="shop-gird.php?maLoai=<?php echo $resultCatTitle['maLoai']; ?>">DÉP
                                            <?php echo $resultCatTitle['tenLoai']; ?></a>
                                    </li>
                                    <?php 
										}
									}
									?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- MOBILE MENU END -->
                </div>
            </div>
    </header>
    <!-- MAIN-MENU-AREA END -->