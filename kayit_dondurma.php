<?php
    // Veritabanı bağlantısı
    include('config/database.php');
    include('inc/header.php');
    include('inc/container.php');

?>
<h2>Kayıt Dondurma </h2>    
<hr>
<form action="islemyonetici/kayit_dondurma.php" method="post">
    <div class="form-group">
        <label for="ogrenci"> Öğrenci</label>
        <select name="ogrenci" id="ogrenci" class="form-control">
            <?php
            if (isset($_SESSION['kullanici_mail']) && isset($_SESSION['kullanici_rol'])) {
                if($_SESSION['kullanici_rol'] == "yonetici") {
                    $sql =" SELECT ogrenci_id, ogrenci_isim, ogrenci_soyisim FROM ogrenci" ;
                    $sonuc = $conn->query($sql);

                    while($row = $sonuc->fetch_assoc()){
                        echo "<option value='" . $row['ogrenci_id'] . "'>" . $row['ogrenci_isim'] ." " .  $row['ogrenci_soyisim'] . "</option>";
                    }
                } else if($_SESSION['kullanici_rol']=="danisman") {
                    $danisman = $_SESSION['kullanici_id'];
                    $sql =" SELECT ogrenci_id, ogrenci_isim, ogrenci_soyisim FROM ogrenci WHERE danisman_id = $danisman " ;
                    $sonuc = $conn->query($sql);

                    while($row = $sonuc->fetch_assoc()){
                        echo "<option value='" . $row['ogrenci_id'] . "'>" . $row['ogrenci_isim'] ." " .  $row['ogrenci_soyisim'] . "</option>";
                    }
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="icerik">İçerik/Sebep:</label>
        <input type="text" class="form-control" id="icerik" name="icerik" required>
    </div>
    <div class="form-group">
        <label for="bitis">Bitiş Tarihi:</label>
        <input type="date" class="form-control" id="bitis" name="bitis" required>
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>

<?php
    include('inc/footer.php');
?>
