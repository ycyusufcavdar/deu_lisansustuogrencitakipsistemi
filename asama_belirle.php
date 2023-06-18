<?php
// Veritabanı bağlantısı
include('config/database.php');
include('inc/header.php');
include('inc/container.php');

// Hata mesajlarını göstermek için gerekli kontrolleri yapalım
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['success_message']);
unset($_SESSION['error_message']);

?>
<h2>Aşama Belirle</h2> <hr>
<div class="form-group">
    <label for="ogrenci">Öğrenci Seçin:</label>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <?php if ($success_message): ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($success_message); ?>
            </div>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <select class="form-control" name="ogrenci_id" id="ogrenci" onchange="this.form.submit()">
            <?php
            // Öğrencileri veritabanından çek
            if (isset($_SESSION['kullanici_mail']) && isset($_SESSION['kullanici_rol'])) {
                if ($_SESSION['kullanici_rol'] == "yonetici") {
                    $ogrenci_query = "SELECT * FROM ogrenci";
                    $ogrenci_stmt = $conn->prepare($ogrenci_query);
                } else if ($_SESSION['kullanici_rol'] == "danisman") {
                    $danisman = $_SESSION['kullanici_id'];
                    $ogrenci_query = "SELECT * FROM ogrenci WHERE danisman_id = ?";
                    $ogrenci_stmt = $conn->prepare($ogrenci_query);
                    $ogrenci_stmt->bind_param("i", $danisman);
                }

                $ogrenci_stmt->execute();
                $ogrenci_result = $ogrenci_stmt->get_result();

                // Öğrenci listesini oluştur
                if (!isset($_GET['ogrenci_id'])) {
                    echo '<option value=""> Lütfen bir öğrenci seçin. </option>';
                }
                while ($ogrenci = $ogrenci_result->fetch_assoc()) {
                    $selected = '';
                    if (isset($_GET['ogrenci_id']) && $_GET['ogrenci_id'] == $ogrenci['ogrenci_id']) {
                        $selected = 'selected';
                        $program_id = $ogrenci['program_id'];
                    }
                    echo '<option value="' . htmlspecialchars($ogrenci['ogrenci_id']) . '" ' . $selected . '>' . htmlspecialchars($ogrenci['ogrenci_isim']) . ' ' . htmlspecialchars($ogrenci['ogrenci_soyisim']) . '</option>';
                }
                $ogrenci_stmt->close();
            }
            ?>
        </select>
    </form>
</div>

<?php
if (isset($_GET['ogrenci_id'])) {
    $ogrenci_id = $_GET['ogrenci_id'];

    // Öğrenci bilgilerini veritabanından çek
    $ogrenci_query = "SELECT * FROM ogrenci WHERE ogrenci_id = ?";
    $ogrenci_stmt = $conn->prepare($ogrenci_query);
    $ogrenci_stmt->bind_param("i", $ogrenci_id);
    $ogrenci_stmt->execute();
    $ogrenci_result = $ogrenci_stmt->get_result();
    $ogrenci = $ogrenci_result->fetch_assoc();
    $ogrenci_stmt->close();

    // Öğrencinin programı için aşamaları veritabanından çek
    $program_id = $ogrenci['program_id'];
    $aktif_asama = $ogrenci['aktif_asama'];

    // Asama seçeneklerini listelemeden önce asama_notlari tablosunda bu öğrenci ve aşama kombinasyonunun olup olmadığını kontrol et
    $asama_query = "SELECT * FROM ogrenci_asama WHERE program_id = ? AND asama_seviyesi > ? LIMIT 1";
    $asama_stmt = $conn->prepare($asama_query);
    $asama_stmt->bind_param("ii", $program_id, $aktif_asama);
    $asama_stmt->execute();
    $asama_result = $asama_stmt->get_result();

    if ($asama_result->num_rows > 0) {
        echo '
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="islemyonetici/asama_belirle.php">
                        <div class="form-group">
                            <label for="asama">Aşama Seçin:</label>
                            <select class="form-control" name="asama_id" id="asama_id">
                                ';
        // Aşama listesini oluştur
        while ($asama = $asama_result->fetch_assoc()) {
            echo '<option value="' . htmlspecialchars($asama['asama_id']) . '">' . htmlspecialchars($asama['asama_adi']) . '</option>';
        }

        echo '
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="not">Aşama Notu Girin:</label>
                            <input type="text" class="form-control" name="asama_notu" id="asama_notu" required>
                        </div>

                        <input type="hidden" name="ogrenci_id" id ="ogrenci_id" value="' . htmlspecialchars($ogrenci_id) . '">
                        <input type="hidden" name="program_id" id ="program_id" value="' . htmlspecialchars($program_id) . '">

                        <button type="submit" class="btn btn-primary">Not Ekle</button>
                    </form>
                </div>
            </div>
        ';
    } else {
        echo '<p>Öğrencinin programı için henüz yeni aşama tanımlanmamış.</p>';
    }
}

include('inc/footer.php');
?>