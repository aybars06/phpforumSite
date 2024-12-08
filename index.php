<?php
require_once('config.php');
include 'header.php';
include 'functions.php';
?>

<div class="container-md">
    <div class="row">
        <div class="col-md-3">
            <div class="enson">
                <h3>
                <h3><i class="fa fa-spinner"><a href="#">En Son Konular</a></i></h3>
                </h3>
                <hr/>
                <?php
                $currentPage = isset($_GET['page']) ? $_GET['page'] : '';
                enson_konu($currentPage);
                if (!empty($currentPage)) {
                    header("Location: yazi.php");
                    exit;
                }
                ?>
            </div>
            <br/>
            <div class="kategori enson">
                <i class="fa fa-folder-open">
                    <a data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false">Kategoriler</a>
                </i>
                <div class="collapse" id="collapseExample">
                    <hr/>
                    <div class="kategoriyazi">
                        <i class="fa fa-archive"><a href="#">Hayattan</a></i>
                        <br/>
                        <i class="fa fa-archive"><a href="#">Yardım Maksatlı</a></i>
                        <br/>
                        <i class="fa fa-archive"><a href="#">Ders Dosyaları</a></i>
                    </div>
                </div>
            </div>
            <br/>
        </div>
        
        <div class="col">
            <br/>
            <?php
            echo "<div class=\"konu_alani\">";
            menu_olustur($currentPage);
            if (!empty($currentPage)) {
                header("Location: yazi.php");
                exit;
            }
            echo "</div>";
            ?>

        </div>
        <div class="col-md-3" >
            <div class="enson">
                <h3><i class="fa fa-thumbs-up"><a href="#">En Popüler Konular</a></i></h3>
                <hr/>
                <?php
                enpopuler_konular($currentPage);
                if(!empty($currentPage)) {
                    header("location:yazi.php");
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<br>
<?php
include 'footer.php';
?>
