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

?>
<div class= "sec">
    <center>
        <?php
        echo "<kbd>Güncellemek istediğiniz sayfayı seçiniz.</kbd>";
        echo "<br>";
        echo "<br>";
        echo "<form name=\"forumadi\">";
        echo "<p>";
        echo "<select onchange=\"javascript:document.location=document.forumadi.kategori.options[document.forumadi.kategori.selectedIndex].value\" name=\"kategori\">";
        echo "<option value=\"\" selected>Seçiniz</option>";
        $sorgu = mysqli_query($conn, "SELECT * FROM sayfalar ORDER BY id DESC"); 
        while($bilgi=mysqli_fetch_array($sorgu))
        {
            echo "<option class=\"main1\" value=\"sayfa_guncelle.php?sayfa=".$bilgi['id']."\">".$bilgi['isim']."</option>";
        }
        echo "</select></p>"; 
        echo "</form>"; 
        ?>
    </center>
</div>
<?php 
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
        $konu_kisalt = $_POST['konu_kisalt'];
        $konu_bolumu = $_POST['konu_bolumu'];
        $konu_icerik = $_POST['konu_icerik'];
        $sayfa_id = $_POST['sayfa'];
    
        $query = "UPDATE sayfalar SET isim='$isim', konu_kisalt='$konu_kisalt', konu_bolumu='$konu_bolumu', icerik='$konu_icerik' WHERE id='$sayfa_id'";
        mysqli_query($conn, $query);
        $mesaj="Kayıt Başarıyla Güncellenmiştir.";
    }
    
}
if (isset($_POST['sayfa'])) {
    $sayfa = $_POST['sayfa'];
} elseif (isset($_GET['sayfa'])) {
    $sayfa = $_GET['sayfa'];
}
if(isset($sayfa)){
    $sorgu = mysqli_query($conn, "SELECT * FROM sayfalar WHERE id='$sayfa'");
    $bilgi = mysqli_fetch_array($sorgu);
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

<h2>Güncelleme Sayfası</h2>
<form name="yeni_sayfa" action="sayfa_guncelle.php?kayit=1" method="post">
<input type="hidden" class=txtbox name="sayfa" value="<?php echo isset($bilgi['id']) ? $bilgi['id'] : '';?>" />
<?php
 if(isset($hata)){
    echo "<p> {$hata} </p> ";}
    if(isset($mesaj)){
        echo "<p> {$mesaj} </p> ";
    }
 
?>

<form name="yeni_sayfa" action="yeni_sayfa.php?kayit=1" method="post">
<p class = "isimclasi">Konu Adı: <br> <input id="submit" type="text" class=txtbox name="isim" value="<?php echo isset($bilgi['isim']) ? $bilgi['isim'] : '';?>" /></p>
<p class = "isimclasi">Yazar: <br> <input id="submit" class=txtbox type="text" name="konu_bolumu" value="<?php echo isset($bilgi['konu_bolumu']) ? $bilgi['konu_bolumu'] : '';?>"/></p>
<div class="ck">
<p class="konuclasi">Kısa Konu Bilgilendirme </p>
    <textarea class="ckeditor" name="konu_kisalt" id="" cols="70" rows="10"><?php echo isset($bilgi['konu_kisalt']) ? $bilgi['konu_kisalt'] : ''; ?></textarea>
   
</div>
<br>
<div class="ck">
<p class="konuclasi">Konu İçerik Metni </p>
    <textarea class="ckeditor" name="konu_icerik" id="" cols="70" rows="10"><?php echo isset($bilgi['icerik']) ? $bilgi['icerik'] : ''; ?></textarea>
</div>

<br>
</div>
<p><input type="submit" class="giris" id= "submit" value="Güncelle"/></p>
</form>
</center>
<br>
<?php include 'footer.php'; ?>
