<?php
// Veritabanı bağlantısı
include('config/database.php');
include('inc/header.php');
include('inc/container.php');

// Seçilen kullanıcının id'sini alalım
$id = $_GET['id'];

// Veritabanından kullanıcının verilerini çekelim
$sql = "SELECT * FROM kullanici WHERE kullanici_id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Form gösterimi
?>
<h2>Danışman Düzenle</h2>
<form action="islemyonetici/danisman_guncelle.php" method="post">
    <div class="mb-3">
        <input type="hidden" class="form-control" name="id" value="<?php echo htmlspecialchars($row['kullanici_id']); ?>">
    </div>
    <div class="mb-3">
        <label for="kullanici_isim" class="form-label">İsim:</label>
        <input type="text" class="form-control" name="isim" value="<?php echo htmlspecialchars($row['kullanici_isim']); ?>">
    </div>
    <div class="mb-3">
        <label for="kullanici_soyisim" class="form-label">Soyisim:</label>
        <input type="text" class="form-control" name="soyisim" value="<?php echo htmlspecialchars($row['kullanici_soyisim']); ?>">
    </div>
    <div class="mb-3">
        <label for="kullanici_mail" class="form-label">E-posta:</label>
        <input type="text" class="form-control" name="mail" value="<?php echo htmlspecialchars($row['kullanici_mail']); ?>">
    </div>
    <div class="mb-3">
        <label for="kullanici_pass" class="form-label">Parola:</label>
        <input type="password" class="form-control" name="pass" value="<?php echo htmlspecialchars($row['kullanici_pass']); ?>">
    </div>     
    <div class="mb-3">
        <label for="kullanici_mobil">Mobil:</label>
        <input type="text" class="form-control" pattern="[0-9]{10}" name="phone" value="<?php echo htmlspecialchars($row['kullanici_mobil']); ?>">
    </div></br>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Kaydet</button>
    
        <a href="danisman_listele.php" class="btn btn-secondary" type="geri">Geri Dön</a>

    </div>
</form>

<?php
include('inc/footer.php');
?>
