<?php
// baglanti.php dosyanın tam içeriği böyle olmalı:
try {
    $db = new PDO("mysql:host=localhost;dbname=kitaplik;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Eğer bağlantı kurulamazsa beyaz ekran yerine buradaki hata yazısını görürsün:
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}
?>