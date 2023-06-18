<?php
include('config/database.php');
include('inc/header.php');
include('inc/container.php');
?>


<h2>Programlar Ekle</h2>
<hr>

<form action="islemyonetici/program_ekle.php" method="POST">

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

 <div class="form-group">
    <label for="program_adi">Program Adi:</label>
    <input type="text" class="form-control" id="program_adi" name="program_adi" required>
  </div>
  <div class="form-group">
    <label for="tez_asamasi">Tez Aşaması:</label>
    <select class="form-control" id="tez_asamasi" name="tez_asamasi">
      <option value="Tez asamasi bulunmamakta">Tez Aşaması Bulunmamakta</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Ekle</button>



</form>



<?php

include('inc/footer.php');
?>