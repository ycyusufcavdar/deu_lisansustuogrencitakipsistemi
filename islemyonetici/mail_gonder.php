<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include('../config/database.php');

require '../vendor/autoload.php'; // PHPMailer kütüphanesinin yolunu düzenleyin

session_start();

// E-posta gönderme işlemini gerçekleştiren fonksiyon
function sendEmail($ogrenci_id, $recipient, $subject, $message, $conn) {
    $mail = new PHPMailer(true);

    try {
        // SMTP ayarları
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // E-posta sağlayıcınızın SMTP sunucusu
        $mail->SMTPAuth = true;
        $mail->Username = ''; // E-posta adresiniz
        $mail->Password = ''; // E-posta hesabınızın şifresi
        $mail->SMTPSecure = 'tls'; // TLS şifreleme türü
        $mail->Port = 587; // SMTP portu (örnekte Gmail'in SMTP portu)

        // E-posta gönderen bilgileri
        $mail->setFrom('', ''); // Gönderen

        // E-posta alıcıları
        $mail->addAddress($recipient);

        // E-posta içeriği
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // E-posta gönderme işlemi
        $mail->send();
        
        // Gönderilen e-postayı veritabanına kaydet
        $query = "INSERT INTO gonderilen_mailler (ogrenci_id, konu, mesaj) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iss", $ogrenci_id, $subject, $message);
        $stmt->execute();
        
        $_SESSION['success_message'] = "Mail Gönderme İşlemi Başarıyla Gerçekleşti.";
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Mail Gönderme İşlemi Esnasında Bir Hata Meydana Geldi: " . $e->getMessage();
    }
    
    // Form sayfasına yönlendirme
    header("Location: ../mail_gonder.php?ogrenci_id=$ogrenci_id");
    exit;
}

// Gönderilen veriyi kontrol et
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formdan gelen verileri al
    $ogrenci_id = isset($_POST['ogrenci_id']) ? $_POST['ogrenci_id'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Veri girişi denetimi
    if (empty($ogrenci_id) || empty($subject) || empty($message)) {
        $_SESSION['error_message'] = "Lütfen tüm alanları doldurun.";
        header("Location: ../mail_gonder.php?ogrenci_id=$ogrenci_id");
        exit;
    }

    // Öğrenci bilgilerini veritabanından çek
    $ogrenci_query = "SELECT * FROM ogrenci WHERE ogrenci_id = ?";
    $stmt = $conn->prepare($ogrenci_query);
    $stmt->bind_param("i", $ogrenci_id);
    $stmt->execute();
    $ogrenci_result = $stmt->get_result();
    $ogrenci = $ogrenci_result->fetch_assoc();

    // Öğrencinin mail adresini kontrol et
    if ($ogrenci && isset($ogrenci['ogrenci_mail'])) {
        $recipient = $ogrenci['ogrenci_mail'];
        sendEmail($ogrenci_id, $recipient, $subject, $message, $conn);
    } else {
        $_SESSION['error_message'] = "Öğrenci bulunamadı veya mail adresi kayıtlı değil.";
        header("Location: ../mail_gonder.php?ogrenci_id=$ogrenci_id");
        exit;
    }
}
?>
