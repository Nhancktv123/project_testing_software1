<?php
    include 'classes/adminlogin.php';
?>
<?php
    $class = new adminlogin();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
        $tenDangNhap = $_POST['tenDangNhap'];
        $matKhau = $_POST['matKhau'];

        $login_check = $class->login_admin($tenDangNhap,$matKhau);
    }
    
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ĐĂNG NHẬP TRANG QUẢN TRỊ</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="shortcut icon" type="image/x-icon" href="unnamed.png">
    </head>
    <body style="margin-top: 8%;">

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">ĐĂNG NHẬP TRANG QUẢN TRỊ</h3>
                        </div>
                        <span style="margin-left: 4%;color: red;">
                            <?php 
                                if (isset($login_check)) echo $login_check;
                            ?>
                        </span>
                        <div class="panel-body">
                            <form role="form" action="index.php" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Tên đăng nhập" name="tenDangNhap" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Mật khẩu" name="matKhau" type="password" value="">
                                    </div>
                                    <input type="submit" value="Đăng nhập" class="btn btn-lg btn-success btn-block">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
