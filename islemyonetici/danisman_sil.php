<?php
// Veritabanı bağlantısı
include('../config/database.php');

// Seçilen kullanıcının id'sini alalım
$id = $_GET['id'];

// Güvenli veri türüne dönüştürme
$id = mysqli_real_escape_string($conn, $id);

// Veritabanından kullanıcıyı silelim
$sql = "DELETE FROM kullanici WHERE kullanici_id = $id";
$result = $conn->query($sql);

// Kullanıcı silindikten sonra, kullanıcılar listesine yönlendirelim
header('Location: ../danisman_listele.php');
exit();
?>
