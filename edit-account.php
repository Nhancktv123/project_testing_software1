<?php
session_start();
include_once 'config.php';
if(isset($_POST['id']) && isset($_POST['mail']) && isset($_POST['name'])  ){
     $id = $_POST['id'];
      $mail = $_POST['mail'];
        $name = $_POST['name'];
        $update = mysqli_query($conn,
        "UPDATE `tbl_khachhang` SET `hoTenKhachHang` = '$name', `thuDienTuKH` = '$mail' WHERE `maKhachHang` = '$id'");
        
        if($update)
        {
            echo '<script>alert("Chỉnh sửa thành công!");';
            header("location:information.php");
            
        }
        else {
            
            echo '<script>alert("Chỉnh sửa thất bại!");';
            header("location:information.php");
        }
       
   
}

?>