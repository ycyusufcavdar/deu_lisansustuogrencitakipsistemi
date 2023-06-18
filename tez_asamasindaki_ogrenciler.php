<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');
?>

<h2>Tez Aşamasındaki Öğrenciler</h2>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Öğrenci Adı</th>
      <th>Öğrenci Soyadı</th>
      <th>E-Posta</th>
      <th>Tez Tablosu Ekle</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $ogrenci_query = "";
    
    if ($_SESSION['kullanici_rol'] == "yonetici") {
        // Yönetici için tez aşamasındaki öğrencileri çekme
        $ogrenci_query = "SELECT * FROM ogrenci WHERE aktif_asama = (SELECT tez_asamasi FROM ogrenci_program WHERE program_id = ogrenci.program_id) AND ogrenci_id NOT IN (SELECT ogrenci_id FROM tez_tablosu)";
    } elseif ($_SESSION['kullanici_rol'] == "danisman") {
        // Danışman için tez aşamasındaki kendi öğrencilerini çekme
        $danisman_id = $_SESSION['kullanici_id'];
        $ogrenci_query = "SELECT * FROM ogrenci WHERE aktif_asama = (SELECT tez_asamasi FROM ogrenci_program WHERE program_id = ogrenci.program_id) AND danisman_id = $danisman_id AND ogrenci_id NOT IN (SELECT ogrenci_id FROM tez_tablosu)";
    }

    $ogrenci_result = $conn->query($ogrenci_query);

    while ($ogrenci = $ogrenci_result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $ogrenci['ogrenci_isim'] . '</td>';
      echo '<td>' . $ogrenci['ogrenci_soyisim'] . '</td>';
      echo '<td>' . $ogrenci['ogrenci_mail'] . '</td>';
      echo '<td><a class="btn btn-primary" href="tez_ekle.php?ogrenci_id=' . $ogrenci['ogrenci_id'] . '">Tez Ekle</a></td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>

<?php
include('inc/footer.php');
?>
