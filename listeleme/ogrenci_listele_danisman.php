<?php

if ($result_dogrenci->num_rows > 0) {
    ?>
    <h2>Öğrenci Listesi</h2>
    <form class="form-inline mb-3  col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
  <div class="form-group mr-2">
    <label for="arama_input">Öğrenci Ara:</label>
    <input type="text" class="form-control" id="arama_input" placeholder="Öğrenci adı veya soyadı">
  </div>
  <button type="button" class="btn  btn-primary mr-1" id="arama_buton">Ara</button>
  <button type="button" class="btn   btn-secondary mr-1" id="temizle_buton">Temizle</button>
</form>
    <table class="table table-striped" id="ogrenci_tablosu">
        <thead>
            <tr>
                <th>İsim</th>
                <th>Soyisim</th>
                <th>Program</th>
                <th>Sisteme Kayıt Tarihi</th>
                <th>Danışman Atama Tarihi</th>
                <th>Tamamlanan Aşama</th>
                <th>Kayıt Durumu</th>
                <th>Detay Görüntüle</th>
                <th>Düzenle</th>
                <th>Sil</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row_ogrenci = $result_dogrenci->fetch_assoc()) {
                // Öğrenci bilgilerini alın
                $ogrenci_id = $row_ogrenci['ogrenci_id'];
                $bulunan_asama = $row_ogrenci['aktif_asama'];
                $program = $row_ogrenci['program_id'];

                // Bulunduğu aşamayı seçin ve ismini görüntüleyin
                if ($bulunan_asama > 0) {
                    $sql_asama_isim = "SELECT * FROM ogrenci_asama WHERE asama_seviyesi = ? AND program_id = ?";
                    $stmt_asama_isim = $conn->prepare($sql_asama_isim);
                    $stmt_asama_isim->bind_param("ii", $bulunan_asama, $program);
                    $stmt_asama_isim->execute();
                    $result_ai = $stmt_asama_isim->get_result();
                    $row_ai = $result_ai->fetch_assoc();
                    $asama_ismi = $row_ai["asama_adi"];
                    $stmt_asama_isim->close();
                } else {
                    $asama_ismi = "Aşama Belirlenemedi";
                }

                // Bulunduğu programı alın
                $sql_prog = "SELECT * FROM ogrenci_program WHERE program_id = ?";
                $stmt_prog = $conn->prepare($sql_prog);
                $stmt_prog->bind_param("i", $program);
                $stmt_prog->execute();
                $result_prog = $stmt_prog->get_result();
                $row_prog = $result_prog->fetch_assoc();
                $program_ismi = $row_prog['program_isim'];
                $stmt_prog->close();

                // Öğrenci satırını oluşturun ve detayları görüntüleyin
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row_ogrenci["ogrenci_isim"]) . "</td>";
                echo "<td>" . htmlspecialchars($row_ogrenci["ogrenci_soyisim"]) . "</td>";
                echo "<td>" . htmlspecialchars($program_ismi) . "</td>";
                echo "<td>" . htmlspecialchars($row_ogrenci["ogrenci_olusturmatarihi"]) . "</td>";
                echo "<td>" . htmlspecialchars($row_ogrenci["danisman_atamatarihi"]) . "</td>";
                echo "<td>" . htmlspecialchars($asama_ismi) . "</td>";
                echo "<td>" . htmlspecialchars($row_ogrenci["kayit_durumu"]) . "</td>";
                echo "<td><a class='btn btn-success btn-sm' href='ogrenci_detay.php?ogrenci_id=" . $ogrenci_id . "'>Detay Görüntüle</a></td>";
                echo "<td><a class='btn btn-primary btn-sm' href='ogrenci_duzenle.php?ogrenci_id=" . $ogrenci_id . "'>Düzenle</a></td>";
                echo "<td><a class='btn btn-danger btn-sm' href='islemyonetici/ogrenci_sil.php?ogrenci_id=" . $ogrenci_id . "' onclick='return confirm(\"Emin misiniz?\")'>Sil</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
<?php
} else {
    echo "Danışmanın yönettiği öğrenci bulunmamaktadır.";
}
?>
<script>
  document.getElementById("arama_buton").addEventListener("click", function() {
    var input = document.getElementById("arama_input").value.toLowerCase();
    var table = document.getElementById("ogrenci_tablosu");
    var rows = table.getElementsByTagName("tr");
    for (var i = 1; i < rows.length; i++) {
      var cells = rows[i].getElementsByTagName("td");
      var match = false;
      for (var j = 0; j < cells.length; j++) {
        var cellValue = cells[j].innerText.toLowerCase();
        if (cellValue.indexOf(input) > -1) {
          match = true;
          break;
        }
      }
      rows[i].style.display = match ? "" : "none";
    }
  });

  document.getElementById("temizle_buton").addEventListener("click", function() {
    document.getElementById("arama_input").value = "";
    var table = document.getElementById("ogrenci_tablosu");
    var rows = table.getElementsByTagName("tr");
    for (var i = 1; i < rows.length; i++) {
      rows[i].style.display = "";
    }
  });
</script>