<?php
// Veritabanı bağlantısı
include('../config/database.php');

// Formdan verileri al
$id = $_POST['id'];
$sebep = $_POST['sebep'];
$bitis = $_POST['bitis'];

// Güvenli veri türüne dönüştürme
$id = mysqli_real_escape_string($conn, $id);
$sebep = mysqli_real_escape_string($conn, $sebep);
$bitis = mysqli_real_escape_string($conn, $bitis);

// UPDATE sorgusu
$sql = "UPDATE dondurma_talepleri SET dondurma_icerigi='$sebep' , bitis_tarihi='$bitis' WHERE talep_id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Kullanıcı başarıyla güncellendi";
    header('Location: ../kayit_dondurma_listesi.php');
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}
?>
