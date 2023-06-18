<?php
include 'config/database.php';
include 'inc/header.php';
include 'inc/container.php';

$sql = "SELECT * FROM ogrenci_program";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo"<h2> Program Listesi </h2> <hr>";
    echo "<table class='table table-striped'><tr><th>Program ID</th> <th>Program Adı</th><th>Tez Aşaması</th><th>Düzenle</th><th>Sil</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $program = $row["program_isim"];
        $tez_asama = $row["tez_asamasi"];
        $program_id = $row["program_id"];
        echo "<tr><td>" . $program_id . "</td><td>" . $program . "</td><td>" . $tez_asama . "</td>";
        echo "<td><a class='btn btn-primary btn-sm' href='program_duzenle.php?id=" . $row["program_id"] . "'>Düzenle</a></td>";
        echo "<td><a class='btn btn-danger btn-sm' href='islemyonetici/program_sil.php?id=" . $row["program_id"] . "' onclick='return confirm(\"Emin misiniz?\")'>Sil</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

include 'inc/footer.php';
?>