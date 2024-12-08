<?php
session_start(); // oturum bilgisini aktarma her sayfada olmalı
require_once('config.php');
include 'header.php';
if (!isset($_SESSION['uname'])) //Eğer oturum sistemden düşerse yeniden giriş istemeli. 
{
    header("location:login.php");
    exit(); // İşlemi sonlandır
}


error_reporting(E_ALL ^ E_NOTICE);
?>

<div class="yonetim_menu">
    <ul>
        <li><a href="yeni_sayfa.php">Yeni Sayfa Oluştur</a></li>
        <li><a href="sayfalar.php">Mevcut Konu Sayfaları</a></li>
        <li><a href="sayfa_guncelle.php">Sayfa Güncelleme</a></li>
        <li><a href="sayfa_sil.php">Sayfa Silme</a></li>
        <li><a href="logout.php">Çıkış</a></li>
    </ul>
</div>
<br>
<center>
    <div class="yontxt">
        <h2>Mevcut Sayfalar</h2>
        <?php
        $sorgu = mysqli_query($conn, "SELECT * FROM sayfalar ORDER BY id ASC");
        while ($bilgi = mysqli_fetch_array($sorgu)) {
            echo "<li><a href=\"sayfa_guncelle.php?sayfa={$bilgi['id']}\">{$bilgi['isim']}</a></li>\n";
        }
        ?>
    </div>
</center>
<br>
<?php include 'footer.php'; ?>
