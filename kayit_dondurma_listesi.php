<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');

if ($_SESSION['kullanici_rol'] == "yonetici") {
    // Yönetici için dondurma taleplerini çekme
    $sql = "SELECT dondurma_talepleri.talep_id, ogrenci.ogrenci_isim, ogrenci.ogrenci_soyisim, dondurma_talepleri.dondurma_icerigi, dondurma_talepleri.dondurma_tarihi, dondurma_talepleri.bitis_tarihi 
    FROM dondurma_talepleri 
    INNER JOIN ogrenci ON dondurma_talepleri.ogrenci_id = ogrenci.ogrenci_id";
} elseif ($_SESSION['kullanici_rol'] == "danisman") {
    // Danışman için dondurma taleplerini çekme
    $danisman_id = $_SESSION['kullanici_id'];
    $sql = "SELECT dondurma_talepleri.talep_id, ogrenci.ogrenci_isim, ogrenci.ogrenci_soyisim, dondurma_talepleri.dondurma_icerigi, dondurma_talepleri.dondurma_tarihi, dondurma_talepleri.bitis_tarihi 
    FROM dondurma_talepleri 
    INNER JOIN ogrenci ON dondurma_talepleri.ogrenci_id = ogrenci.ogrenci_id 
    WHERE ogrenci.danisman_id = $danisman_id";
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo" <h2>Kayıt Dondurma Listesi </h2> <hr>";
    echo " <table class='table table-striped'><tr><th>İsim</th><th>Soyisim</th><th>Dondurma İçeriği</th><th>Dondurma Tarihi</th><th>Bitiş Tarihi</th><th>Düzenle</th><th>Sil</th></tr>";
    while($row = $result->fetch_assoc()) {
        // Tablodaki verileri yazdırma
        echo "<tr><td>" . $row["ogrenci_isim"]. "</td><td>" . $row["ogrenci_soyisim"]. "</td><td>" . $row["dondurma_icerigi"]. "</td><td>" . $row["dondurma_tarihi"]. "</td><td>" . $row["bitis_tarihi"];
        echo "<td><a class='btn btn-primary btn-sm' href='kayit_dondurma_duzenle.php?id=" . $row["talep_id"] . "'>Düzenle</a></td>";
        echo "<td><a class='btn btn-danger btn-sm' href='islemyonetici/kayit_dondurma_sil.php?id=" . $row["talep_id"] . "'>Sil</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Sonuç Bulunamadı";
}

include('inc/footer.php');
?>
