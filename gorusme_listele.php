<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');

if($_SESSION['kullanici_rol'] == 'yonetici'){

$tez_query = "SELECT m.*, o.ogrenci_isim, o.ogrenci_soyisim FROM tez_gorusme AS m
               INNER JOIN ogrenci AS o ON m.ogrenci_id = o.ogrenci_id";
$tez_result = $conn->query($tez_query);
}else if($_SESSION['kullanici_rol'] == 'danisman'){
    $danisman_id = $_SESSION['kullanici_id'];
    $tez_query = "SELECT m.*, o.ogrenci_isim, o.ogrenci_soyisim FROM tez_gorusme AS m
               INNER JOIN ogrenci AS o ON m.ogrenci_id = o.ogrenci_id WHERE o.danisman_id = $danisman_id ";
$tez_result = $conn->query($tez_query);
}
?>

<h2>Tez Görüşmesi Listesi</h2>
<hr>
<table class="table table-striped">
    <tr>
        <th>Öğrenci Adı</th>
        <th>Öğrenci Soyadı</th>
        <th>Görüşme Notu</th>
        <th>Görüşme Tarihi</th>
    </tr>

    <?php
    if ($tez_result->num_rows > 0) {
        while ($row = $tez_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['ogrenci_isim']."</td>";
            echo "<td>".$row['ogrenci_soyisim']."</td>";
            echo "<td>".$row['gorusme_notu']."</td>";
            echo "<td>".$row['gorusme_tarihi']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='5'>Kayıtlı görüşme bulunamadı.</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
include('inc/footer.php');
?>
