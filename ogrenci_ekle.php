<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');
?>



<h2>Öğrenci Ekle</h2>
<hr>
<form action="islemyonetici/ogrenci_ekle.php" method="post">
<?php if(isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success_message']; ?>
            </div>
        <?php unset($_SESSION['success_message']); endif; ?>

        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error_message']; ?>
            </div>
        <?php unset($_SESSION['error_message']); endif; ?>
  <div class="form-group">
    <label for="ogrenci_isim">İsim:</label>
    <input type="text" class="form-control" id="ogrenci_isim" name="ogrenci_isim" required>
  </div>
  <div class="form-group">
    <label for="ogrenci_soyisim">Soyisim:</label>
    <input type="text" class="form-control" id="ogrenci_soyisim" name="ogrenci_soyisim" required>
  </div>
  <div class="form-group">
    <label for="ogrenci_mail">E-posta:</label>
    <input type="email" class="form-control" id="ogrenci_mail" name="ogrenci_mail" required>
  </div>
  <div class="form-group">
    <label for="ogrenci_mobil">Mobil:</label>
    <div class="input-group">
      <input type="text" class="form-control" id="ogrenci_mobil" name="ogrenci_mobil" placeholder="5555555555" pattern="\[0-9]{10}" required>
    </div>
  </div>
  <div class="form-group">
    <label for="program">Program:</label>
    <select class="form-control" id="program" name="program">
      <option value=""></option>
      <?php
      $sorguprogram = "SELECT * FROM ogrenci_program";
      $sonucprogram = $conn->query($sorguprogram);
      // Option listesi oluştur
      while ($rowprogram = $sonucprogram->fetch_assoc()) {
        echo "<option value='" . $rowprogram['program_id'] . "'>" . $rowprogram['program_isim'] . "</option>";
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="danisman">Danışman:</label>
    <select class="form-control" id="danisman" name="danisman">
      <option></option>
      <?php
      $sorgu = "SELECT kullanici_id, kullanici_isim, kullanici_soyisim FROM kullanici WHERE kullanici_rol = 'danisman' || kullanici_rol = 'yonetici'";
      $sonuc = $conn->query($sorgu);
      // Option listesi oluştur
      while ($row = $sonuc->fetch_assoc()) {
        echo "<option value='" . $row['kullanici_id'] . "'>" . $row['kullanici_isim'] ." " .  $row['kullanici_soyisim'] . "</option>";
      }
      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Kaydet</button>
</form>


    <?php

include('inc/footer.php');
?>