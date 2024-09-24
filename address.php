<?php
session_start();
  include 'config.php';
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
      $sId=session_id();
      if(isset($_POST['firstname'])) $firstname=$_POST['firstname']; //Tên 
      if(isset($_POST['phone'])) $phone=$_POST['phone']; //SDT
      if(isset($_POST['diachinh'])) $diachinh=$_POST['diachinh']; //địa chỉ giao hàng
      if(isset($_POST['addcomment'])) $Ghichu=$_POST['addcomment'];  //Ghi chú
      $diachigh = $diachinh;
      $makhachhang=$_SESSION['maKhachHang']; 
      $addthongtin=mysqli_query($conn,"
      INSERT INTO `web2`.`tbl_thongtingiaohang1`(`maKhachHang`,`tenNguoiNhan`,`soDienThoai`,`diachi`, `ghiChuKH`, `sessionID`)
      VALUES('$makhachhang','$firstname','$phone','$diachigh','$Ghichu','$sId') ");
      echo'n';
      header("location:checkout-shipping.php");
  }?>