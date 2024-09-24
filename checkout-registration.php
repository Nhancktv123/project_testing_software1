<?php
	$pageTitle = "ĐĂNG KÝ | DÉP MWC - Hệ thống dép chính hãng";
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
                <h2 class="page-title">Tạo một tài khoản</h2>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- PERSONAL-INFOMATION START -->
                <div class="personal-infomation">
                    <form class="primari-box personal-info-box" id="formDangKy" method="post" action="check.php">
                        <h3 class="box-subheading">Thông tin cá nhân của bạn</h3>
                        <div class="personal-info-content">
                            <?php
							 // Kiểm tra các kết quả trả về từ trang khác thông qua GET
									if ( isset($_GET['resultCheck'])) {
											$resultCheck = $_GET['resultCheck'];
											// Kiểm tra và hiển thị thông báo lỗi tương ứng
											if ($resultCheck == 'tdn') echo "<span style='color: red' >Tên đăng nhập đã tồn tại vui lòng nhập lại</span>";
											else if ($resultCheck == 'email') echo "<span style='color: red' >Email đã tồn tại vui lòng nhập lại</span>";
											else if ($resultCheck == 'age')  echo "<span style='color: red' >Tuổi phải từ 15 trở lên</span>";
										} 
									?>
                            <div class="form-group primary-form-group p-info-group">
                                <label for="firstname">Họ tên<sup>*</sup></label>
                                <input type="text" placeholder="Nhập họ tên..." name="hoTen_input" id="hoTen_input"
                                    class="form-control input-feild" required>
                            </div>

                            <div class="form-group primary-form-group p-info-group">
                                <label for="email">Email<sup>*</sup></label>
                                <input type="email" placeholder="Nhập email..." name="email_input" id="email_input"
                                    class="form-control input-feild" required>
                            </div>
                            <div class="form-group primary-form-group p-info-group">
                                <label>Ngày sinh <sup>*</sup></label>
                                <input type="date" name="ngaySinh_input" class="form-control input-feild" required>

                            </div>


                            <div class="form-group primary-form-group p-info-group">
                                <label for="firstname">Tên đăng nhập<sup>*</sup></label>
                                <input type="text" placeholder="Nhập tên đăng nhập..." name="tenDangNhap_input"
                                    id="firstname" class="form-control input-feild" required>
                            </div>
                            <div class="form-group primary-form-group p-info-group">
                                <label for="password">Mật khẩu <sup>*</sup></label>
                                <input type="password" placeholder="Nhập mật khẩu..." name="matKhau_input"
                                    id="matKhau_input" class="form-control input-feild" required>
                            </div>
                            <div class="form-group primary-form-group p-info-group">
                                <label for="password">Nhập lại mật khẩu <sup>*</sup></label>
                                <input type="password" placeholder="Nhập lại mật khẩu..." name="nhapLaiMatKhau_input"
                                    id="nhapLaiMatKhau_input" class="form-control input-feild" required>
                            </div>


                            <br>
                            <div class="submit-button p-info-submit-button">
                                <input type="submit" id="SubmitCreate" class="btn main-btn" value="ĐĂNG KÍ">


                            </div>
                        </div>
                    </form>
                </div>
                <!-- PERSONAL-INFOMATION END -->
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
<!-- <script src="js/vendor/jquery-1.11.3.min.js"></script> -->
<!-- Jquery JS-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.validate.min.js"></script>

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

<!-- Check validation Jquery-->
<script>
$(document).ready(function() {
    $("#formDangKy").validate({
        errorClass: 'errorMessage',
        rules: {
            hoTen_input: {
                required: true,
                maxlength: 20,
                minlength: 6
            },
            email_input: {
                required: true,
                maxlength: 50,
                minlength: 6,
                email: true
            },
            ngaySinh_input: {
                required: true,
                date: true
            },

            tenDangNhap_input: {
                required: true,
                maxlength: 20,
                minlength: 6,
            },
            matKhau_input: {
                required: true,
                maxlength: 15,
                minlength: 6,
            },
            nhapLaiMatKhau_input: {
                required: true,
                maxlength: 15,
                minlength: 6,
                equalTo: "#matKhau_input"
            },

        },
        messages: {
            hoTen_input: {
                required: "Vui lòng nhập họ tên",
                maxlength: "Họ tên tối đa 20 kí tự",
                minlength: "Họ tên tối thiểu 6 kí tự",
            },
            email_input: {
                required: "Vui lòng nhập email",
                maxlength: "Email tối đa 50 kí tự",
                minlength: "Email tối thiểu 6 kí tự",
                email: "Vui lòng nhập đúng định dạng email"
            },
            ngaySinh_input: "Vui lòng chọn ngày sinh",

            tenDangNhap_input: {
                required: "Vui lòng nhập tên tài khoản",
                maxlength: "Tên tài khoản tối đa 20 kí tự",
                minlength: "Tên tài khoản tối thiểu 6 kí tự",
            },
            matKhau_input: {
                required: "Vui lòng nhập mật khẩu",
                maxlength: "Mật khẩu tối đa 15 kí tự",
                minlength: "Mật khẩu tối thiểu 6 kí tự",
            },
            nhapLaiMatKhau_input: {
                required: "Vui lòng nhập lại mật khẩu",
                maxlength: "Mật khẩu tối đa 15 kí tự",
                minlength: "Mật khẩu tối thiểu 6 kí tự",
                equalTo: "Xác nhận mật khẩu không khớp với mật khẩu!"
            },
        }
    });
});
</script>
<!-- main js -->
<script src="js/main.js"></script>
</body>

</html>