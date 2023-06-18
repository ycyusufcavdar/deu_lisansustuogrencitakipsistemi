<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');



if (!isset($_SESSION['kullanici_id'])) {
  header('Location: giris.php');
  exit;
}

$kullanici_id = $_SESSION['kullanici_id'];

// Kullanıcı bilgilerini getir
$sql = "SELECT * FROM kullanici WHERE kullanici_id = '$kullanici_id'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
} else {
  // Kullanıcı bulunamadı
  header('Location: hata.php');
  exit;
}

// Kullanıcı bilgileri düzenlendi mi?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Form verilerini al
  $isim = $_POST['isim'];
  $soyisim = $_POST['soyisim'];
  $email = $_POST['email'];
  $sifre = $_POST['pass'];
  $mobil = $_POST['mobil'];

  // Veritabanında kullanıcı bilgilerini güncelle
  $sql_update = "UPDATE kullanici SET kullanici_isim = '$isim', kullanici_soyisim = '$soyisim', kullanici_mail = '$email' , kullanici_pass = '$sifre', kullanici_mobil = '$mobil' WHERE kullanici_id = '$kullanici_id'";

  if ($conn->query($sql_update) === TRUE) {
    // Kullanıcı bilgileri başarıyla güncellendi, tekrar yükle
    header('Location: profil.php');
    exit;
  } else {
    // Hata oluştu, hatayı göster
    echo "Hata: " . $conn->error;
  }
}

?>

<h2>Kullanıcı Bilgileri Düzenle</h2>
<hr>
<form method="POST">
  <div class="form-group mb-3">
    <label for="isim" class="form-label">İsim</label>
    <input type="text" class="form-control" id="isim" name="isim" value="<?php echo $row['kullanici_isim']; ?>" required>
  </div>
  <div class="form-group mb-3">
    <label for="soyisim" class="form-label">Soyisim</label>
    <input type="text" class="form-control" id="soyisim" name="soyisim" value="<?php echo $row['kullanici_soyisim']; ?>" required>
  </div>
  <div class="form-group mb-3">
    <label for="email" class="form-label">E-posta Adresi</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['kullanici_mail']; ?>" required>
  </div>
  <div class="form-group mb-3">
    <label for="pass" class="form-label">Şifre</label>
    <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $row['kullanici_pass']; ?>">
  </div>
  <div class="form-group mb-3">
    <label for="mobil" class="form-label">Mobil</label>
    <input type="text" class="form-control" id="mobil" name="mobil" value="<?php echo $row['kullanici_mobil']; ?>" required>
  </div>
  <button type="submit" class="btn btn-primary">Kaydet</button>
</form>

    <?php
include('inc/footer.php');
?>