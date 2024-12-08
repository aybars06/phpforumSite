<?php
require_once('config.php');
include 'functions.php';
include 'header.php';
error_reporting(E_ALL ^ E_NOTICE);
?>

<div class="container-md">
    <div class="row">
        <div class="col-md-3">
            <div class="enson">
                <h3><i class="fa fa-bar-chart"><a href="#">İstatistik</a></i></h3>
                <hr>   
                <?php

                echo "<div class=\"istatistik_alani\">";
                $sorgu = mysqli_query($conn, "SELECT * FROM hakkimda WHERE id='1'");
                $bilgi = mysqli_fetch_array($sorgu);
                mysqli_query($conn, "UPDATE hakkimda SET hit=hit+1 WHERE id='1'");
                echo "<ul>";
                echo "<i class=\"fa fa-bookmark\"><a href=\"#\">{$bilgi['konu_bolumu']}</a></i>";
                echo "<br/><br/>";
                echo "<i class=\"fa fa-eye\"><a href=\"#\">{$bilgi['hit']} Tık Sayısı</a></i>";
                echo "<br/><br/>";
                echo "<i class=\"fa fa-clock-o\"><a href=\"#\">{$bilgi['tarih']}</a></i>";
                echo "</ul>";
                echo "<br/>";
                echo "</div>";       
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <br>
            <div id="disicerik">
                <div id="icerik">
                    <?php
                        $sorgu = mysqli_query($conn, "SELECT * FROM hakkimda WHERE id='1'");
                        $bilgi = mysqli_fetch_array($sorgu);
                        echo "<ul id=\"konu_adi\">";
                        echo "<li>{$bilgi['isim']}</li>";
                        echo "</ul>";
                        echo "<br/>";
                        echo "<ul id=\"konu_icerik\">";
                        echo "<li>{$bilgi['icerik']}</li>";
                        echo "</ul>";
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3" >
            <div class="enson">
                <h3>
                    <i class="fa fa-spinner"><a href="#">En Son Konular</a></i>
                </h3>
                <hr/>
                <?php
                global $conn;
                $sorgu = mysqli_query($conn, "SELECT * FROM sayfalar ORDER BY id DESC, isim LIMIT 0,4");
                while ($bilgi = mysqli_fetch_array($sorgu)) {
                    echo "<i class=\"fa fa-tags\" title=\"konu adı\"><a href=\"yazi.php?page={$bilgi['id']}\">{$bilgi['isim']}</a></i>";
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
