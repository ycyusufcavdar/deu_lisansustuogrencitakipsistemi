<?php
    // Veritabanı bağlantısı
    include('config/database.php');
    include('inc/header.php');
    include('inc/container.php');

    // Seçilen kullanıcının id'sini alalım
    $id = $_GET['id'];

    // Veritabanından kullanıcının verilerini çekelim
    $sql = "SELECT * FROM asama_notlari WHERE not_id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $ogrenci_id = $row["ogrenci_id"];

    // Form gösterimi
?>
<form action="islemyonetici/not_guncelle.php" method="post">
  <input type="hidden" name="id" value="<?php echo $row['not_id']; ?>">
  <input type="hidden" name="ogrenci_id" value="<?php echo $row['ogrenci_id']; ?>">
  <div class="mb-3">
    <label for="isim" class="form-label">Danışman Notu:</label>
    <input type="text" name="isim" class="form-control" id="isim" value="<?php echo $row['danisman_notu']; ?>">
  </div>
  

  <button type="submit" class="btn btn-primary">Kaydet</button>
  <a href="ogrenci_detay.php?id=<?=$ogrenci_id?>" class="btn btn-secondary" type="geri">Geri Dön</a>
</form>


<?php
include('inc/footer.php');
?>