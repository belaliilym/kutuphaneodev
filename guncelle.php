<?php
require_once 'baglanti.php';

// Güncellenecek kitabın ID'si gelmiş mi kontrol ediyoruz
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);
$kategoriler = $db->query("SELECT * FROM kategoriler")->fetchAll(PDO::FETCH_ASSOC);

// [Zorunlu Görev] Mevcut bilgileri çekip forma aktarmak için sorgu yapıyoruz
$sorgu = $db->prepare("SELECT * FROM kitaplar WHERE id = ?");
$sorgu->execute([$id]);
$kitap = $sorgu->fetch(PDO::FETCH_ASSOC);

if (!$kitap) {
    die("Kayıt bulunamadı.");
}

// Form gönderildiğinde güncellenen bilgileri veritabanına yazıyoruz
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kitap_adi = $_POST['kitap_adi'];
    $yazar = $_POST['yazar'];
    $kategori_id = $_POST['kategori_id'];
    $sayfa_sayisi = $_POST['sayfa_sayisi'];

    $guncelle = $db->prepare("UPDATE kitaplar SET kitap_adi = ?, yazar = ?, kategori_id = ?, sayfa_sayisi = ? WHERE id = ?");
    $guncelle->execute([$kitap_adi, $yazar, $kategori_id, $sayfa_sayisi, $id]);
    
    // İşlem bitince ana sayfaya dönüyoruz
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kitap Güncelle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <a href="index.php">Ana Sayfa</a>
    <a href="ekle.php">Yeni Kitap Ekle</a>
    <a href="hakkimizda.php">Hakkımızda</a>
    <a href="iletisim.php">İletişim</a>
</nav>

<div class="container">
    <h2>Kitap Düzenle</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Kitap Adı:</label>
            <input type="text" name="kitap_adi" value="<?php echo htmlspecialchars($kitap['kitap_adi']); ?>" required>
        </div>
        <div class="form-group">
            <label>Yazar:</label>
            <input type="text" name="yazar" value="<?php echo htmlspecialchars($kitap['yazar']); ?>" required>
        </div>
        <div class="form-group">
            <label>Kategori:</label>
            <select name="kategori_id">
                <?php foreach ($kategoriler as $kat): ?>
                    <option value="<?php echo $kat['id']; ?>" <?php echo ($kat['id'] == $kitap['kategori_id']) ? 'selected' : ''; ?>>
                        <?php echo $kat['kategori_adi']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Sayfa Sayısı:</label>
            <input type="number" name="sayfa_sayisi" value="<?php echo htmlspecialchars($kitap['sayfa_sayisi']); ?>">
        </div>
        <button type="submit">Güncelle</button>
    </form>
</div>

</body>
</html>
