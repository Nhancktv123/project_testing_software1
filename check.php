<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
include_once 'config.php';
// Khởi tạo các biến với giá trị rỗng
$firstname = '';
$password = '';
$mail = '';

// Nếu có yêu cầu gửi dữ liệu POST từ form đăng ký
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   // Kiểm tra các ô input cần thiết đã được điền đầy đủ
   if (
      isset($_POST['hoTen_input']) && isset($_POST['email_input']) && isset($_POST['ngaySinh_input']) &&
      isset($_POST['tenDangNhap_input']) && isset($_POST['matKhau_input'])
   ) {
      // Lấy dữ liệu từ ô input tương ứng
      $hoTen = $_POST['hoTen_input'];
      $email = $_POST['email_input'];
      $ngaySinh = $_POST['ngaySinh_input'];
      $tenDangNhap = $_POST['tenDangNhap_input'];
      $matKhau = md5($_POST['matKhau_input']); 
      $date = getdate();
      $yearDate = $date['year'];

      // Kiểm tra xem tên đăng nhập đã tồn tại hay chưa
      $check = mysqli_num_rows(mysqli_query($conn, "SELECT `tenDangNhap` FROM `web2`.`tbl_khachhang` WHERE (`tenDangNhap`='$tenDangNhap' )")) > 0;
      if ($check) {
         // Nếu đã tồn tại, trả về thông báo lỗi và chuyển hướng trở lại trang đăng ký
         $resultCheck = "<span style='color: red' >Tên đăng nhập đã tồn tại vui lòng nhập lại</span>";
         $_SESSION['resultCheck'] = $resultCheck;
         header('location: checkout-registration.php?resultCheck=tdn');
      }

      // Kiểm tra xem email đã tồn tại hay chưa
      if ($check1 = mysqli_num_rows(mysqli_query($conn, "SELECT `thuDienTuKH` FROM `web2`.`tbl_khachhang` WHERE (`thuDienTuKH`='$email' )")) > 0) {
         // Nếu đã tồn tại, trả về thông báo lỗi và chuyển hướng trở lại trang đăng ký
         $resultCheck = "<span style='color: red' >Email đã tồn tại vui lòng nhập lại</span>";
         $_SESSION['resultCheck'] = $resultCheck;
         header('location: checkout-registration.php?resultCheck=email');
      }

      // Nếu không có lỗi gì, lưu thông tin khách hàng vào cơ sở dữ liệu
      if (!$check && !$check1) {
         // Tạo sql query để lưu thông tin vào csdl
         $sqlquery = "INSERT INTO `web2`.`tbl_khachhang`(`maKhachHang`,`tenDangNhap`,`hoTenKhachHang`,`thuDienTuKH`,`matKhau`, `ngaySinh`)
         VALUES(NULL,'$tenDangNhap','$hoTen','$email','$matKhau', '$ngaySinh')";

         // Hiển thị được query string 
         echo $sqlquery;

         // Thực hiện lưu thông tin vào cơ sở dữ liệu
         $addmember = mysqli_query($conn, $sqlquery);

         // Nếu lưu thành công, đăng nhập và chuyển hướng về trang chủ
         if ($addmember) {
            $_SESSION['ten'] = $tenDangNhap;
            header('location:index.php');
         } else {
            // Nếu lưu không thành công, hiển thị thông báo lỗi
            echo "thất bại";
         }
      }
   }
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);

?>
