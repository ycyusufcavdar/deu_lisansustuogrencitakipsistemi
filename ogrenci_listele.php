<?php

include('config/database.php');
include('inc/header.php');
include('inc/container.php');






if (isset($_SESSION['kullanici_mail']) && isset($_SESSION['kullanici_rol'])) {
  if($_SESSION['kullanici_rol'] == "yonetici"){
    $danisman_id = isset($_GET['danisman_id']) ? $_GET['danisman_id'] : '';

$sql_ogrenci = "SELECT * FROM ogrenci";
if ($danisman_id != '') {
  if ($danisman_id == 'x') {
    $sql_ogrenci .= " WHERE danisman_id IS NULL";
  } else {
    $sql_ogrenci .= " WHERE  danisman_id = '$danisman_id'";
  }
}
$result_ogrenci = $conn->query($sql_ogrenci);

$sql_danisman = "SELECT * FROM kullanici WHERE kullanici_rol ='danisman' OR kullanici_rol ='yonetici'";
$result_danisman = $conn->query($sql_danisman);



  include('listeleme/ogrenci_listele_yonetici.php');
  }else if($_SESSION['kullanici_rol'] == "danisman"){
    $danisman_id = $_SESSION['kullanici_id'];
    $sql_danisman_ogrenci = "SELECT * FROM ogrenci WHERE danisman_id ='$danisman_id'";
    $result_dogrenci = $conn->query($sql_danisman_ogrenci);
    include('listeleme/ogrenci_listele_danisman.php');

  }else{
    header('Location: index.php');
    exit;
  }

}else{
  header('Location: index.php');
  exit;
}

?>







<?php
include('inc/footer.php');
?>
