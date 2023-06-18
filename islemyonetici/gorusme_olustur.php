<?php
session_start();
include('../config/database.php');

// Formdan verileri al
$ogrenci_id = $_POST['ogrenci_id'];
$tez_id = $_POST['tez_id'];
$not = $_POST['not'];

// Güvenli veri türüne dönüştürme
$ogrenci_id = mysqli_real_escape_string($conn, $ogrenci_id);
$tez_id = mysqli_real_escape_string($conn, $tez_id);
$not = mysqli_real_escape_string($conn, $not);
// Hazırlanan sorguyu güvenceye al
$sql = "INSERT INTO tez_gorusme (ogrenci_id, tez_id, gorusme_notu)
        VALUES ('$ogrenci_id', '$tez_id', '$not')";

// SQL sorgusunu çalıştır
if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Aşama Ekleme İşlemi Başarıyla Gerçekleşti.";
    header('Location: ../gorusme_olustur.php?ogrenci_id=' . $ogrenci_id .'&tez_id='.$tez_id);
} else {
    $_SESSION['error_message'] = "Aşama Ekleme İşlemi Esnasında Bir Hata Meydana Geldi.";
    header('Location: ../gorusme_olustur.php?ogrenci_id=' . $ogrenci_id .'&tez_id='.$tez_id);
}

$conn->close();
?>
