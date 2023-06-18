<?php
    include('../config/database.php'); // veritabanı bağlantısı
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $name = mysqli_real_escape_string($conn, $_POST['isim']);
    $surname = mysqli_real_escape_string($conn, $_POST['soyisim']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $mobil = mysqli_real_escape_string($conn, $_POST['phone']);
    $danisman = mysqli_real_escape_string($conn, $_POST['danisman']);
    $kayit = mysqli_real_escape_string($conn, $_POST['kayit']);

    // UPDATE sorgusu
    $sql = "UPDATE ogrenci SET ogrenci_isim='$name', ogrenci_soyisim='$surname', ogrenci_mail='$mail', ogrenci_mobil='$mobil', danisman_id = '$danisman', kayit_durumu = '$kayit' WHERE ogrenci_id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Kullanıcı başarıyla güncellendi";
        header('Location: ../ogrenci_listele.php?danisman_id=');
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
?>
