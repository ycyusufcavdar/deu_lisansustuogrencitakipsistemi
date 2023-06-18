<?php
session_start();
include('../config/database.php');

// Formdan verileri al ve güvenli hale getir
$isim = mysqli_real_escape_string($conn, $_POST['program_adi']);
$tez = mysqli_real_escape_string($conn, $_POST['tez_asamasi']);

// SQL sorgusunu hazırla
$sql = "INSERT INTO ogrenci_program (program_isim, tez_asamasi)
        VALUES ('$isim', '$tez')";

// SQL sorgusunu çalıştır
if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Program Ekleme İşlemi Başarıyla Gerçekleşti.";
    header('Location: ../program_ekle.php');
} else {
    $_SESSION['error_message'] = "Program Ekleme İşlemi Esnasında Bir Hata Meydana Geldi.";
    header('Location: ../program_ekle.php');
}

$conn->close();
?>
