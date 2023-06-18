<?php
include('../config/database.php'); // veritabanı bağlantısı
$id = $_POST['id'];
$name = $_POST['isim'];
$surname = $_POST['soyisim'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$mobil = $_POST['phone'];

// Güvenli veri türüne dönüştürme
$id = mysqli_real_escape_string($conn, $id);
$name = mysqli_real_escape_string($conn, $name);
$surname = mysqli_real_escape_string($conn, $surname);
$mail = mysqli_real_escape_string($conn, $mail);
$pass = mysqli_real_escape_string($conn, $pass);
$mobil = mysqli_real_escape_string($conn, $mobil);

// UPDATE sorgusu
$sql = "UPDATE kullanici SET kullanici_isim='$name', kullanici_soyisim='$surname', kullanici_mail='$mail', kullanici_pass='$pass', kullanici_mobil='$mobil' WHERE kullanici_id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Kullanıcı başarıyla güncellendi";
    header('Location: ../danisman_listele.php');
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}
?>
