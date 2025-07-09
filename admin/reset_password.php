<?php
session_start();
include '../includes/functions.php';

$token = $_GET['token'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_pass = $_POST['new_password'] ?? '';
    $token = $_POST['token'] ?? '';

    if (empty($new_pass) || empty($token)) {
        echo "❌ Thiếu thông tin.";
        exit;
    }

    $stmt = $connection->prepare("SELECT * FROM admin_password_resets WHERE token = ?");
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

        $update = $connection->prepare("UPDATE admin SET admin_password = ? WHERE admin_email = ?");
        $update->bind_param("ss", $hashed, $email);
        $update->execute();

        $del = $connection->prepare("DELETE FROM admin_password_resets WHERE email = ?");
        $del->bind_param("s", $email);
        $del->execute();

        ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title>Pharma Admin - Cập nhật mật khẩu</title>
          <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
        <div class="container">
          <div class="col-md-6 col-md-offset-3" style="margin-top:50px">
            <div class="alert alert-success text-center">
              ✅ Mật khẩu quản trị viên đã được cập nhật!
              <br><br>
              <a href="login.php" class="btn btn-primary">Quay lại đăng nhập</a>
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
  <title>Pharma Admin - Đặt lại mật khẩu</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <div class="col-md-6 col-md-offset-3" style="margin-top:50px">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title">Đặt lại mật khẩu quản trị viên</div>
      </div>
      <div class="panel-body">
        <form method="POST" class="form-horizontal">
          <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" name="new_password" class="form-control" placeholder="Nhập mật khẩu mới" required>
          </div>
          <div class="form-group">
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
