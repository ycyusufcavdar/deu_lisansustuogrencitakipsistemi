<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');
?>

<h2>Tez Listesi</h2>

<table class='table table-striped'>
  <thead>
    <tr>
      <th>Öğrenci Adı</th>
      <th>Öğrenci Soyadı</th>
      <th>Tez Başlığı</th>
      <th>Başlangıç Tarihi</th>
      <th>Mail Gönder</th>
      <th>Görüşme Oluştur</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $tez_query = "";

    if ($_SESSION['kullanici_rol'] == "yonetici") {
        // Yönetici için tez tablosunu çekme
        $tez_query = "SELECT * FROM tez_tablosu";
    } elseif ($_SESSION['kullanici_rol'] == "danisman") {
        // Danışman için tez tablosunu çekme
        $danisman_id = $_SESSION['kullanici_id'];
        $tez_query = "SELECT * FROM tez_tablosu WHERE ogrenci_id IN (SELECT ogrenci_id FROM ogrenci WHERE danisman_id = $danisman_id)";
    }

    $tez_result = $conn->query($tez_query);

    while ($tez = $tez_result->fetch_assoc()) {
        // Öğrenci bilgilerini tez_tablosu'ndan çek
        $ogrenci_id = $tez['ogrenci_id'];
        $ogrenci_query = "SELECT * FROM ogrenci WHERE ogrenci_id = $ogrenci_id";
        $ogrenci_result = $conn->query($ogrenci_query);
        $ogrenci = $ogrenci_result->fetch_assoc();

        echo '<tr>';
        echo '<td>' . $ogrenci['ogrenci_isim'] . '</td>';
        echo '<td>' . $ogrenci['ogrenci_soyisim'] . '</td>';
        echo '<td>' . $tez['tez_basligi'] . '</td>';
        echo '<td>' . $tez['baslangic_tarihi'] . '</td>';
        echo '<td><a class="btn btn-primary" href="mail_gonder.php?ogrenci_id=' . $ogrenci['ogrenci_id'] . '">Mail Gönder</a></td>';
        echo '<td><a class="btn btn-primary" href="gorusme_olustur.php?ogrenci_id=' . $ogrenci['ogrenci_id'] .'&tez_id='.$tez['tez_id'].'">Görüşme Oluştur</a></td>';
        echo '</tr>';
    }
    ?>
  </tbody>
</table>

<?php
include('inc/footer.php');
?>
