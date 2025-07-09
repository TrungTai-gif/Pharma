<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
include 'includes/functions.php'; // để có $connection

if (isset($_POST['email'])) {
    $email = trim($_POST['email']);

    // ✅ Kiểm tra email có tồn tại trong bảng user không
    $check = $connection->prepare("SELECT user_id FROM user WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows === 0) {
        $_SESSION['message'] = "email_not_found";
        header("Location: login.php");
        exit;
    }

    $token = bin2hex(random_bytes(32));
    $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));

    // ❗Xoá token cũ nếu có
    $delOld = $connection->prepare("DELETE FROM password_resets WHERE email = ?");
    $delOld->bind_param("s", $email);
    $delOld->execute();

    // ✅ Thêm token mới
    $stmt = $connection->prepare("INSERT INTO password_resets (email, token, expires) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $token, $expires);
    $stmt->execute();

    // ✅ Gửi mail
    $mail = new PHPMailer(true);
    try {
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nguyentai2292005@gmail.com';
        $mail->Password = 'azidrvnjebntbjfh'; // Mật khẩu ứng dụng Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('nguyentai2292005@gmail.com', 'Pharma');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Đặt lại mật khẩu Pharma';
        $reset_link = "http://localhost/pharma/reset_password.php?token=$token";
        $mail->Body = "Click vào đây để đặt lại mật khẩu: <a href='$reset_link'>$reset_link</a>";

        $mail->send();

        // ✅ Hiển thị thông báo thành công
        $_SESSION['message'] = "reset_sent";
        header("Location: login.php");
        exit;
    } catch (Exception $e) {
        echo "❌ Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
    }
}
?>
