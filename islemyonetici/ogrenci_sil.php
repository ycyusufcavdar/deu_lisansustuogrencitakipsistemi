<?php
    // Veritabanı bağlantısı
    include('../config/database.php');

    // Seçilen kullanıcının id'sini alalım ve güvenli hale getirelim
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Veritabanından kullanıcıyı silelim
    $sql = "DELETE FROM ogrenci WHERE ogrenci_id = '$id'";
    $result = $conn->query($sql);

    // Kullanıcı silindikten sonra, kullanıcılar listesine yönlendirelim
    header('Location: ../ogrenci_listele.php');
    exit();
?>
