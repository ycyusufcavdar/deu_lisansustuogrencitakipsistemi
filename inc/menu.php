<?php
          if(isset($_SESSION['kullanici_mail']) && isset($_SESSION['kullanici_rol'])){
            if($_SESSION['kullanici_rol'] == "yonetici"){
              
            echo '
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
            <a href="gorusme_listele.php" class="nav-link btn-deu"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Tez Görüşmelerini Listele</a>
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
          
          
          
                 
                 
                 
                 
                 ';
            }else if($_SESSION['kullanici_rol'] == "danisman"){

              echo '
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
                        <a href="ogrenci_listele.php" class="nav-link btn-deu"><i class="fa-solid fa-users-between-lines"></i>&nbsp;Öğrenci Listesi</a>
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
              </li>
              <li class="nav-item">
              <a href="gorusme_listele.php" class="nav-link btn-deu"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Tez Görüşmelerini Listele</a>
            </li>
              <li class="nav-item">
              <a href="gonderilmis_mailler.php" class="nav-link btn-deu"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Gönderilmiş Mailleri Listele</a>
            </li>
                    </ul>
                  </li>
                </li>
                </div>
              </nav>
            </div>
            
            
            
                   
                   
                   
                   
                   ';


            }
         }else{
          ob_start();
            echo '
            <nav class="navbar navbar-expand-md sidebar">
              <button class="navbar-toggler align-self-center" type="button" data-toggle="collapse" data-target="#sidebarMenu">
                <span class="navbar-toggler-icon btn-deu">
                <i class="fa-solid fa-bars"></i>
                </span>
              </button>
              <div class="collapse navbar-collapse" id="sidebarMenu">
                <ul class="navbar-nav flex-column text-left ">
                  <li class="nav-item">
                  
                  <a href="https://online.deu.edu.tr/site/!gateway/page-reset/!gateway-100" type="button" class="nav-link btn-deu  text-left" target="_blank">
                  <i class="fa-solid fa-bars"></i>&nbsp;Online Deu / Sakai
              </a>
                  </li>
                  <li class="nav-item">
                  
                  <a href="https://online.deu.edu.tr/site/!gateway/page/!gateway-200?sakai.popup=yes" type="button" class="nav-link btn-deu   text-left" target="_blank">
                  <i class="fa-regular fa-user"></i>&nbsp;Eğitmenler İçin
              </a>
                  </li>
                  <li class="nav-item">
                  
                  <a href="https://online.deu.edu.tr/site/!gateway/page/!gateway-300?sakai.popup=yes" type="button" class="nav-link btn-deu   text-left" target="_blank">
                  <i class="fa-solid fa-users"></i>&nbsp;Öğrenciler İçin
              </a>
                  </li>
                  <li class="nav-item">
                  
                  <a href="https://online.deu.edu.tr/site/!gateway/page/!gateway-400" type="button" class="nav-link btn-deu   text-left" target="_blank">
                  <i class="fa-solid fa-phone"></i>&nbsp;İletişim
              </a>
                  </li>
                  <li class="nav-item">
                  
                  <a href="https://online.deu.edu.tr/site/!gateway/page/!gateway-500" type="button" class="nav-link btn-deu   text-left" target="_blank">
                  <i class="fa-regular fa-pen-to-square"></i>&nbsp;İçerik Geliştirme vs.
              </a>
                  </li>
                  <li class="nav-item">
                  <a href="https://online.deu.edu.tr/site/!gateway/page/!gateway-600?sakai.popup=yes" type="button" class="nav-link btn-deu   text-left" target="_blank">
                  <i class="fa-solid fa-circle-question"></i>&nbsp;S.S.S.
              </a>
                  </li>
                  <li class="nav-item">
                  <a href="https://kutuphane.deu.edu.tr/tr/anasayfa/" type="button" class="nav-link btn-deu   text-left" target="_blank>
                  <i class="fa-solid fa-book"></i>&nbsp;DEÜ Kütüphane
                  </a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
          
            
            
            
            
            ';
         }   
         
          ?>






