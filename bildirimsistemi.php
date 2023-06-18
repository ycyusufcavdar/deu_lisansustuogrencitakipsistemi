<?php
if(isset($_SESSION['kullanici_rol'])){
    if($_SESSION['kullanici_rol'] == "yonetici"){
        echo"<div class='row justify-content-md-center'>";
             // Buraya tez aşamasına geçmiş öğrencilerin sayısı ve o öğrencilerin tez tablosunda olup olmadıkları yazacak
        $ogrenci_query = "SELECT COUNT(*) AS tezasamasi FROM ogrenci WHERE aktif_asama = (SELECT tez_asamasi FROM ogrenci_program WHERE program_id = ogrenci.program_id) AND ogrenci_id NOT IN (SELECT ogrenci_id FROM tez_tablosu)";
        $ogrenci_result = $conn->query($ogrenci_query);
        $row_ogrenci = $ogrenci_result->fetch_assoc();
        $sayi = $row_ogrenci['tezasamasi'];



     if($sayi>0){
     echo "<div class='alert alert-warning col-sm-0 col-md-12 col-lg-12 col-xl-12'>Tez başlığı belirlenmemiş ve işlem bekleyen  öğrenci sayısı:  $sayi  <a class='' style='margin-left:20px;' href='tez_asamasindaki_ogrenciler.php'>İşlem Yapmak İçin Tıklayınız </a> </div>";
    }else{
        echo "<div class='alert alert-success col-sm-0 col-md-12 col-lg-12 col-xl-12'>Tez aşamasına geçmiş ve işlem bekleyen öğrenci Bulunmamaktadırdır.</div>";
    }
    // Tez başlığı belirlenmiş ancak iletişime geçilmemiş öğrenciler listesi
    $mail_gorusme = "SELECT COUNT(*) AS iletisim 
    FROM tez_tablosu 
    WHERE ogrenci_id NOT IN (SELECT ogrenci_id FROM tez_gorusme)
       OR ogrenci_id NOT IN (SELECT ogrenci_id FROM gonderilen_mailler)
    ";
    $mg_result = $conn->query($mail_gorusme);
    $row_mg = $mg_result->fetch_assoc();
    $sayi_mg = $row_mg['iletisim'];



 if($sayi_mg>0){
 echo "<div class='alert alert-warning col-sm-0 col-md-12 col-lg-12 col-xl-12'>Tez başlığı belirlenmiş ve iletişime geçilmemiş  öğrenci sayısı:  $sayi  <a class='' style='margin-left:20px;' href='tez_listesi.php'>İşlem Yapmak İçin Tıklayınız </a> </div>";
}else{
    echo "<div class='alert alert-success col-sm-0 col-md-12 col-lg-12 col-xl-12 '>Tez başlığı belirlenmiş ve iletişime geçilmesi gereken öğrenci Bulunmamaktadır.</div>";
}

    // Ataması yapılmamış öğrencilerin sayısı sorgusu
    $sql_atanmamis = "SELECT COUNT(*) AS atanmamis_sayisi FROM ogrenci WHERE danisman_id IS NULL";
    $result_atanmamis = $conn->query($sql_atanmamis);
    $row_atanmamis = $result_atanmamis->fetch_assoc();
    $atanmamis_sayisi = $row_atanmamis['atanmamis_sayisi'];

    // Eğer ataması yapılmamış öğrenci varsa, bildirim kutusunu oluştur
            if ($atanmamis_sayisi > 0) {
            echo "<div class='alert alert-warning col-sm-0 col-md-12 col-lg-12 col-xl-12'>Danışman Ataması yapılmamış " . $atanmamis_sayisi . " öğrenci var. Lütfen danışman ataması yapınız.</div>";
            }else{
                echo "<div class='alert alert-success col-sm-0 col-md-12 col-lg-12 col-xl-12'>Danışman Ataması Yapılmamış Öğrenci Bulunmamaktadır.</div>";
            }


                    //Grafikler
        include('grafikler.php');
        echo"</div>";

    }else if($_SESSION['kullanici_rol'] == "danisman"){
        echo"<div class='row justify-content-md-center'>";

        $danisman = $_SESSION['kullanici_id'];

        $ogrenci_query = "SELECT COUNT(*) AS tezasamasi FROM ogrenci WHERE danisman_id = $danisman AND aktif_asama = (SELECT tez_asamasi FROM ogrenci_program WHERE program_id = ogrenci.program_id) AND ogrenci_id NOT IN (SELECT ogrenci_id FROM tez_tablosu)";
        $ogrenci_result = $conn->query($ogrenci_query);
        $row_ogrenci = $ogrenci_result->fetch_assoc();
        $sayi = $row_ogrenci['tezasamasi'];


     // Buraya tez aşamasına geçmiş öğrencilerin sayısı ve o öğrencilerin tez tablosunda olup olmadıkları yazacak
     if($sayi>0){
     echo "<div class='alert alert-warning col-sm-0 col-md-12 col-lg-12 col-xl-12'>Tez başlığı belirlenmemiş ve işlem bekleyen  öğrenci sayısı:  $sayi  <a class='' style='margin-left:20px;' href='tez_asamasindaki_ogrenciler.php'>İşlem Yapmak İçin Tıklayınız </a> </div>";
    }else{
        echo "<div class='alert alert-success col-sm-0 col-md-12 col-lg-12 col-xl-12'>Tez aşamasına geçmiş ve işlem bekleyen öğrenci Bulunmamaktadır.</div>";
    }

    // Tez başlığı belirlenmiş ancak iletişime geçilmemiş öğrenciler listesi
    $mail_gorusme = "SELECT COUNT(*) AS iletisim 
    FROM tez_tablosu 
    WHERE ogrenci_id NOT IN (SELECT ogrenci_id FROM tez_gorusme)
       OR ogrenci_id NOT IN (SELECT ogrenci_id FROM gonderilen_mailler)
       AND ogrenci_id IN (SELECT ogrenci_id FROM ogrenci WHERE danisman_id = $danisman)
    
    ";
    $mg_result = $conn->query($mail_gorusme);
    $row_mg = $mg_result->fetch_assoc();
    $sayi_mg = $row_mg['iletisim'];



 if($sayi_mg>0){
 echo "<div class='alert alert-warning col-sm-0 col-md-12 col-lg-12 col-xl-12'>Tez başlığı belirlenmiş ve iletişime geçilmemiş  öğrenci sayısı:  $sayi_mg  <a class='' style='margin-left:20px;' href='tez_listesi.php'>İşlem Yapmak İçin Tıklayınız </a> </div>";
}else{
    echo "<div class='alert alert-success col-sm-0 col-md-12 col-lg-12 col-xl-12 '>Tez başlığı belirlenmiş ve iletişime geçilmesi gereken öğrenci Bulunmamaktadır.</div>";
}


   include('grafikler.php');
   echo"</div>";

    }
}else{
    echo '<div class="row">';
    echo '<div class="alert alert-info col-sm-0 col-md-12 col-lg-12 col-xl-12 text-center"><h2>Öğrenci Takip Sistemine Hoşgeldiniz.</h2></div>';
    echo '<div class="alert alert-info col-sm-0 col-md-12 col-lg-12 col-xl-12  text-center">';
    echo '<h5>Öğrenci Takip Sistemi Nedir?</h5>';
    echo '<p>Yapılan bu çalışma lisansüstü eğitimi alan öğrencilerin bilgilerinin sisteme entegrasyonu ve bu öğrencilerin danışmanları tarafından denetlenip, takip edilmesine yöneliktir. Sistem 2 farklı kullanıcı türü için tasarlanmıştır. Bunlar, danışman ve bölüm başkanıdır.</p>';
    echo '</div>';
    echo '<div class="alert alert-info col-sm-0 col-md-12 col-lg-12 col-xl-12  text-center ">';
    echo '<p><b> Bölüm başkanı </b> sisteme öğrenci ekleme işlemi, öğrenciye danışman atama, danışman ekleme, program ve aşama ekleme gibi sistem içerisinde bulunan bütün işlevleri kullanabilme özelliğine sahiptir.</p>';
    echo '</div>';
    echo '<div class="col-1"></div>';
    echo '<div class="alert alert-info col-sm-0 col-md-12 col-lg-12 col-xl-12  text-center  ">';
    echo '<p><b>Danışmanlar </b> ise, öğrencileri üzerinde işlemler yapabilme yetkisine sahiptir. Proje PHP ile yazılmış olup veritabanı sistemi için ise MYSQL kullanılmıştır. Sistem istek üzerine manuel tabanlı geliştirilmiştir.</p>';
    echo '</div>';
    echo '</div>';
    

    
};






?>