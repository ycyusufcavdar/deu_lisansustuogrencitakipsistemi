<?php
date_default_timezone_set('Europe/Istanbul');
$host = "localhost";
$user = "root";
$pass = "";
$db = "deu_lisansustu";

// Veritabanı bağlantısını yaparken hata kontrolleri
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Veritabanına bağlanırken hata oluştu: " . mysqli_connect_error());
}

// Gerekli güvenlik kontrolleri ve filtrelemeleri
$host = filter_var($host, FILTER_SANITIZE_STRING);
$user = filter_var($user, FILTER_SANITIZE_STRING);
$pass = filter_var($pass, FILTER_SANITIZE_STRING);
$db = filter_var($db, FILTER_SANITIZE_STRING);

// Veritabanı bağlantısı güvence altında olduğunda işlemlere devam etme

?>
