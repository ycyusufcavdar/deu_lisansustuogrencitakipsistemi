<?php
// Veritabanı bağlantısı
include('config/database.php');
include('inc/header.php');
include('inc/container.php');

// Seçilen kullanıcının id'sini alalım
$id = $_GET['id'];

// Veritabanından kullanıcının verilerini çekelim
$sql = "SELECT * FROM dondurma_talepleri WHERE talep_id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Form gösterimi
?>
<h2>Aşama Düzenle</h2>
<form action="islemyonetici/kayit_dondurma_guncelle.php" method="post">
    <div class="mb-3">
        <input type="hidden" class="form-control" name="id" value="<?php echo $row['talep_id']; ?>">
    </div>
    <div class="mb-3">
        <label for="sebep" class="form-label">Kayıt Dondurma Sebebi:</label>
        <input type="text" class="form-control" id="sebep" name="sebep" value="<?php echo $row['dondurma_icerigi']; ?>">
    </div>
    <div class="mb-3">
        <label for="bitis" class="form-label">Bitiş Tarihi:</label>
        <input type="date" class="form-control" id="bitis" name="bitis" value="<?php echo $row['bitis_tarihi']; ?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Kaydet</button>
        <a href="kayit_dondurma_listesi.php" class="btn btn-secondary" type="geri">Geri Dön</a>
    </div>
</form>

<?php
include('inc/footer.php');
?>
