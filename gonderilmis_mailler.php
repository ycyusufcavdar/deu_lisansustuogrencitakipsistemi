<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');


if($_SESSION['kullanici_rol'] == 'yonetici'){

$mail_query = "SELECT m.*, o.ogrenci_isim, o.ogrenci_soyisim FROM gonderilen_mailler AS m
               INNER JOIN ogrenci AS o ON m.ogrenci_id = o.ogrenci_id";
$mail_result = $conn->query($mail_query);
} else if($_SESSION['kullanici_rol'] == 'danisman'){
    $danisman_id = $_SESSION['kullanici_id'];
    $mail_query = "SELECT m.*, o.ogrenci_isim, o.ogrenci_soyisim FROM gonderilen_mailler AS m
    INNER JOIN ogrenci AS o ON m.ogrenci_id = o.ogrenci_id WHERE o.danisman_id = $danisman_id";
$mail_result = $conn->query($mail_query);
}
?>

<h2>Gönderilen Mailler Listesi</h2>
<hr>
<table class="table table-striped">
    <tr>
        <th>Öğrenci Adı</th>
        <th>Öğrenci Soyadı</th>
        <th>Konu</th>
        <th>Mesaj</th>
        <th>Gönderme Tarihi</th>
    </tr>

    <?php
    if ($mail_result->num_rows > 0) {
        while ($row = $mail_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['ogrenci_isim']."</td>";
            echo "<td>".$row['ogrenci_soyisim']."</td>";
            echo "<td>".$row['konu']."</td>";
            echo "<td>".$row['mesaj']."</td>";
            echo "<td>".$row['gonderme_tarihi']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='5'>Gönderilen mail bulunamadı.</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
include('inc/footer.php');
?>
