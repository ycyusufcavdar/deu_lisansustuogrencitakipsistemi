<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');

// Öğrenci kimliğini al
if (isset($_GET['ogrenci_id'])) {
  $ogrenci_id = $_GET['ogrenci_id'];

  // Öğrenci bilgilerini veritabanından al
  $ogrenci_query = "SELECT * FROM ogrenci WHERE ogrenci_id = $ogrenci_id";
  $ogrenci_result = $conn->query($ogrenci_query);
  $ogrenci = $ogrenci_result->fetch_assoc();

  echo '<h2>Tez Ekle - ' . $ogrenci['ogrenci_isim'] . ' ' . $ogrenci['ogrenci_soyisim'] . '</h2>';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tez bilgilerini al
    $tez_basligi = $_POST['tez_basligi'];

    // Tez tablosuna ekle
    $tez_ekle_query = "INSERT INTO tez_tablosu (tez_id, ogrenci_id, tez_basligi) VALUES (NULL, $ogrenci_id, '$tez_basligi')";
    $tez_ekle_result = $conn->query($tez_ekle_query);

    if ($tez_ekle_result) {
      echo '<div class="alert alert-success" role="alert">Tez başarıyla eklendi.</div>';
    } else {
      echo '<div class="alert alert-danger" role="alert">Tez eklenirken bir hata oluştu.</div>';
    }
  }

  echo '
    <form method="POST" action="' . $_SERVER['PHP_SELF'] . '?ogrenci_id=' . $ogrenci_id . '">
      <div class="form-group">
        <label for="tez_basligi">Tez Başlığı:</label>
        <input type="text" class="form-control" name="tez_basligi" id="tez_basligi" required>
      </div>
      <button type="submit" class="btn btn-primary">Tez Ekle</button>
    </form>
  ';
} else {
  echo '<div class="alert alert-danger" role="alert">Öğrenci kimliği belirtilmedi.</div>';
}

include('inc/footer.php');
?>
