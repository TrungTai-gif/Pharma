<?php
session_start();
include "includes/functions.php";
login();
?>

<head>
    <title>PharmEasy</title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Đăng nhập</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="forgot_password.php">Quên mật khẩu?</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body">
                
                <!-- ✅ Hiển thị thông báo nếu có -->
                <?php
                if (isset($_SESSION['message']) && $_SESSION['message'] == "reset_sent") {
                    echo "<div class='alert alert-success' style='position: fixed; top: 20px; right: 20px; z-index: 9999;' role='alert'>
                        ✅ Liên kết đặt lại mật khẩu đã được gửi tới email của bạn!
                    </div>";
                    unset($_SESSION['message']);
                }

                message(); // thông báo lỗi khác
                ?>

                <form id="loginform" class="form-horizontal" role="form" method="post" action="login.php">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="userEmail" value="" placeholder="Email">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    </div>

                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input id="btn-login" class="btn btn-success" type="submit" value="Đăng nhập" name="login" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                Bạn chưa có tài khoản?
                                <a href="signUp.php">Đăng ký tại đây</a>
                                <br><br>
                                <a href="admin/login.php">Đăng nhập dành cho quản trị viên</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- ✅ Tự động ẩn alert sau 3s -->
<script>
  setTimeout(() => {
    const alert = document.querySelector('.alert');
    if (alert) alert.style.display = 'none';
  }, 3000);
</script>
