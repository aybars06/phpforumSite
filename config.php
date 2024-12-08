<?php
$db_adres = "localhost";
$db_user = "root";
$db_pass = "";
$db_tablo = "frmproje";
$conn = new mysqli($db_adres, $db_user, $db_pass, $db_tablo);

if($conn->connect_error)
{
    die("Bağlantı Hatası".$conn->connect_error);
}
session_abort();
?>
