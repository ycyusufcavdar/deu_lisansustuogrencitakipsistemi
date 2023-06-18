<body>

    <?php
    session_start();
    if (isset($_SESSION['kullanici_mail']) && isset($_SESSION['kullanici_rol'])) {
        echo '<nav class="navbar navbar-expand-md navbar-light container-fluid" id="nav-blue-deu-in" >';
    } else {
        echo ' <nav class="navbar navbar-expand-md navbar-light container-fluid" id="nav-blue-deu" >';
    }
    ?>
    <!-- Navbar / Üst Menü  -->
    <a class="navbar-brand col-sm-4 col-md-4 col-lg-2 col-xl-2" id="a-resim" href="index.php">
        <img src="docs/img/deu-logo.png" width="auto" height="40" class="d-inline-block align-top" alt="">
    </a>
    <div class="collapse navbar-collapse col-sm-4 col-md-1 col-lg-2 col-xl-4" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
    </div>


    <?php

    if (isset($_SESSION['kullanici_mail']) && isset($_SESSION['kullanici_rol'])) {
        if ($_SESSION['kullanici_rol'] == "yonetici") {
            include('inc/yonetici.php');
        } else if ($_SESSION['kullanici_rol'] == "danisman") {
            include('inc/danisman.php');
        }
    } else {
        include('inc/loginform.php');
    }
    ?>

    <div class="container-fluid">

        <div class="row">

            <!-- En son burda kaldım unutma 19.04.2023 - responsive tasarım yapmaya çalışıyorum 20.15 -->
            <div class="col-sm-0 col-md-4 col-lg-2 col-xl-2 side-menu" id="menu-deneme">
                <!-- Sidebar / Yan Menü -->
                <?php
                include('inc/menu.php');
                ?>
            <div class="col-sm-12 col-md-8 col-lg-10 col-xl-9">

                <div class="card yonetici-tez">
                    <!-- Burası include yeri -->


                    <!-- Öğrenci ve danışman için responsive tasarımı yapmadım, diğer sefere onu yapıcam. -->