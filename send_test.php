<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$mail = new PHPMailer(true);

try {
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'nguyentai2292005@gmail.com'; // Gmail của bạn
    $mail->Password   = 'azidrvnjebntbjfh';           // Mật khẩu ứng dụng (ghi liền không dấu cách)
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Người gửi
    $mail->setFrom('nguyentai2292005@gmail.com', 'Pharma Support');

    // Người nhận (có thể thay bằng chính bạn để test)
    $mail->addAddress('nguyentai2292005@gmail.com', 'Người dùng');

    // Nội dung
    $mail->isHTML(true);
    $mail->Subject = '🎉 Gửi thử nghiệm thành công';
    $mail->Body    = 'Đây là email thử nghiệm gửi từ website Pharma qua PHPMailer + Gmail SMTP.';

    $mail->send();
    echo '✅ Gửi email thành công!';
} catch (Exception $e) {
    echo "❌ Gửi email thất bại. Lỗi: {$mail->ErrorInfo}";
}
?>
