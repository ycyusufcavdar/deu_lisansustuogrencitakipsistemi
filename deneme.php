<!DOCTYPE html>
<html>
<head>
    <title>Öğrenci Listesi</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#ogrenci_tablosu').DataTable();
        });
    </script>
</head>
<body>
    <h2>Öğrenci Listesi</h2>
    <table id="ogrenci_tablosu" class="display">
        <thead>
            <tr>
                <th>İsim</th>
                <th>Soyisim</th>
                <th>Program</th>
                <th>Sisteme Kayıt Tarihi</th>
                <th>Danışman Atama Tarihi</th>
                <th>Tamamlanan Aşama</th>
                <th>Kayıt Durumu</th>
                <th>Detay Görüntüle</th>
                <th>Düzenle</th>
                <th>Sil</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Öğrenci verilerini doldurun
            ?>
        </tbody>
    </table>
</body>
</html>