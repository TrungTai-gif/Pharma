<?php
session_start();
include 'includes/functions.php';

$token = $_GET['token'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_pass = $_POST['new_password'] ?? '';
    $token = $_POST['token'] ?? '';

    if (empty($new_pass) || empty($token)) {
        echo "❌ Thiếu thông tin.";
        exit;
    }

    $stmt = $connection->prepare("SELECT * FROM password_resets WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $expires = strtotime($row['expires']);

        if (time() > $expires) {
            echo "❌ Token đã hết hạn.";
            exit;
        }

        $email = $row['email'];
        $hashed = password_hash($new_pass, PASSWORD_DEFAULT);

        $update = $connection->prepare("UPDATE user SET user_password = ? WHERE email = ?");
        $update->bind_param("ss", $hashed, $email);
        $update->execute();

        $del = $connection->prepare("DELETE FROM password_resets WHERE email = ?");
        $del->bind_param("s", $email);
        $del->execute();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title>Pharma - Đặt lại mật khẩu thành công</title>
          <link rel="icon" href="images/logo.png" type="image/icon type">
          <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
        <body>
        <div class="container">
          <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top:50px;">
            <div class="panel panel-success">
              <div class="panel-heading text-center">
                <div class="panel-title">Thành công</div>
              </div>
              <div class="panel-body text-center" style="padding-top:30px;">
                ✅ Mật khẩu của bạn đã được cập nhật thành công!
                <br><br>
                <a href="login.php" class="btn btn-primary">Quay lại đăng nhập</a>
              </div>
            </div>
          </div>
        </div>
        </body>
        </html>
        <?php
        exit;
    } else {
        echo "❌ Token không hợp lệ.";
        exit;
    }
} else {
    if (empty($token)) {
        echo "❌ Thiếu token trong URL.";
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pharma - Đặt lại mật khẩu</title>
  <link rel="icon" href="images/logo.png" type="image/icon type">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
  <div id="resetbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title">Đặt lại mật khẩu</div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px">
          <a href="login.php">Quay lại đăng nhập</a>
        </div>
      </div>
      <div style="padding-top:30px;" class="panel-body">
        <form method="POST" class="form-horizontal">
          <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

          <div style="margin-bottom: 25px;" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" name="new_password" class="form-control" placeholder="Nhập mật khẩu mới" required>
          </div>

          <div style="margin-top:10px;" class="form-group">
            <div class="col-sm-12 controls">
              <button type="submit" class="btn btn-success">Cập nhật mật khẩu</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php } ?>
