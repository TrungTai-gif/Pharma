<?php
session_start();
include 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pharma - Quên mật khẩu</title>
  <link rel="icon" href="images/logo.png" type="image/icon type">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<div class="container">
  <div id="forgotbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title">Quên mật khẩu</div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px">
          <a href="login.php">Quay lại đăng nhập</a>
        </div>
      </div>
      <div style="padding-top:30px" class="panel-body">
        <?php message(); ?>
        <form class="form-horizontal" method="POST" action="send_reset_link.php">
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Nhập email bạn đã đăng ký" required>
          </div>

          <div style="margin-top:10px" class="form-group">
            <div class="col-sm-12 controls">
              <button type="submit" class="btn btn-success">Gửi liên kết đặt lại mật khẩu</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
