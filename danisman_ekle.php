<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');
?>
    </form>

<h2>Danışman Ekle</h2>
<hr>
<form action="islemyonetici/danisman_ekle.php" method="post">
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

  <div class="mb-3">
    <label for="kullanici_isim" class="form-label">İsim:</label>
    <input type="text" class="form-control" id="kullanici_isim" name="kullanici_isim" required>
  </div>
  <div class="mb-3">
    <label for="kullanici_soyisim" class="form-label">Soyisim:</label>
    <input type="text" class="form-control" id="kullanici_soyisim" name="kullanici_soyisim" required>
  </div>
  <div class="mb-3">
    <label for="kullanici_mail" class="form-label">E-posta:</label>
    <input type="email" class="form-control" id="kullanici_mail" name="kullanici_mail" required>
  </div>
  <div class="mb-3">
    <label for="kullanici_pass" class="form-label">Parola:</label>
    <input type="password" class="form-control" id="kullanici_pass" name="kullanici_pass" placeholder="Danışman Şifresi Doldurulmak Zorundadır!" required>
  </div>
  <div class="form-group">
    <label for="kullanici_mobil">Mobil:</label>
    <div class="input-group">
      <input type="text" class="form-control" id="kullanici_mobil" name="kullanici_mobil" placeholder="5555555555" pattern="\[0-9]{10}" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Kaydet</button>
</form>

<?php

include('inc/footer.php');
?>