<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
include_once 'config.php';

// Khởi tạo biến với giá trị rỗng
$loginname = '';
$loginpassword = '';

// Nếu có yêu cầu gửi dữ liệu POST từ form đăng nhập
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   // Lấy dữ liệu từ các ô input tương ứng
   if (isset($_POST['loginname'])) {
      $loginname = $_POST['loginname'];
   }
   if (isset($_POST['loginpassword'])) {
      $loginpassword = $_POST['loginpassword'];
   }

   // Kiểm tra tên và mật khẩu nhập vào đã có trong csdl hay chưa
   $query = "SELECT `tenDangNhap`, `matKhau`, `trangThai` FROM `web2`.`tbl_khachhang` WHERE (`tenDangNhap`='$loginname' AND `matKhau`= md5('$loginpassword'))";
   $result = mysqli_query($conn, $query);

   // Lấy dòng dữ liệu kết quả
   $row = mysqli_fetch_assoc($result);

   if ($row) {
      // Kiểm tra trạng thái của tài khoản
      if ($row['trangThai'] == 'Active') {
         // Lưu thông tin đăng nhập và chuyển hướng tới trang chủ
         $_SESSION['ten'] = $row['tenDangNhap'];
         header("location: index.php");
      } else {
         // Tài khoản bị khóa, xuất hiện thông báo lỗi
         $_SESSION['success'] = 'TÀI KHOẢN ĐÃ BỊ KHÓA!!!';
         header("location: registration.php");
      }
   } else {
      // Nếu không tìm thấy thì xuất hiện thông báo lỗi
      $_SESSION['success'] = 'SAI THÔNG TIN ĐĂNG NHẬP!!!';
      header("location: registration.php");
   }
}

mysqli_close($conn);

?>
