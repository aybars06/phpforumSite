<?php
require_once('config.php');
?>
<?php
if(isset($_GET['sayfa'])) {
    $sayfa_id = $_GET['sayfa'];
    mysqli_query($conn, "DELETE FROM sayfalar WHERE id = '$sayfa_id'");
    header("Location: sayfa_sil.php");
}

?>