<?php
function menu_olustur($page)
{
    global $conn;
    $page = isset($_GET['s']) ? $_GET['s'] : 1;
    if (empty($page) || !is_numeric($page)) {
        $page = 1;
    }
    $kacar = 5;
    $ksayisi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sayfalar"));
    $ssayisi = ceil($ksayisi/$kacar);//virgüllü sayıyı bi üsttekine yuvarlar.
    $nereden = ($page * $kacar) - $kacar;
    $bul = mysqli_query($conn, "SELECT * FROM sayfalar ORDER BY id DESC LIMIT $nereden,$kacar");
    while ($goster = mysqli_fetch_array($bul)) {
        extract($goster);
        echo "<div class=\"konu_alani\">";
        echo "<ul>";
        echo "<center>";
        echo "<i class=\"fa fa-sitemap\" title=\"Konu Adı\"><a href=\"yazi.php?page={$goster['id']}\">{$goster['isim']}</a></i>";
        echo "<br>";
        echo "<br>";
        echo "<i class=\"fa fa-line-chart\" title=\"Hit Sayısı\"><a href=\"#\">{$goster['hit']} Tık</a></i>";
        echo "<i class=\"fa fa-calendar\" title=\"Tarih\"><a href=\"#\">{$goster['tarih']}</a></i>";
        echo "<br>";
        echo "<div class=\"konu_kisalt\">";
        echo "<li>{$goster['konu_kisalt']}</li>";
        echo "</div>";
        echo "<br>";
        echo "</center>";
        echo "<div class=\"devamini_oku\">";
        echo "<li><a href=\"yazi.php?page={$goster['id']}\">Devamını Oku</a></li>";
        echo "</div>";
        echo "<br>";
        echo "</ul>";
        echo "</div>";
        echo "<br>";
    }
    //altta gösterecği sayfa kısmının kodu
    
    echo "<center>";
    echo "<div class=\"sayfa_numaralari\">";
    for ($i = 1; $i <= $ssayisi; $i++) {
        echo "<a class=\"sira\" href='index.php?s={$i}'>{$i}</a>";
    }
    echo "</div>"; 
    echo "</center>";
}

function duyuru_olustur($page)
{
    global $conn;
    $page = isset($_GET['s']) ? $_GET['s'] : 1;
    if (empty($page) || !is_numeric($page)) {
        $page = 1;
    }
    $kacar = 5;
    $ksayisi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM duyurular"));
    $ssayisi = ceil($ksayisi/$kacar);//virgüllü sayıyı bi üsttekine yuvarlar.
    $nereden = ($page * $kacar) - $kacar;
    $bul = mysqli_query($conn, "SELECT * FROM duyurular ORDER BY id DESC LIMIT $nereden,$kacar");
    while ($goster = mysqli_fetch_array($bul)) {
        extract($goster);
        echo "<div class=\"konu_alani\">";
        echo "<ul>";
        echo "<i class=\"fa fa-sitemap\" style=\"\" title=\"Konu Adı\"><a href=\"duyuruyazi.php?page={$goster['id']}\">{$goster['isim']}</a></i>";
        echo "<i class=\"fa fa-line-chart\" title=\"Hit Sayısı\"><a href=\"#\">{$goster['hit']} Tık</a></i>";
        echo "<i class=\"fa fa-calendar\" title=\"Tarih\"><a href=\"#\">{$goster['tarih']}</a></i>";
        echo "<i class=\"fa fa-pencil\" title=\"Yazar\"><a href=\"#\">{$goster['yazar']}</a></i>";
        echo "<br>";
        echo "<br>";
        echo "<center>";
        echo "<div class=\"konu_kisalt\">";
        echo "<li>{$goster['konu_kisalt']}</li>";
        echo "</div>";
        echo "<br>";
        echo "</ul>";
        echo "</div>";
        echo "<br>";
    }
    //altta gösterecği sayfa kısmının kodu
    
    echo "<center>";
    echo "<div class=\"sayfa_numaralari\">";
    for ($i = 1; $i <= $ssayisi; $i++) {
        echo "<a class=\"sira\" href='index.php?s={$i}'>{$i}</a>";
    }
    echo "</div>"; 
    echo "</center>";
}
function enson_konu($page)
{
    global $conn;
    $sorgu = mysqli_query($conn, "SELECT * FROM sayfalar ORDER BY id DESC, isim LIMIT 0,4");
    while ($bilgi = mysqli_fetch_array($sorgu)) {
        echo "<i class=\"fa fa-tags\" title=\"Konu Adı\"><a href=\"yazi.php?page={$bilgi['id']}\">{$bilgi['isim']}</a></i>";
        echo "<br>";
        echo "<i class=\"fa fa-clock-o\" title=\"Konu Tarihi\"><a href=\"#\">{$bilgi['tarih']}</a></i>";
        echo "<br>";
        echo "<br>";
    }
}
function enson_duyuru($page)
{
    global $conn;
    $sorgu = mysqli_query($conn, "SELECT * FROM duyurular ORDER BY id DESC, isim LIMIT 0,4");
    while ($bilgi = mysqli_fetch_array($sorgu)) {
        echo "<i class=\"fa fa-tags\" title=\"Konu Adı\"><a href=\"duyuruyazi.php?page={$bilgi['id']}\">{$bilgi['isim']}</a></i>";
        echo "<br>";
        echo "<i class=\"fa fa-clock-o\" title=\"Konu Tarihi\"><a href=\"#\">{$bilgi['tarih']}</a></i>";
        echo "<br>";
        echo "<br>";
    }
}

function enpopuler_konular($page)
{
    global $conn;
    $sorgu = mysqli_query($conn, "SELECT * FROM sayfalar ORDER BY hit DESC, hit LIMIT 0,4");
    while ($bilgi = mysqli_fetch_array($sorgu)) {
        echo "<i class=\"fa fa-tags\" title=\"Konu Adı\"><a href=\"yazi.php?page={$bilgi['id']}\">{$bilgi['isim']}</a></i>";
        echo "<br>";
        echo "<i class=\"fa fa-eye\" title=\"Hit sayısı\"><a href=\"#\">{$bilgi['hit']} Tıklanma</a></i>";
        echo "<br>";
        echo "<br>";
    }
}

function enpopuler_duyurular($page)
{
    global $conn;
    $sorgu = mysqli_query($conn, "SELECT * FROM duyurular ORDER BY hit DESC, hit LIMIT 0,4");
    while ($bilgi = mysqli_fetch_array($sorgu)) {
        echo "<i class=\"fa fa-tags\" title=\"Konu Adı\"><a href=\"duyuruyazi.php?page={$bilgi['id']}\">{$bilgi['isim']}</a></i>";
        echo "<br>";
        echo "<i class=\"fa fa-eye\" title=\"Hit sayısı\"><a href=\"#\">{$bilgi['hit']} Tıklanma</a></i>";
        echo "<br>";
        echo "<br>";
    }
}
?>
