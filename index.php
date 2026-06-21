<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ana Sayfa - Kitaplık Yönetim Sistemi</title>
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
    <div class="welcome-section" style="text-align: center; padding: 20px 0; clear: both;">
        <h1 style="font-size: 32px; margin-bottom: 20px;">Kitaplık Yönetim Sistemine Hoş Geldiniz</h1>
        
        <p style="line-height: 1.8; font-size: 17px; max-width: 800px; margin: 0 auto 20px auto;">
            Bu platform; kişisel kütüphanenizi, okuduğunuz veya gelecekte okumayı planladığınız kitapları dijital ortamda düzenli bir şekilde arşivlemeniz için tasarlanmış dinamik bir <strong>Kütüphane Yönetim Paneli</strong>dir.
        </p>
        
        <p style="line-height: 1.8; font-size: 17px; max-width: 800px; margin: 0 auto 30px auto;">
            Sistemimiz sayesinde kitaplarınızı kategorilerine göre ayırabilir, sayfa sayılarını takip edebilir ve veritabanı üzerinde anlık ekleme, silme, güncelleme işlemlerini esnek bir arayüzle gerçekleştirebilirsiniz.
        </p>
        
        <div style="margin-top: 40px; position: relative; z-index: 1;">
            <a href="listele.php" class="btn btn-add" style="margin: 0 10px; padding: 12px 24px; font-size: 16px;">Koleksiyonu Görüntüle</a>
            <a href="ekle.php" class="btn btn-edit" style="margin: 0 10px; padding: 12px 24px; font-size: 16px; background-color: #3B514A;">Yeni Kitap Ekle</a>
        </div>
    </div>
</div>

</body>
</html>