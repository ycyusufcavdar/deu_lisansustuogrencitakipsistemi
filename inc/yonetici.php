<?php
if (isset($_SESSION['kullanici_rol']) && $_SESSION['kullanici_rol'] == "yonetici") {
    echo '<form action="sessionend.php" method="post" class="col-sm-1 col-md-7 col-lg-8 col-xl-6 d-flex justify-content-end" id ="a-form">';
    echo '<button class="btn btn-sm my-2 my-sm-0 "  type="submit" name="logout">ÇIKIŞ YAP</button>';
    echo '</form>';
    echo '</nav>';
} else{
    header('sessionend.php');
}
?>


