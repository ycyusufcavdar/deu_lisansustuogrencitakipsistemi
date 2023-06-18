<?php
    include('../config/database.php'); // veritabanı bağlantısı
    $id = $_POST['id'];
    $name = $_POST['isim'];
    $ogrenci_id = $_POST['ogrenci_id'];

    // Güvenli veri türüne dönüştürme
    $id = mysqli_real_escape_string($conn, $id);
    $name = mysqli_real_escape_string($conn, $name);
    $ogrenci_id = mysqli_real_escape_string($conn, $ogrenci_id);

    // UPDATE sorgusu
    $sql = "UPDATE asama_notlari SET danisman_notu='$name' WHERE not_id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Kullanıcı başarıyla güncellendi";
        header('Location: ../ogrenci_detay.php?id='.$ogrenci_id.'');
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
?>
