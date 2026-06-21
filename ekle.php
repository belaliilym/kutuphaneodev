<?php
require_once 'baglanti.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kitap_adi = $_POST['kitap_adi'];
    $yazar = $_POST['yazar'];
    $kategori_id = $_POST['kategori_id'];
    $sayfa_sayisi = $_POST['sayfa_sayisi'];

    $sorgu = $db->prepare("INSERT INTO kitaplar (kitap_adi, yazar, kategori_id, sayfa_sayisi) VALUES (?, ?, ?, ?)");
    $sorgu->execute([$kitap_adi, $yazar, $kategori_id, $sayfa_sayisi]);

    header("Location: listele.php");
    exit();
}

$kategoriler = $db->query("SELECT * FROM kategoriler")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Kitap Ekle</title>
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
    <h2>Yeni Kitap Ekle</h2>
    <form action="ekle.php" method="POST">
        <div class="form-group">
            <label>Kitap Adı:</label>
            <input type="text" name="kitap_adi" required>
        </div>
        <div class="form-group">
            <label>Yazar:</label>
            <input type="text" name="yazar" required>
        </div>
        <div class="form-group">
            <label>Kategori:</label>
            <select name="kategori_id" required>
                <?php foreach ($kategoriler as $kat): ?>
                    <option value="<?php echo $kat['id']; ?>"><?php echo htmlspecialchars($kat['kategori_adi']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Sayfa Sayısı:</label>
            <input type="number" name="sayfa_sayisi" required>
        </div>
        <button type="submit">Kitabı Kaydet</button>
    </form>
</div>

</body>
</html>