
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;



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


--


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
-- Tetikleyiciler `ogrenci_asama`

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--

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
