<?php
    // Veritabanı bağlantısı
    include('config/database.php');
    include('inc/header.php');
    include('inc/container.php');

    // Seçilen kullanıcının id'sini alalım
    $id = $_GET['id'];

    // Veritabanından kullanıcının verilerini çekelim
    $sql = "SELECT * FROM ogrenci WHERE ogrenci_id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Form gösterimi
?>
<form action="islemyonetici/ogrenci_guncelle.php" method="post">
  <input type="hidden" name="id" value="<?php echo $row['ogrenci_id']; ?>">
  <div class="mb-3">
    <label for="isim" class="form-label">İsim:</label>
    <input type="text" name="isim" class="form-control" id="isim" value="<?php echo $row['ogrenci_isim']; ?>">
  </div>
  <div class="mb-3">
    <label for="soyisim" class="form-label">Soyisim:</label>
    <input type="text" name="soyisim" class="form-control" id="soyisim" value="<?php echo $row['ogrenci_soyisim']; ?>">
  </div>
  <div class="mb-3">
    <label for="mail" class="form-label">Mail:</label>
    <input type="text" name="mail" class="form-control" id="mail" value="<?php echo $row['ogrenci_mail']; ?>">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Telefon:</label>
    <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $row['ogrenci_mobil']; ?>">
  </div>
  <div class="mb-3">
  <label for="danisman" class="form-label">Danışman:</label>
  <select name="danisman" class="form-control" id="danisman">
    <?php
    $sorgu = "SELECT kullanici_id, kullanici_isim, kullanici_soyisim FROM kullanici WHERE kullanici_rol = 'danisman' || kullanici_rol = 'yonetici'";
    $sonuc = $conn->query($sorgu);
    // Option listesi oluştur
    while ($rowd = $sonuc->fetch_assoc()) {
      echo "<option value='" . $rowd['kullanici_id'] . "'>" . $rowd['kullanici_isim'] ." " .  $rowd['kullanici_soyisim'] . "</option>";
    }
    ?>
  </select>
</div>
<div class="mb-3">
    <label for="kayit" class="form-label">Kayıt Durumu:</label>
    <select name="kayit" id="kayit" class="form-control">
      <option value="yeniledi">yeniledi</option>
      <option value="yenilemedi">yenilemedi</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Kaydet</button>
  <a href="ogrenci_listele.php?danisman_id=" class="btn btn-secondary" type="geri">Geri Dön</a>
</form>


<?php
include('inc/footer.php');
?>