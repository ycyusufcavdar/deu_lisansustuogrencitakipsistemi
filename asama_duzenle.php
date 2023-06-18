<?php
    // Veritabanı bağlantısı
    include('config/database.php');
    include('inc/header.php');
    include('inc/container.php');

    // Seçilen kullanıcının id'sini alalım
    $id = $_GET['id'];

    // Veritabanından kullanıcının verilerini çekelim
    $sql = "SELECT * FROM ogrenci_asama WHERE asama_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    // Form gösterimi
?>
<h2>Aşama Düzenle</h2>
<form action="islemyonetici/asama_guncelle.php" method="post">
    <div class="mb-3">
        <input type="hidden" class="form-control" name="id" value="<?php echo htmlspecialchars($row['asama_id']); ?>">
    </div>
    <div class="mb-3">
        <label for="kullanici_isim" class="form-label">İsim:</label>
        <input type="text" class="form-control" name="isim" value="<?php echo htmlspecialchars($row['asama_adi']); ?>">
    </div>
   
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Kaydet</button>
    
        <a href="asama_listele.php" class="btn btn-secondary" type="geri">Geri Dön</a>
    </div>
</form>

<?php
include('inc/footer.php');
?>
