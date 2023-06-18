-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 30 May 2023, 16:20:14
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `deu_lisansustu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `asama_notlari`
--

DROP TABLE IF EXISTS `asama_notlari`;
CREATE TABLE IF NOT EXISTS `asama_notlari` (
  `not_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_id` int(11) NOT NULL,
  `asama_id` int(11) NOT NULL,
  `danisman_notu` text COLLATE utf8mb4_bin NOT NULL,
  `asama_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`not_id`),
  UNIQUE KEY `UC_asama_notlari` (`ogrenci_id`,`asama_id`),
  KEY `ogrenci_id` (`ogrenci_id`),
  KEY `asama_id` (`asama_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `asama_notlari`
--

INSERT INTO `asama_notlari` (`not_id`, `ogrenci_id`, `asama_id`, `danisman_notu`, `asama_tarih`) VALUES
(1, 6, 24, 'AÅŸama 1 baÅŸarÄ±lÄ±', '2023-05-16 15:30:34'),
(2, 7, 1, 'AÅŸama 1 baÅŸarÄ±lÄ±', '2023-05-16 15:30:40'),
(3, 2018469066, 1, 'AÅŸama 1 baÅŸarÄ±lÄ±', '2023-05-16 15:30:48'),
(4, 2018469067, 16, 'AÅŸama 1 baÅŸarÄ±lÄ±', '2023-05-16 15:30:54'),
(5, 2018469067, 18, 'AÅŸama 3 e geÃ§ti', '2023-05-16 15:45:16'),
(6, 2018469067, 19, 'Ogrenci tez aÅŸamasÄ±na geldi.', '2023-05-17 06:41:51'),
(7, 6, 42, 'AÅŸama 5 baÅŸarÄ±lÄ±', '2023-05-17 07:17:35'),
(8, 2018469066, 2, 'asd', '2023-05-17 14:16:30'),
(9, 7, 2, 'GÃ¼ncellemeleri deniyorum.', '2023-05-19 14:30:11'),
(10, 7, 5, 'a', '2023-05-30 18:40:05'),
(11, 7, 6, 'a', '2023-05-30 18:40:08'),
(12, 7, 7, 'a', '2023-05-30 18:40:10'),
(13, 7, 8, 'a', '2023-05-30 18:40:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dondurma_talepleri`
--

DROP TABLE IF EXISTS `dondurma_talepleri`;
CREATE TABLE IF NOT EXISTS `dondurma_talepleri` (
  `talep_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_id` int(11) NOT NULL,
  `dondurma_icerigi` text COLLATE utf8mb4_bin NOT NULL,
  `dondurma_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bitis_tarihi` date NOT NULL,
  PRIMARY KEY (`talep_id`),
  KEY `ogrenci_id` (`ogrenci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `dondurma_talepleri`
--

INSERT INTO `dondurma_talepleri` (`talep_id`, `ogrenci_id`, `dondurma_icerigi`, `dondurma_tarihi`, `bitis_tarihi`) VALUES
(6, 7, 'Deprem sebebiyle 1 dÃ¶nemlik izin.', '2023-05-17 09:22:37', '2023-05-25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gonderilen_mailler`
--

DROP TABLE IF EXISTS `gonderilen_mailler`;
CREATE TABLE IF NOT EXISTS `gonderilen_mailler` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_id` int(11) NOT NULL,
  `konu` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `mesaj` text COLLATE utf8mb4_bin NOT NULL,
  `gonderme_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mail_id`),
  KEY `ogrenci_id` (`ogrenci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `gonderilen_mailler`
--

INSERT INTO `gonderilen_mailler` (`mail_id`, `ogrenci_id`, `konu`, `mesaj`, `gonderme_tarihi`) VALUES
(2, 2018469067, 'Bu bir deneme mailidir.', 'Deneme maili v.37', '2023-05-17 12:07:32'),
(3, 2018469067, 'asd', 'qwe', '2023-05-17 14:16:48'),
(4, 2018469067, 'Deneme maili son gÃ¼ncelleme ', 'GÃ¼ncellemelerin denetimi iÃ§in mail atmam gerekiyord', '2023-05-19 14:41:42'),
(5, 2018469067, 'Deneme ', 'deneme', '2023-05-20 12:22:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_isim` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `kullanici_soyisim` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `kullanici_mail` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `kullanici_pass` varchar(64) COLLATE utf8mb4_bin NOT NULL,
  `kullanici_mobil` varchar(13) COLLATE utf8mb4_bin NOT NULL,
  `kullanici_rol` enum('yonetici','danisman') COLLATE utf8mb4_bin NOT NULL,
  `kullanici_olusturmatarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kullanici_id`),
  UNIQUE KEY `kullanici_mail` (`kullanici_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_isim`, `kullanici_soyisim`, `kullanici_mail`, `kullanici_pass`, `kullanici_mobil`, `kullanici_rol`, `kullanici_olusturmatarihi`) VALUES
(1, 'Vahap', 'Tecim', 'vahaptecim@gmail.com', '1234', '5555555555', 'yonetici', '2023-05-07 18:06:19'),
(3, 'Ã‡iÄŸdem', 'Tarhan', 'cigdemtarhan@deu.edu.tr', '1234', '5551113322', 'danisman', '2023-05-08 06:48:05'),
(4, 'Can', 'AydÄ±n', 'canaydÄ±n@gmail.com', '12345', '5551113322', 'danisman', '2023-05-16 15:46:31'),
(6, 'Kutan', 'Koruyan', 'kutankoruyan@gmail.com', '1234', '5451751545', 'danisman', '2023-05-16 16:07:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

DROP TABLE IF EXISTS `ogrenci`;
CREATE TABLE IF NOT EXISTS `ogrenci` (
  `ogrenci_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_isim` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `ogrenci_soyisim` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `ogrenci_mail` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `ogrenci_mobil` varchar(13) COLLATE utf8mb4_bin NOT NULL,
  `program_id` int(11) NOT NULL,
  `danisman_id` int(11) DEFAULT NULL,
  `aktif_asama` int(11) NOT NULL DEFAULT '0',
  `kayit_durumu` enum('yeniledi','yenilemedi') COLLATE utf8mb4_bin NOT NULL DEFAULT 'yeniledi',
  `danisman_atamatarihi` datetime DEFAULT NULL,
  `ogrenci_olusturmatarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ogrenci_id`),
  KEY `program_id` (`program_id`),
  KEY `danisman_id` (`danisman_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2018469068 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`ogrenci_id`, `ogrenci_isim`, `ogrenci_soyisim`, `ogrenci_mail`, `ogrenci_mobil`, `program_id`, `danisman_id`, `aktif_asama`, `kayit_durumu`, `danisman_atamatarihi`, `ogrenci_olusturmatarihi`) VALUES
(6, 'TarÄ±k', 'Kum', 'tarikkum@gmail.com', '5673452145', 2, 1, 5, 'yeniledi', '2023-05-17 07:17:35', '2023-05-08 06:38:06'),
(7, 'Salih', 'Muran', 'salih@gmail.com', '5673452145', 1, 3, 6, 'yeniledi', '2023-05-30 18:40:13', '2023-05-08 09:39:56'),
(2018469066, 'Yusuf', 'Ã‡avdar', 'yusufcavdar@gmail.com', '5673452145', 1, 1, 2, 'yeniledi', '2023-05-17 14:16:30', '2023-08-05 06:46:11'),
(2018469067, 'Selim', 'Muran', 'yc.yusufcavdar@gmail.com', '5432134567', 4, 1, 4, 'yeniledi', '2023-05-17 10:37:59', '2023-05-16 14:49:33');

--
-- Tetikleyiciler `ogrenci`
--
DROP TRIGGER IF EXISTS `ogrenci_danismantar`;
DELIMITER $$
CREATE TRIGGER `ogrenci_danismantar` BEFORE UPDATE ON `ogrenci` FOR EACH ROW BEGIN
  IF NEW.danisman_id IS NOT NULL THEN
        SET NEW.danisman_atamatarihi = NOW();
END IF;
    IF NEW.danisman_id <> OLD.danisman_id THEN
        SET NEW.danisman_atamatarihi =NOW();
    END IF;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ogrenci_danismanx`;
DELIMITER $$
CREATE TRIGGER `ogrenci_danismanx` BEFORE INSERT ON `ogrenci` FOR EACH ROW BEGIN
  IF NEW.danisman_id IS NOT NULL THEN
    SET NEW.danisman_atamatarihi = NOW();
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci_asama`
--

DROP TABLE IF EXISTS `ogrenci_asama`;
CREATE TABLE IF NOT EXISTS `ogrenci_asama` (
  `asama_id` int(11) NOT NULL AUTO_INCREMENT,
  `asama_adi` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `program_id` int(11) NOT NULL,
  `asama_seviyesi` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`asama_id`),
  UNIQUE KEY `UC_asama` (`program_id`,`asama_seviyesi`),
  KEY `program_id` (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `ogrenci_asama`
--

INSERT INTO `ogrenci_asama` (`asama_id`, `asama_adi`, `program_id`, `asama_seviyesi`) VALUES
(1, 'YBSYL AÅžAMA 1', 1, 1),
(2, 'YBSYL AÅžAMA 2', 1, 2),
(5, 'YBSYL AÅžAMA 3', 1, 3),
(6, 'YBSYL AÅžAMA 4', 1, 4),
(7, 'YBSYL AÅžAMA 5', 1, 5),
(8, 'YBSYL AÅžAMA 6', 1, 6),
(16, 'CBSYL ASAMA 1', 4, 1),
(17, 'CBSYL ASAMA 2', 4, 2),
(18, 'CBSYLI AÅžAMA 3', 4, 3),
(19, 'CBSYLI AÅžAMA 4', 4, 4),
(24, 'YBSD ASAMA 1', 2, 1),
(25, 'YBSD ASAMA 2', 2, 2),
(26, 'YBSD ASAMA 3', 2, 3),
(27, 'YBSD ASAMA 4', 2, 4),
(42, 'YBSD AÅžAMA 5', 2, 5),
(48, 'YBSUOT ASAMA 1', 3, 1),
(49, 'YBSUOT ASAMA 2', 3, 2);

--
-- Tetikleyiciler `ogrenci_asama`
--
DROP TRIGGER IF EXISTS `kontrol_kayit_sayisi`;
DELIMITER $$
CREATE TRIGGER `kontrol_kayit_sayisi` BEFORE INSERT ON `ogrenci_asama` FOR EACH ROW BEGIN 
    DECLARE kayit_sayisi INT;
    DECLARE tez_asamasi_limit INT;
    SET tez_asamasi_limit = (
        SELECT CASE 
            WHEN (SELECT `tez_asamasi` FROM `ogrenci_program` WHERE `program_id` = NEW.`program_id`) = 'Tez asamasi bulunmamakta' 
                THEN 9 
            ELSE CAST((SELECT `tez_asamasi` FROM `ogrenci_program` WHERE `program_id` = NEW.`program_id`) AS SIGNED) 
        END 
    );
    SELECT COUNT(*) INTO kayit_sayisi FROM `ogrenci_asama` WHERE `program_id` = NEW.`program_id`;
    IF kayit_sayisi >= tez_asamasi_limit THEN 
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Kayıt sayısı tez aşaması sınırını aşıyor!';
    END IF;
    IF (SELECT `tez_asamasi` FROM `ogrenci_program` WHERE `program_id` = NEW.`program_id`) = 'Tez asamasi bulunmamakta' AND kayit_sayisi >= 9 THEN 
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Tez asamasi bulunmamakta durumunda en fazla 9 kayıt yapılabilir!';
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ogrenci_asama_trigger`;
DELIMITER $$
CREATE TRIGGER `ogrenci_asama_trigger` BEFORE INSERT ON `ogrenci_asama` FOR EACH ROW BEGIN
    DECLARE last_asama_seviyesi INT;

    SELECT MAX(asama_seviyesi)
    INTO last_asama_seviyesi
    FROM ogrenci_asama
    WHERE program_id = NEW.program_id;

    IF last_asama_seviyesi IS NOT NULL THEN
        SET NEW.asama_seviyesi = last_asama_seviyesi + 1;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci_program`
--

DROP TABLE IF EXISTS `ogrenci_program`;
CREATE TABLE IF NOT EXISTS `ogrenci_program` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_isim` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `tez_asamasi` enum('Tez asamasi bulunmamakta','1','2','3','4','5','6','7','8','9') COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `ogrenci_program`
--

INSERT INTO `ogrenci_program` (`program_id`, `program_isim`, `tez_asamasi`) VALUES
(1, 'Yonetim Bilisim Sistemleri Yuksek Lisans', '6'),
(2, 'Yonetim Bilisim Sistemleri Doktora', '5'),
(3, 'Yonetim Bilisim Sistemleri Uzaktan Ogretim Tezsiz Yuksek Lisans', 'Tez asamasi bulunmamakta'),
(4, 'Cografi Bilgi Sistemleri Yuksek Lisans Ingilizce', '4'),
(5, 'Yonetim Bilisim Sistemleri Tezsiz Yuksek Lisans I.O', 'Tez asamasi bulunmamakta');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tez_gorusme`
--

DROP TABLE IF EXISTS `tez_gorusme`;
CREATE TABLE IF NOT EXISTS `tez_gorusme` (
  `gorusme_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_id` int(11) NOT NULL,
  `tez_id` int(11) NOT NULL,
  `gorusme_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gorusme_notu` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`gorusme_id`),
  KEY `ogrenci_id` (`ogrenci_id`),
  KEY `tez_id` (`tez_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `tez_gorusme`
--

INSERT INTO `tez_gorusme` (`gorusme_id`, `ogrenci_id`, `tez_id`, `gorusme_tarihi`, `gorusme_notu`) VALUES
(1, 2018469067, 1, '2023-05-20 12:20:18', 'Deneme 1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tez_tablosu`
--

DROP TABLE IF EXISTS `tez_tablosu`;
CREATE TABLE IF NOT EXISTS `tez_tablosu` (
  `tez_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_id` int(11) NOT NULL,
  `tez_basligi` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `baslangic_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tez_id`),
  KEY `ogrenci_id` (`ogrenci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `tez_tablosu`
--

INSERT INTO `tez_tablosu` (`tez_id`, `ogrenci_id`, `tez_basligi`, `baslangic_tarihi`) VALUES
(1, 2018469067, 'Bu bir deneme kaydÄ±dÄ±r.', '2023-05-17 07:09:57'),
(2, 7, 'a', '2023-05-30 18:40:18');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `asama_notlari`
--
ALTER TABLE `asama_notlari`
  ADD CONSTRAINT `asama_notlari_ibfk_1` FOREIGN KEY (`ogrenci_id`) REFERENCES `ogrenci` (`ogrenci_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asama_notlari_ibfk_2` FOREIGN KEY (`asama_id`) REFERENCES `ogrenci_asama` (`asama_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `dondurma_talepleri`
--
ALTER TABLE `dondurma_talepleri`
  ADD CONSTRAINT `dondurma_talepleri_ibfk_1` FOREIGN KEY (`ogrenci_id`) REFERENCES `ogrenci` (`ogrenci_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `gonderilen_mailler`
--
ALTER TABLE `gonderilen_mailler`
  ADD CONSTRAINT `gonderilen_mailler_ibfk_1` FOREIGN KEY (`ogrenci_id`) REFERENCES `ogrenci` (`ogrenci_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `ogrenci`
--
ALTER TABLE `ogrenci`
  ADD CONSTRAINT `ogrenci_ibfk_1` FOREIGN KEY (`danisman_id`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ogrenci_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `ogrenci_program` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `ogrenci_asama`
--
ALTER TABLE `ogrenci_asama`
  ADD CONSTRAINT `ogrenci_asama_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `ogrenci_program` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `tez_gorusme`
--
ALTER TABLE `tez_gorusme`
  ADD CONSTRAINT `tez_gorusme_ibfk_2` FOREIGN KEY (`ogrenci_id`) REFERENCES `ogrenci` (`ogrenci_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tez_gorusme_ibfk_3` FOREIGN KEY (`tez_id`) REFERENCES `tez_tablosu` (`tez_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `tez_tablosu`
--
ALTER TABLE `tez_tablosu`
  ADD CONSTRAINT `tez_tablosu_ibfk_1` FOREIGN KEY (`ogrenci_id`) REFERENCES `ogrenci` (`ogrenci_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
