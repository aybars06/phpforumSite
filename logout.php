<?php
session_start();
session_destroy(); // Oturumu sonlandır
header("location: login.php?message=Çıkış Yaptınız."); // login.php sayfasına yönlendirdik ve mesajı iletilen parametre olarak ekledik.
exit(); // İşlemi sonlandır
?>