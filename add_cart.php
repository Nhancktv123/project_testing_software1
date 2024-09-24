<?php
session_start(); //bắt đầu một phiên làm việc mới hoặc khôi phục một phiên làm việc đã có trước đó
include_once 'config.php'; //kết nối với cơ sở dữ liệu.
if($_SERVER['REQUEST_METHOD']==="POST") //kiểm tra có phải là một yêu cầu POST hay không, POST được sử dụng để truyền dữ liệu đến máy chủ. 
                                        //Nếu yêu cầu này là một yêu cầu POST, thì đoạn mã bên dưới sẽ được thực thi.
{
  if(isset($_GET['id'])) $id=$_GET['id']; 
  if(isset($_POST['qtybutton'])) $qty=$_POST['qtybutton']; //lấy thông tin sản phẩm và số lượng sản phẩm mà khách hàng muốn mua.
  
  // lấy thông tin chi tiết của sản phẩm
  $sId=session_id(); //trả về một chuỗi đại diện cho phiên làm việc hiện tại
  $product=mysqli_query($conn,"SELECT * FROM `tbl_sanpham` WHERE `maSanPham`='$id' ");//thực thi một truy vấn với cơ sở dữ liệu.

  //Dùng để lấy các thông tin chi tiết về sản phẩm mà khách hàng đang muốn mua, như tên, giá, miêu tả, hình ảnh,…
   $row=mysqli_fetch_assoc($product);
   $maLoai=$row['maLoai'];
   $tenSanPham=$row['tenSanPham'];
   $size=$row['sizeSanPham'];
   $mieuTaSanPham=$row['mieuTaSanPham'];
   $giaSanPham=$row['giaSanPham'];
   $hinhAnhSanPham=$row['hinhAnhSanPham'];
   $slspHienCo = $row['soLuongSanPham'];

   // kiểm tra xem số lượng sản phẩm đó có đủ trong kho
    if( ($qty>0) && ($qty <= $slspHienCo) ){
          $insert=mysqli_query($conn,"
          INSERT INTO `web2`.`tbl_giohang`(`id_giohang`,`maSanPham`,`soLuongSanPham`,`sessionID`,`maLoai`,`tenSanPham`,`sizeSanPham`,`mieuTaSanPham`,`giaSanPham`,`hinhAnhSanPham`)
          VALUES(NULL,'$id','$qty','$sId','$maLoai','$tenSanPham','$size','$mieuTaSanPham','$giaSanPham','$hinhAnhSanPham') ");

    }else{
      echo "<script>alert('Số lượng không hợp lệ!');
       window.location = 'single-product.php?maSanPham=$id';</script>";
    }

    if($insert)
            {
              //<!-- Tính số lượng sản phẩm trong giỏ hàng--> 
              header("location:single-product.php?maSanPham=$id ");
              //Nếu sản phẩm được thêm vào giỏ hàng thành công, trang web sẽ được chuyển hướng đến trang sản phẩm cụ thể 
            }
             else {
              echo "<script>alert('Số lượng không hợp lệ!');
              window.location = 'single-product.php?maSanPham=$id';</script>";
             }


}
mysqli_close($conn);
?>