<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');
?>

<h2>Programlar İçin Aşama Ekle</h2>
<hr>
<form action="islemyonetici/asama_ekle.php" method="POST">
    <?php if(isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success" role="alert">
            <?php echo htmlspecialchars($_SESSION['success_message']); ?>
        </div>
        <?php unset($_SESSION['success_message']); endif; ?>
    <?php if(isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($_SESSION['error_message']); ?>
        </div>
        <?php unset($_SESSION['error_message']); endif; ?>

    <div class="form-group">
        <label for="asama_adi">Aşama Adı:</label>
        <input type="text" class="form-control" id="asama_adi" name="asama_adi" required>
    </div>
    <div class="form-group">
        <label for="program">Program:</label>
        <select class="form-control" id="program" name="program">
            <option value=""></option>
            <?php
            $sorguprogram = "SELECT * FROM ogrenci_program";
            $stmt = $conn->prepare($sorguprogram);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($rowprogram = $result->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($rowprogram['program_id']) . "'>" . htmlspecialchars($rowprogram['program_isim']) . "</option>";
            }
            $stmt->close();
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ekle</button>
</form>

<?php
include('inc/footer.php');
?>
