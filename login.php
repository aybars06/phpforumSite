<?php
require_once('config.php');
include 'header.php';
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_GET['message'])) {
    echo "<center><h5>" . $_GET['message'] . "</h5></center>";
}
?>
<center>
    <div class="login">
    <h2 style="color: #333;">Yönetici Girişi</h2>
        <form action="sys_kontrol.php" method="post">
        <p> Kullanıcı Adı <br/> <input id="submit" type="text" name="username" /></p>
        <p> Şifre <br/> <input id="submit" type="password" name="password" /></p>
        <p> <input class="giris" id="submit" type="submit" value="Giriş" /></p>
        </form>
    </div>
</center>
<?php include 'footer.php'; ?>