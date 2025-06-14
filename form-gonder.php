<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$ad    = htmlspecialchars($_POST['ad']);
$mail  = htmlspecialchars($_POST['mail']);
$mesaj = htmlspecialchars($_POST['mesaj']);

$mailer = new PHPMailer(true);

try {
  $mailer->isSMTP();
  $mailer->Host = 'smtp.gmail.com';
  $mailer->SMTPAuth = true;
  $mailer->Username = 'gamerofturkey75@gmail.com';
  $mailer->Password = 'skgvflediogmiabq'; // 🔐 Senin Gmail uygulama şifren (boşluklar silinmiş haliyle)
  $mailer->SMTPSecure = 'tls';
  $mailer->Port = 587;

  $mailer->setFrom('gamerofturkey75@gmail.com', 'Kıvanç Doğalgaz');
  $mailer->addAddress('gamerofturkey75@gmail.com');

  $mailer->isHTML(true);
  $mailer->Subject = 'Kıvanç Doğalgaz - Yeni İletişim Mesajı';
  $mailer->Body    = "
    <strong>Ad:</strong> $ad <br>
    <strong>E-Posta:</strong> $mail <br><br>
    <strong>Mesaj:</strong><br>
    $mesaj
  ";

  $mailer->send();
  echo "✅ Mesaj başarıyla gönderildi!";
} catch (Exception $e) {
  echo "❌ Mail gönderilemedi: {$mailer->ErrorInfo}";
}
?>
