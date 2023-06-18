<?php
session_start();
include('../config/database.php');

// Formdan verileri al
$ogrenci_id = $_POST['ogrenci'];
$icerik = $_POST['icerik'];
$bitis = $_POST['bitis'];

// Güvenli veri türüne dönüştürme
$ogrenci_id = mysqli_real_escape_string($conn, $ogrenci_id);
$icerik = mysqli_real_escape_string($conn, $icerik);
$bitis = mysqli_real_escape_string($conn, $bitis);

// SQL sorgusunu hazırla
$sql = "INSERT INTO dondurma_talepleri (ogrenci_id, dondurma_icerigi, bitis_tarihi)
        VALUES ('$ogrenci_id', '$icerik', '$bitis')";

// SQL sorgusunu çalıştır
if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Aşama Ekleme İşlemi Başarıyla Gerçekleşti.";
    header('Location: ../kayit_dondurma.php');
} else {
    $_SESSION['error_message'] = "Aşama Ekleme İşlemi Esnasında Bir Hata Meydana Geldi.";
    header('Location: ../kayit_dondurma.php');
}

$conn->close();
?>
