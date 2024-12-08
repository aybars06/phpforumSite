<?php
require_once('config.php');
include 'functions.php';
include 'header.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<div class ="container-md">
<div class = "row">
<div class = "col-md-3">
    <div class = "enson">
<h3><i class = "fa fa-bar-chart"><a href ="#">İstatistik</a></i></h3>
<hr>   
<?php
if ($_GET['page']) {
    echo "<div class=\"istatistik_alani\">";
    $sorgu = mysqli_query($conn, "SELECT * FROM duyurular WHERE id='{$_GET['page']}'");
    $bilgi = mysqli_fetch_array($sorgu);
    mysqli_query($conn, "UPDATE duyurular SET hit=hit+1 WHERE id='{$_GET['page']}'");
    echo "<ul>";
    echo "<i class=\"fa fa-user-circle-o\" title=\"Yazar\"><a href=\"#\">{$bilgi['yazar']}</a></i>";
    echo "<br/><br/>";
    echo "<i class=\"fa fa-eye\"><a href=\"#\">{$bilgi['hit']} Tık Sayısı</a></i>";
    echo "<br/><br/>";
    echo "<i class=\"fa fa-clock-o\" title=\"Tarih\"><a href=\"#\">{$bilgi['tarih']}</a></i>";
    echo "</ul>";
    echo "<br/>";
    echo "</div>";
}
?>
</div>
</div>
<div class = "col-md-6">
<br>
<div id ="disicerik">
<div id = "icerik">
<?php
if($_GET['page']) {
    $sorgu=mysqli_query($conn, "SELECT * FROM duyurular WHERE id='{$_GET['page']}'");
    $bilgi=mysqli_fetch_array($sorgu);
    echo "<ul id = \"konu_adi\">";
    echo "<li>{$bilgi['isim']}</li>";
    echo "</ul>";
    echo "</br>";
    echo "<ul id = \"konu_icerik\">";
    echo "<li>{$bilgi['icerik']}</li>";
    echo "</ul>";
}
?>
</div>
</div>
</div>

<div class="col-md-3" >
<div class="enson">
<h3>
                <h3><i class="fa fa-spinner"><a href="#">En Son Duyurular</a></i></h3>
                <hr/>
<?php
global $conn;
$sorgu = mysqli_query($conn, "SELECT * FROM duyurular ORDER BY id DESC, isim LIMIT 0,4");
while ($bilgi = mysqli_fetch_array($sorgu)) {
    echo "<i class=\"fa fa-tags\" title=\"konu adı\"><a href=\"duyuruyazi.php?page={$bilgi['id']}\">{$bilgi['isim']}</a></i>";
    echo "<br>";
    echo "<i class=\"fa fa-eye\" title=\"hit sayısı\"><a href=\"#\">{$bilgi['hit']}</a></i>";
    echo "<br>";
    echo "<br>";
}
?>

</div>
</div>
</div>
</div>
<br>
<?php include 'footer.php';?>