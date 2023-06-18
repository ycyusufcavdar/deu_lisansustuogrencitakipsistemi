<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');

$ogrenci_id = $_GET["id"];

$sql_ogrenci = "SELECT * FROM ogrenci WHERE ogrenci_id = $ogrenci_id";
$resultogrenci = $conn->query($sql_ogrenci);
$row_ogrenci = $resultogrenci->fetch_assoc();
$ogrenci_isim = $row_ogrenci["ogrenci_isim"];
$ogrenci_soyisim = $row_ogrenci["ogrenci_soyisim"];

echo "<h2>" . $ogrenci_isim . " " . $ogrenci_soyisim . "</h2><br>";

$sql = "SELECT * FROM asama_notlari WHERE ogrenci_id = $ogrenci_id ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo " <table class='table table-striped'><tr><th>ID</th><th>AŞAMA</th><th>DANIŞMAN NOTU</th><th>AŞAMA TARİHİ</th><th>Düzenle</th><th>Sil</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $asama_id = $row["asama_id"];
        $sql_asama = "SELECT * FROM ogrenci_asama WHERE asama_id = $asama_id";
        $resultasama = $conn->query($sql_asama);
        $row_asama = $resultasama->fetch_assoc();
        echo "<tr><td>" . $row["not_id"] . "</td><td>" . $row_asama["asama_adi"] . "</td><td>" . $row["danisman_notu"] . "</td><td>" . $row["asama_tarih"] . "</td>";
        echo "<td><a class='btn btn-primary btn-sm' href='ogrenci_not.php?id=" . $row["not_id"] . "'>Düzenle</a></td>";
        echo "<td><a class='btn btn-danger btn-sm' href='islemyonetici/ogrenci_asamasil.php?id=" . $row["not_id"] . "&ogrenci_id=" . $row_ogrenci['ogrenci_id'] . "' onclick='return confirm(\"Emin misiniz?\")'>Sil</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<a class='btn btn-info btn-sm' style='max-width:75px;' href='ogrenci_listele.php'> Geri Dön </a>";
} else {
    echo "Sonuç Bulunamadı.";
    echo "<br>";
    echo "<a class='btn btn-info btn-sm' style='max-width:75px;' href='ogrenci_listele.php'>Geri Dön </a>";
}

include('inc/footer.php');
?>
