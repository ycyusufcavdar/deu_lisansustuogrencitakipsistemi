<?php
session_start();
include('../config/database.php');
// Formdan verileri al
$isim = $_POST['kullanici_isim'];
$soyisim = $_POST['kullanici_soyisim'];
$eposta = $_POST['kullanici_mail'];
$parola = $_POST['kullanici_pass'];
$mobil = $_POST['kullanici_mobil'];


// Güvenli veri türüne dönüştürme
$isim = mysqli_real_escape_string($conn, $isim);
$soyisim = mysqli_real_escape_string($conn, $soyisim);
$eposta = mysqli_real_escape_string($conn, $eposta);
$parola = mysqli_real_escape_string($conn, $parola);
$mobil = mysqli_real_escape_string($conn, $mobil);
$rol = "danisman";

// Veritabanına ekle
$sql = "INSERT INTO kullanici (kullanici_isim, kullanici_soyisim, kullanici_mail, kullanici_pass, kullanici_mobil, kullanici_rol)
        VALUES ('$isim', '$soyisim', '$eposta', '$parola', '$mobil', '$rol')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Danışman Ekleme İşlemi Başarıyla Gerçekleşti.";
    header('Location: ../danisman_ekle.php');
} else {
    $_SESSION['error_message'] = "Danışman Ekleme İşlemi Esnasında Bir Hata Meydana Geldi.";
    header('Location: ../danisman_ekle.php');
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
