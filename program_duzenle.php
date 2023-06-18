<?php
    // Veritabanı bağlantısı
    include('config/database.php');
    include('inc/header.php');
    include('inc/container.php');

    // Seçilen kullanıcının id'sini alalım
    $id = $_GET['id'];

    // Veritabanından kullanıcının verilerini çekelim
    $sql = "SELECT * FROM ogrenci_program WHERE program_id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Form gösterimi
?>
<h2>Aşama Düzenle</h2>
<form action="islemyonetici/program_guncelle.php" method="post">
    <div class="mb-3">
        <input type="hidden" class="form-control" name="id" value="<?php echo $row['program_id']; ?>">
    </div>
    <div class="mb-3">
        <label for="kullanici_isim" class="form-label">İsim:</label>
        <input type="text" class="form-control" name="isim" value="<?php echo $row['program_isim']; ?>">
    </div>
    <div class="form-group">
    <label for="tez_asamasi">Tez Aşaması:</label>
    <select class="form-control" id="tez_asamasi" name="tez_asamasi">
      <option value="1">Tez Aşaması Bulunmamakta</option>
      <option value="2">1</option>
      <option value="3">2</option>
      <option value="4">3</option>
      <option value="5">4</option>
      <option value="6">5</option>
      <option value="7">6</option>
      <option value="8">7</option>
      <option value="9">8</option>
      <option value="10">9</option>
    </select>
  </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Kaydet</button>
    
        <a href="program_listele.php" class="btn btn-secondary" type="geri">Geri Dön</a>

    </div>
</form>

<?php
include('inc/footer.php');
?>