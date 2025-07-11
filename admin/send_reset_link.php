<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';
require '../phpmailer/Exception.php';
include '../includes/functions.php'; // chứa $connection

if (isset($_POST['email'])) {
    $email = trim($_POST['email']);

    // ✅ KIỂM TRA email có tồn tại trong bảng admin không
    $checkStmt = $connection->prepare("SELECT admin_id FROM admin WHERE admin_email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows === 0) {
        // ❌ Không tìm thấy email admin
        $_SESSION['message'] = "admin_email_not_found";
        header("Location: login.php");
        exit;
    }

    // ✅ Có admin → tạo token và gửi mail
    $token = bin2hex(random_bytes(32));
    $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));

    // Xoá token cũ nếu có
    $delOld = $connection->prepare("DELETE FROM admin_password_resets WHERE email = ?");
    $delOld->bind_param("s", $email);
    $delOld->execute();

    // Lưu token mới
    $stmt = $connection->prepare("INSERT INTO admin_password_resets (email, token, expires) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $token, $expires);
    $stmt->execute();

    // ✅ Gửi email
    $mail = new PHPMailer(true);
    try {
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nguyentai2292005@gmail.com';
        $mail->Password = 'azidrvnjebntbjfh'; // Mật khẩu ứng dụng
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('nguyentai2292005@gmail.com', 'Pharma Admin');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Đặt lại mật khẩu Admin - Pharma';
        $reset_link = "http://localhost/Pharma/admin/reset_password.php?token=$token";
        $mail->Body = "Click vào đây để đặt lại mật khẩu quản trị viên: <a href='$reset_link'>$reset_link</a>";

        $mail->send();
        $_SESSION['message'] = "reset_sent";
        header("Location: login.php");
        exit;
    } catch (Exception $e) {
        echo "❌ Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
    }
}
?>
