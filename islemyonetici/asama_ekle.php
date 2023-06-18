<?php
session_start();
include('../config/database.php');

// Formdan verileri al
$isim = $_POST['asama_adi'];
$program = $_POST['program'];

// Güvenli veri türüne dönüştürme
$isim = mysqli_real_escape_string($conn, $isim);
$program = mysqli_real_escape_string($conn, $program);

// Hazırlanan sorguyu güvenceye al
$sql = "INSERT INTO ogrenci_asama (asama_adi, program_id)
        VALUES ('$isim', '$program')";

// SQL sorgusunu çalıştır
if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Aşama Ekleme İşlemi Başarıyla Gerçekleşti.";
    header('Location: ../asama_ekle.php');
} else {
    $_SESSION['error_message'] = "Aşama Ekleme İşlemi Esnasında Bir Hata Meydana Geldi.";
    header('Location: ../asama_ekle.php');
}

$conn->close();
?>
