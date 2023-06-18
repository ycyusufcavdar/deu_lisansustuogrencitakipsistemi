<?php
    // Veritabanı bağlantısı
    include('../config/database.php');

    // Seçilen kullanıcının id'sini alalım
    $id = $_GET['id'];

    // Veritabanından kullanıcıyı silelim
    $sql = "DELETE FROM ogrenci_program WHERE program_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Kullanıcı silindikten sonra, kullanıcılar listesine yönlendirelim
    header('Location: ../program_listele.php');
    exit();
?>
