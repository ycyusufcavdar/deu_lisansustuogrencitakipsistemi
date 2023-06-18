<?php
include 'config/database.php';
include 'inc/header.php';
include 'inc/container.php';

$sql = "SELECT * FROM ogrenci_asama";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo"<h2>Aşama Listesi </h2> <hr>";
    echo ' <table class="table table-striped"><tr><th>Aşama</th><th>Program</th><th>Düzenle</th><th>Sil</th></tr>';
    while ($row = $result->fetch_assoc()) {
        $program = $row["program_id"];
        $programsql = "SELECT * FROM ogrenci_program WHERE program_id = ?";
        $stmt = $conn->prepare($programsql);
        $stmt->bind_param("i", $program);
        $stmt->execute();
        $resultprogram = $stmt->get_result();
        $rowprogram = $resultprogram->fetch_assoc();
        echo "<tr><td>" . htmlspecialchars($row["asama_adi"]) . "</td><td>" . htmlspecialchars($rowprogram["program_isim"]) . "</td>";
        echo "<td><a class='btn btn-primary btn-sm' href='asama_duzenle.php?id=" . htmlspecialchars($row["asama_id"]) . "'>Düzenle</a></td>";
        echo "<td><a class='btn btn-danger btn-sm' href='islemyonetici/asama_sil.php?id=" . htmlspecialchars($row["asama_id"]) . "' onclick='return confirm(\"Emin misiniz?\")'>Sil</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

include 'inc/footer.php';
?>
