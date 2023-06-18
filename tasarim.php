<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css\style.css">
    <link rel="icon" href="inc\favicon.png" type="image/x-icon" />

    <title>DEU Lisans Üstü Öğrenci Takip Sistemi</title>
</head>
<body>


<nav class="navbar navbar-expand-md navbar-light container-fluid" id="nav-blue-deu-in" >

    <!-- Navbar / Üst Menü  -->
    <a class="navbar-brand col-sm-4 col-md-4 col-lg-2 col-xl-2" id="a-resim" href="index.php">
        <img src="docs/img/deu-logo.png" width="auto" height="40" class="d-inline-block align-top" alt="">
    </a>
    <div class="collapse navbar-collapse col-sm-4 col-md-1 col-lg-2 col-xl-4" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
    </div>

     <form action="sessionend.php" method="post" class="col-sm-1 col-md-7 col-lg-8 col-xl-6 d-flex justify-content-end" id ="a-form">
     <button class="btn btn-sm my-2 my-sm-0 "  type="submit" name="logout">ÇIKIŞ YAP</button>
     </form>
     </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- En son burda kaldım unutma 19.04.2023 - responsive tasarım yapmaya çalışıyorum 20.15 -->
            <div class="col-sm-0 col-md-4 col-lg-2 col-xl-2 side-menu">
                <!-- Sidebar / Yan Menü -->

                <nav class="navbar navbar-expand-md sidebar">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="collapse" data-target="#sidebarMenu">
              <span class="navbar-toggler-icon btn-deu">
              <i class="fa-solid fa-bars"></i>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="sidebarMenu">
              <ul class="navbar-nav flex-column text-left ">
                <li class="nav-item">
                  <a href="index.php" class="nav-link btn-deu"><i class="fa-solid fa-home"></i>&nbsp;Anasayfa</a>
                </li>
                <li class="nav-item">
                  <a href="profil.php" class="nav-link btn-deu"><i class="fa-solid fa-user-gear"></i>&nbsp;Profilim</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link btn-deu" data-toggle="collapse" data-target="#ogrenci-menu"><i class="fa-solid fa-user-plus"></i>&nbsp;Öğrenci İşlemleri</a>
                  
                  <ul class=" flex-column collapse" id="ogrenci-menu" style ="list-style-type:none;">
                    <li class="nav-item">
                      <a href="ogrenci_ekle.php" class="nav-link btn-deu"><i class="fa-solid fa-plus"></i>&nbsp;Yeni Öğrenci Ekle</a>
                    </li>
                    <li class="nav-item">
                    <a href="excel_ogrenci_ekle.php" class="nav-link btn-deu"><i class="fa-solid fa-plus"></i>&nbsp;Excel ile Öğrenci Ekle</a>
                  </li>
                    <li class="nav-item">
                      <a href="ogrenci_listele.php?danisman_id=" class="nav-link btn-deu"><i class="fa-solid fa-users-between-lines"></i>&nbsp;Öğrenci Listesi</a>
                    </li>
                    <li class="nav-item">
                      <a href="kayit_dondurma.php" class="nav-link btn-deu"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Kayıt Dondurma</a>
                    </li>
                    <li class="nav-item">
                    <a href="kayit_dondurma_listesi.php" class="nav-link btn-deu"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Kayıt Dondurma Listesi</a>
                  </li>
                  <li class="nav-item">
                  <a href="asama_belirle.php" class="nav-link btn-deu"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Aşama Belirle</a>
                </li>
                <li class="nav-item">
                <a href="tez_asamasindaki_ogrenciler.php" class="nav-link btn-deu"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Tez Aşamasındaki Öğrenciler</a>
              </li>

              <li class="nav-item">
              <a href="tez_listesi.php" class="nav-link btn-deu"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Tez Listele</a>
            </li>
            <li class="nav-item">
            <a href="gonderilmis_mailler.php" class="nav-link btn-deu"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Gönderilmiş Mailleri Listele</a>
          </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link btn-deu" data-toggle="collapse" data-target="#danisman-menu"><i class="fa-solid fa-address-book"></i>&nbsp;Danışman İşlemleri</a>
                  <ul class=" flex-column collapse" id="danisman-menu" style ="list-style-type:none">
                    <li class="nav-item">
                      <a href="danisman_ekle.php" class="nav-link btn-deu"><i class="fa-solid fa-plus"></i>&nbsp;Yeni Danışman Ekle</a>
                    </li>
                    <li class="nav-item">
                      <a href="danisman_listele.php" class="nav-link btn-deu"><i class="fa-regular fa-address-book"></i>&nbsp;Danışman Listesi</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link btn-deu" data-toggle="collapse" data-target="#program-menu">
                  <i class="fa-solid fa-gears"></i>&nbsp;Program İşlemleri
                </a>
                <ul class="flex-column collapse" id="program-menu" style ="list-style-type:none">
                <li class="nav-item">
                <a href="program_ekle.php" class="nav-link btn-deu">
                  <i class="fa-solid fa-plus"></i>&nbsp;Yeni Program Ekle
                </a>
              </li>
              <li class="nav-item">
              <a href="program_listele.php" class="nav-link btn-deu">
                <i class="fa-solid fa-plus"></i>&nbsp;Program Listesi
              </a>
            </li>
                  <li class="nav-item">
                    <a href="asama_ekle.php" class="nav-link btn-deu">
                      <i class="fa-solid fa-plus"></i>&nbsp;Yeni Aşama Ekle
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="asama_listele.php" class="nav-link btn-deu">
                      <i class="fa-solid fa-sliders"></i>&nbsp;Aşama Listesi
                    </a>
                  </li>
                </ul>
                </ul>
                </li>
              </li>
              </div>
            </nav>
          </div>    
                               
            <div class="col-sm-12 col-md-8 col-lg-10 col-xl-9">
                <div class="card yonetici-tez">
                    <!-- Burası include yeri -->


                    <!-- Öğrenci ve danışman için responsive tasarımı yapmadım, diğer sefere onu yapıcam. -->

                    </div>
        </div>
      </div>  
      <footer class="footer mt-auto py-3">
  <div class="container text-center">
    <span class="text-muted">DEU Lisans Üstü Öğrenci Takip Sistemi &copy; 2023</span>
  </div>
</footer>

      
    <script src="https://kit.fontawesome.com/3348cb251b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
<script>
  document.getElementById("tarih-saat-form").addEventListener("submit", function(event) {
    var tarih_saat = document.getElementById("gorusme_tarihi").value;
    var bugun = new Date();
    var secilen_tarih_saat = new Date(gorusme_tarihi);

    if (secilen_tarih_saat <= bugun) {
      alert("Lütfen ileri bir tarih ve saat seçin");
      event.preventDefault();
    }
  });
</script>
</body>
</html>