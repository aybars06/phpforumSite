<?php
session_start(); // oturum bilgisini aktarma her sayfada olmalı
require_once('config.php');
include 'header.php';
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION['uname'])) //Eğer oturum sistemden düşerse yeniden giriş istemeli. 
{
    header("location:login.php");
    exit(); // İşlemi sonlandır
}


//kayıt değeri tanımlama ve değer atama kontrolü
if(isset($_GET['kayit']) && $_GET['kayit'] == 1){
    if(!isset($_POST['isim']) || empty($_POST['isim'])){
        $hata = "Tüm alanları doldurmadınız.";
    }
    else if(!isset($_POST['konu_bolumu']) || empty($_POST['konu_bolumu'])){
        $hata = "Tüm alanları doldurmadınız.";
    }
    else if(!isset($_POST['konu_kisalt']) || empty($_POST['konu_kisalt'])){
        $hata = "Tüm alanları doldurmadınız.";
    }
    else if(!isset($_POST['konu_icerik']) || empty($_POST['konu_icerik'])){
        $hata = "Tüm alanları doldurmadınız.";
    }

    if (!isset($hata)) {
        $isim = $_POST['isim'];
        $konu_bolumu = $_POST['konu_bolumu'];
        $konu_kisalt = $_POST['konu_kisalt'];
        $icerik = $_POST['konu_icerik'];

        $query = "INSERT INTO sayfalar (isim, konu_bolumu, konu_kisalt, icerik) VALUES ('$isim', '$konu_bolumu', '$konu_kisalt', '$icerik')";

        if (mysqli_query($conn, $query)) {
            $mesaj = "Kayıt Oluşturuldu.";
        } else {
            $hata = "Kayıt oluşturulurken bir hata oluştu: " . mysqli_error($baglanti);
        }
    }

}
?>
<div class = "yonetim_menu">
    <ul>
        <li><a href = "yeni_sayfa.php">Yeni Sayfa Oluştur</a></li>
        <li><a href = "sayfalar.php">Mevcut Konu Sayfaları</a></li>
        <li><a href = "sayfa_guncelle.php">Sayfa Güncelleme</a></li>
        <li><a href = "sayfa_sil.php">Sayfa Silme</a></li>
        <li><a href = "logout.php">Çıkış</a></li>
    </ul>
</div>
<br>
<center>
    <div class ="yontxt">

<h2>Yeni Konu</h2>
<?php
 if(isset($hata)){
    echo "<p> {$hata} </p> ";}
    if(isset($mesaj)){
        echo "<p> {$mesaj} </p> ";
    }
 
?>

<form name="yeni_sayfa" action="yeni_sayfa.php?kayit=1" method="post">
<p class = "isimclasi">Konu Adı: <br> <input id="submit" type="text" class=txtbox name="isim" /></p>
<p class = "isimclasi">Yazar: <br> <input id="submit" class=txtbox type="text" name="konu_bolumu" /></p>
<div class="ck">
<p class="konuclasi">Kısa Konu Bilgilendirme </p>
    <textarea class="ckeditor" name="konu_kisalt" id="" cols="70" rows="10"><?php echo isset($bilgi['konu_kisalt']) ? $bilgi['konu_kisalt'] : ''; ?></textarea>
   
</div>
<br>
<div class="ck">
<p class="konuclasi">Konu İçerik Metni </p>
    <textarea class="ckeditor" name="konu_icerik" id="" cols="70" rows="10"><?php echo isset($bilgi['konu_icerik']) ? $bilgi['konu_icerik'] : ''; ?></textarea>
</div>

<br>
</div>
<p><input type="submit" class="giris" id= "submit" value="Oluştur"/></p>
</form>
</center>
<?php include 'footer.php'; ?>
