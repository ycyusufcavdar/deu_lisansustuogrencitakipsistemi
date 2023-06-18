<?php
session_start();
include('../config/database.php');

// Formdan verileri al ve güvenli hale getir
$isim = mysqli_real_escape_string($conn, $_POST['ogrenci_isim']);
$soyisim = mysqli_real_escape_string($conn, $_POST['ogrenci_soyisim']);
$eposta = mysqli_real_escape_string($conn, $_POST['ogrenci_mail']);
$mobil = mysqli_real_escape_string($conn, $_POST['ogrenci_mobil']);
$program = mysqli_real_escape_string($conn, $_POST['program']);
$danisman = mysqli_real_escape_string($conn, $_POST['danisman']);

// Danışman id'si belirtilmemiş ise NULL olarak ayarla
if(empty($danisman)){
    $danisman = "NULL";
}

// SQL sorgusunu hazırla
$sql = "INSERT INTO ogrenci (ogrenci_isim, ogrenci_soyisim, ogrenci_mail, ogrenci_mobil, program_id, danisman_id)
        VALUES ('$isim', '$soyisim', '$eposta', '$mobil', '$program', $danisman)";

// SQL sorgusunu çalıştır
if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Öğrenci Ekleme İşlemi Başarıyla Gerçekleşti.";
    header('Location: ../ogrenci_ekle.php');
} else {
    $_SESSION['error_message'] = "Öğrenci Ekleme İşlemi Esnasında Bir Hata Meydana Geldi.";
    header('Location: ../ogrenci_ekle.php');
}

$conn->close();
?>
