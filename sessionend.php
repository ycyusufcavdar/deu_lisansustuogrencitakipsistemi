<?php
session_start();

// session değişkenlerini temizle
$_SESSION = array();

// session sonlandır
session_destroy();

// kullanıcıyı ana sayfaya yönlendir
header("Location: index.php");
exit();
?>