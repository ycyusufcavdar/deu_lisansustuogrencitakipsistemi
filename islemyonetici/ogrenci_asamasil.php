<?php
    // Veritabanı bağlantısı
    include('../config/database.php');

    // Seçilen kullanıcının id'sini alalım
    $id = $_GET['id'];
    $ogrenci_id = $_GET['ogrenci_id'];

    // Güvenli veri türüne dönüştürme
    $id = mysqli_real_escape_string($conn, $id);
    $ogrenci_id = mysqli_real_escape_string($conn, $ogrenci_id);

    // Veritabanından kullanıcıyı silelim
    $sql = "DELETE FROM asama_notlari WHERE not_id = $id";
    $result = $conn->query($sql);

    // Kullanıcı silindikten sonra, kullanıcılar listesine yönlendirelim
    header("Location: ../ogrenci_detay.php?id=$ogrenci_id");
    exit();
?>
