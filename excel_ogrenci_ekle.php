<?php
use PhpOffice\PhpSpreadsheet\IOFactory;

include('config/database.php');
include('inc/header.php');
include('inc/container.php');

if (isset($_POST["submit"])) {
    // Yüklenen dosyayı geçici bir konumdan alalım
    $file = $_FILES["file"]["tmp_name"];

    // Dosyayı güvenli bir şekilde işlemek için IOFactory'den yararlanalım
    require_once 'vendor/autoload.php';

    // Dosyayı yükle ve oku
    $spreadsheet = IOFactory::load($file);

    // İlk çalışma sayfasını seç
    $sheet = $spreadsheet->getActiveSheet();

    // Satırları döngüye al ve verileri veritabanına ekle
    foreach ($sheet->getRowIterator() as $row) {
        // İlk satırı (başlıkları) atla
        if ($row->getRowIndex() == 1) {
            continue;
        }

        // Hücreleri döngüye al ve verileri değişkenlere kaydet
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);

        $data = array();
        foreach ($cellIterator as $cell) {
            $data[] = $cell->getValue();
        }

        // Unix zaman damgasını datetime biçimine dönüştür
        $danisman_atamatarihi = gmdate("Y-m-d H:i:s", ($data[9] - 25569) * 86400);
        $ogrenci_olusturmatarihi = ($data[10] != null) ? gmdate("Y-m-d H:i:s", ($data[10] - 25569) * 86400) : date("Y-m-d H:i:s");

        // Verileri veritabanına eklemeden önce güvenlik kontrolleri yap
        $ogrenci_id = mysqli_real_escape_string($conn, $data[0]);
        $ogrenci_isim = mysqli_real_escape_string($conn, $data[1]);
        $ogrenci_soyisim = mysqli_real_escape_string($conn, $data[2]);
        $ogrenci_mail = mysqli_real_escape_string($conn, $data[3]);
        $ogrenci_mobil = mysqli_real_escape_string($conn, $data[4]);
        $program_id = mysqli_real_escape_string($conn, $data[5]);
        $danisman_id = mysqli_real_escape_string($conn, $data[6]);
        $aktif_asama = mysqli_real_escape_string($conn, $data[7]);
        $kayit_durumu = mysqli_real_escape_string($conn, $data[8]);

        // Veriyi veritabanına ekle
        $sql = "INSERT INTO ogrenci (ogrenci_id, ogrenci_isim, ogrenci_soyisim, ogrenci_mail, ogrenci_mobil, program_id, danisman_id, aktif_asama, kayit_durumu, danisman_atamatarihi, ogrenci_olusturmatarihi)
        VALUES ('$ogrenci_id', '$ogrenci_isim', '$ogrenci_soyisim', '$ogrenci_mail', '$ogrenci_mobil', '$program_id', '$danisman_id', '$aktif_asama', '$kayit_durumu', '$danisman_atamatarihi', '$ogrenci_olusturmatarihi')";
        
        $result = mysqli_query($conn, $sql);

        // Sorgu başarılıysa başarılı olduğuna dair bir mesaj yazdır, değilse hata mesajını yazdır
        if ($result) {
            echo "Veriler başarıyla eklendi.";
        } else {
            echo "Veriler eklenirken bir hata oluştu: " . mysqli_error($conn);
        }
    }
}

?>
<div class="alert alert-info"><a href="dosya.xlsx">Örnek Excel Dosyasını İndirmek İçin Tıklayınız.</a></div>

<form method="post" enctype="multipart/form-data">
  <input type="file" class="btn btn-deu" name="file">
  <button type="submit" class="btn-dark btn" name="submit">Yükle</button>
</form>

<?php
include('inc/footer.php');
?>
