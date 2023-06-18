<?php
session_start();
include('../config/database.php');

// Formdan verileri al
$asama = $_POST['asama_id'];
$ogrenci = $_POST['ogrenci_id'];
$not = $_POST['asama_notu'];

// Güvenli veri türüne dönüştürme
$asama = mysqli_real_escape_string($conn, $asama);
$ogrenci = mysqli_real_escape_string($conn, $ogrenci);
$not = mysqli_real_escape_string($conn, $not);

// Danışman id'si belirtilmemiş ise NULL olarak ayarla
$select_query = "SELECT asama_seviyesi FROM ogrenci_asama WHERE asama_id = $asama";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $asama_seviyesi = $row['asama_seviyesi'];
}

// Hazırlanan sorguları güvenceye al
$sql = "INSERT INTO asama_notlari (ogrenci_id, asama_id, danisman_notu)
        VALUES ('$ogrenci', '$asama', '$not')";

$update_query = "UPDATE ogrenci SET aktif_asama = $asama_seviyesi WHERE ogrenci_id = $ogrenci";

// SQL sorgusunu çalıştır
if ($conn->query($sql) === TRUE && $conn->query($update_query) === TRUE) {
    $_SESSION['success_message'] = "Danışman Notu Ekleme İşlemi Başarıyla Gerçekleşti.";
    header('Location: ../asama_belirle.php');
} else {
    $_SESSION['error_message'] = "Danışman Notu Ekleme İşlemi Esnasında Bir Hata Meydana Geldi.";
    header('Location: ../asama_belirle.php');
}

$conn->close();
?>
