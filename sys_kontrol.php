<?php
require_once('config.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sorgu = mysqli_query($conn, "SELECT * FROM kullanicilar WHERE username='$username' AND password='$password'");
$sonuc = mysqli_num_rows($sorgu);

if ($sonuc == 0) {
    // Yanlış kullanıcı adı veya şifre
    echo "<center><h1>Hatalı kullanıcı adı veya şifre. Lütfen tekrar deneyin.</h1></center>";
    echo "<script>setTimeout(function() {window.location.href = 'login.php';}, 2000);</script>";
} else {
    // Başarılı giriş
    $_SESSION['uname'] = $username;
    echo "<center><h1>Giriş Başarılı. Yönlendiriliyorsunuz...</h1></center>";
    echo "<script>setTimeout(function() {window.location.href = 'sayfalar.php';}, 2000);</script>";
    exit();
}
?>
