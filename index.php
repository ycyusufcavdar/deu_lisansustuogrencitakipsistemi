<?php
include_once('config/database.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı adı ve şifre kontrolü yapılır, doğruysa giriş yapılır.
    $query = "SELECT * FROM kullanici WHERE kullanici_mail = '$username' AND kullanici_pass = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        session_start();
        $row = mysqli_fetch_assoc($result); // Sonucu al
        $_SESSION['kullanici_id'] = $row['kullanici_id'];
        $_SESSION['kullanici_rol'] = $row['kullanici_rol'];
        $_SESSION['kullanici_mail'] = $username;
        header('Location: index.php');
        exit(); // Giriş yapıldıktan sonra kodun devamına gerek yok, bu yüzden çıkış yapılır.
    } else {
        // Giriş bilgileri hatalıysa hata mesajı göster
        echo '<script type="text/javascript">
                window.onload = function () { alert("Hatalı Kullanıcı Adı, Şifre ya da Rol."); }
            </script>';
    }
}

include('inc/header.php');
include('inc/container.php');

include('bildirimsistemi.php');

include('inc/footer.php');
?>
