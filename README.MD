# SİSTEM TANIMI
Yapılan bu çalışma lisansüstü eğitimi alan öğrencilerin bilgilerinin sisteme entegrasyonu ve bu öğrencilerin danışmanları tarafından denetlenip, takip edilmesine yöneliktir.
Sistem 2 farklı kullanıcı türü için tasarlanmıştır.

Bunlar, danışman ve bölüm başkanıdır.

• Bölüm başkanı sisteme öğrenci ekleme işlemi, öğrenciye danışman atama, danışman ekleme, program ve aşama ekleme gibi sistem içerisinde bulunan bütün işlevleri kullanabilme özelliğine sahiptir.
• Danışmanlar ise, öğrencileri üzerinde işlemler yapabilme yetkisine sahiptir. Proje PHP ile yazılmış olup veritabanı sistemi için ise MYSQL kullanılmıştır. Sistem istek üzerine manuel tabanlı geliştirilmiştir.

Kullanici girişleri config/kullanici_girisleri.txt içerisinde yazmakta olup, ekstra olarak mail sisteminin kullanılabilmesi için islemyonetici/mail_gonder.php üzerinde smtp ayarlarını güncellemeniz gerekmektedir.