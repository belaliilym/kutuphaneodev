<?php
// 1. Hataları ekrana yazdırma komutları (Beyaz ekran kalırsa hatayı görmek için)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Veritabanı bağlantısını dahil etme
require_once 'baglanti.php'; 

// 3. Kitap silme işlemi
if (isset($_GET['sil_id'])) {
    $sil_id = intval($_GET['sil_id']);
    $sorgu = $db->prepare("DELETE FROM kitaplar WHERE id = ?");
    $sorgu->execute([$sil_id]);
    header("Location: listele.php");
    exit();
}

// 4. Kitapları veritabanından çekme
try {
    $sorgu = $db->query("SELECT * FROM kitaplar");
    $kitaplar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Kitaplar listelenirken bir veritabanı hatası oluştu: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Mevcut Kitap Koleksiyonu - Kitaplık Yönetim Sistemi</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<nav> 
    <a href="index.php">Ana Sayfa</a>
    <a href="listele.php">Kitap Listesi</a>
    <a href="ekle.php">Yeni Kitap Ekle</a>
    <a href="hakkimizda.php">Hakkımızda</a>
    <a href="iletisim.php">İletişim</a>
</nav>

<div class="container">
    <h2>Mevcut Kitap Koleksiyonu</h2>
    <p style="color: #9eb5ae; margin-bottom: 20px;">Kütüphanenizde kayıtlı olan tüm kitapların listesi aşağıda yer almaktadır.</p>
    
    <a href="ekle.php" class="btn btn-add">Yeni Kitap Ekle</a>
    
    <table>
        <thead>
            <tr>
                <th>Kitap Adı</th>
                <th>Yazar</th>
                <th>Sayfa Sayısı</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($kitaplar) > 0): ?>
                <?php foreach ($kitaplar as $kitap): ?>
                <tr>
                    <td><?php echo htmlspecialchars($kitap['kitap_adi']); ?></td>
                    <td><?php echo htmlspecialchars($kitap['yazar']); ?></td>
                    <td><?php echo htmlspecialchars($kitap['sayfa_sayisi']); ?></td>
                    <td>
                        <a href="guncelle.php?id=<?php echo $kitap['id']; ?>" class="btn btn-edit">Düzenle</a>
                        <a href="listele.php?sil_id=<?php echo $kitap['id']; ?>" class="btn btn-delete" onclick="return confirm('Bu kitabı silmek istediğinize emin misiniz?')">Sil</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center; color: #9A7049; padding: 20px;">Kütüphanede henüz kitap bulunmuyor.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>