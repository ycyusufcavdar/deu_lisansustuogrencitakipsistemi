<?php
include('../config/database.php'); // veritabanı bağlantısı
$id = $_POST['id'];
$name = $_POST['isim'];

// Güvenli veri türüne dönüştürme
$id = mysqli_real_escape_string($conn, $id);
$name = mysqli_real_escape_string($conn, $name);

// UPDATE sorgusu
$sql = "UPDATE ogrenci_asama SET asama_adi='$name' WHERE asama_id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Kullanıcı başarıyla güncellendi";
    header('Location: ../asama_listele.php');
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}
?>
