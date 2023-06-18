<?php
include('inc/header.php');
include('inc/container.php');
?>

<!-- Görüşme oluşturma formu -->
<form method="POST" action="islemyonetici/gorusme_olustur.php">
    <?php if(isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success_message']; ?>
        </div>
        <?php unset($_SESSION['success_message']); endif; ?>
    <?php if(isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error_message']; ?>
        </div>
        <?php unset($_SESSION['error_message']); endif; ?>
    <input type="hidden" name="ogrenci_id" value="<?php echo $_GET['ogrenci_id']; ?>">
    <input type="hidden" name="tez_id" value="<?php echo $_GET['tez_id']; ?>">
    <div class="form-group">
        <label for="message">Görüşme Notu:</label>
        <textarea id="not" name="not" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Gönder</button>
    <a class='btn btn-info btn-sm'  href='tez_listesi.php'>Geri Dön </a>
</form>

<?php include('inc/footer.php'); ?>
