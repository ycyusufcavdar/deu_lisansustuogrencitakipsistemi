<?php
// Veritabanı bağlantısı
include('../config/database.php');

// Seçilen kullanıcının id'sini alalım
$id = $_GET['id'];

// Güvenli veri türüne dönüştürme
$id = mysqli_real_escape_string($conn, $id);

// Veritabanından kullanıcıyı silelim
$sql = "DELETE FROM dondurma_talepleri WHERE talep_id = '$id'";
$result = $conn->query($sql);

// Kullanıcı silindikten sonra, kullanıcılar listesine yönlendirelim
header('Location: ../kayit_dondurma_listesi.php');
exit();
?>
