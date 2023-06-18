<?php
    include('../config/database.php'); // veritabanı bağlantısı
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['isim']);
    $tez = mysqli_real_escape_string($conn, $_POST['tez_asamasi']);

    // UPDATE sorgusu
    $sql = "UPDATE ogrenci_program SET program_isim='$name', tez_asamasi='$tez' WHERE program_id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Kullanıcı başarıyla güncellendi";
        header('Location: ../program_listele.php');
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
?>
