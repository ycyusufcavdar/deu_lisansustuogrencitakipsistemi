<?php
include('config/database.php');
//Grafik 1 
$danisman_id = $_SESSION['kullanici_id']; 
if($_SESSION['kullanici_rol'] == "yonetici"){
$grafiksql = "SELECT p.program_isim, COUNT(o.ogrenci_id) AS ogrenci_sayisi
        FROM ogrenci_program AS p
        LEFT JOIN ogrenci AS o ON p.program_id = o.program_id
        GROUP BY p.program_isim";
        }else if($_SESSION['kullanici_rol'] =="danisman"){
            $grafiksql = "SELECT p.program_isim, COUNT(o.ogrenci_id) AS ogrenci_sayisi
            FROM ogrenci_program AS p
            LEFT JOIN ogrenci AS o ON p.program_id = o.program_id
            WHERE o.danisman_id = $danisman_id
            GROUP BY p.program_isim";
        }

// Sorguyu çalıştırın ve sonuçları alın
$grafikresult = $conn->query($grafiksql);

// Program ve öğrenci sayılarını saklamak için boş diziler oluşturun
$programlar = array();
$ogrenciSayilari = array();

// Sonuçları döngü ile alın ve diziye ekle
while ($grafikrow = $grafikresult->fetch_assoc()) {
    $programAdi = "";
    $kelimeler = explode(" ", $grafikrow['program_isim']);
    foreach ($kelimeler as $kelime) {
        $programAdi .= substr($kelime, 0, 1);
    }
    $programlar[] = $programAdi;
    $ogrenciSayilari[] = $grafikrow['ogrenci_sayisi'];
}

// PHP tarafında JavaScript kodunu oluşturun ve program ve öğrenci sayılarını aktarın
echo "<script>
    var programlar = " . json_encode($programlar) . ";
    var ogrenciSayilari = " . json_encode($ogrenciSayilari) . ";
</script>";

// HTML ve JavaScript kodunu yazın
echo '
<div class="col-sm-0 col-md-12 col-lg-12 col-xl-6 text-center">
    <h5 > Bölümlerdeki Öğrenci Sayıları Grafiği </h5>
    <canvas id="grafik"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById("grafik").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: programlar,
            datasets: [{
                label: "Öğrenci Sayısı",
                data: ogrenciSayilari,
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>
';



//Grafik 2

// Veritabanı sorgusu
if($_SESSION['kullanici_rol'] == 'yonetici'){
$sqlgrafik2 = "SELECT CONCAT(k.kullanici_isim, ' ', k.kullanici_soyisim) AS danisman, COUNT(o.ogrenci_id) AS ogrenci_sayisi
        FROM kullanici AS k
        LEFT JOIN ogrenci AS o ON k.kullanici_id = o.danisman_id
        WHERE k.kullanici_rol = 'danisman' OR k.kullanici_rol ='yonetici'
        GROUP BY danisman";

// Sorguyu çalıştırın ve sonuçları alın
$resultgrafik2 = $conn->query($sqlgrafik2);

// Danışman ve öğrenci sayılarını saklamak için boş diziler oluşturun
$danismanlar = array();
$ogrenciSayilari = array();

// Sonuçları döngü ile alın ve diziye ekle
while ($rowgrafik2 = $resultgrafik2->fetch_assoc()) {
    $danismanlar[] = $rowgrafik2['danisman'];
    $ogrenciSayilari[] = $rowgrafik2['ogrenci_sayisi'];
}

// PHP tarafında JavaScript kodunu oluşturun ve danışmanlar ve öğrenci sayılarını aktarın
echo "<script>
    var danismanlar = " . json_encode($danismanlar) . ";
    var ogrenciSayilari = " . json_encode($ogrenciSayilari) . ";
</script>";

// HTML ve JavaScript kodunu yazın
echo '
<div class="col-sm-0 col-md-12 col-lg-12 col-xl-6 text-center">
    <h5 > Danışmanların Öğrenci Sayıları Grafiği </h5>
    <canvas id="grafik2"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById("grafik2").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: danismanlar,
            datasets: [{
                label: "Öğrenci Sayısı",
                data: ogrenciSayilari,
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>
';
}else{
    
}

?>
