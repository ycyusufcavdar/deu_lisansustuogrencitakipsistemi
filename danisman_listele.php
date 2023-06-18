<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');

$sql = "SELECT kullanici_id, kullanici_isim, kullanici_soyisim, kullanici_rol FROM kullanici WHERE kullanici_rol = 'danisman' OR kullanici_rol = 'yonetici'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo"<h2> Danışman Listesi </h2> <hr>";
    echo ' <table class="table table-striped"><tr><th>ID</th><th>İsim</th><th>Soyisim</th><th>Rol</th><th>Düzenle</th><th>Sil</th></tr>';

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["kullanici_id"]."</td>";
        echo "<td>".$row["kullanici_isim"]."</td>";
        echo "<td>".$row["kullanici_soyisim"]."</td>";
        echo "<td>".$row["kullanici_rol"]."</td>";
        echo "<td><a class='btn btn-primary btn-sm' href='danisman_duzenle.php?id=".$row["kullanici_id"]."'>Düzenle</a></td>";
        echo "<td><a class='btn btn-danger btn-sm' href='islemyonetici/danisman_sil.php?id=".$row["kullanici_id"]."' onclick='return confirm(\"Emin misiniz?\")'>Sil</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Sonuç bulunamadı";
}

include('inc/footer.php');
?>
