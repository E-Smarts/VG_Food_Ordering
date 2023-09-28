<?php
if($_SESSION['admin'] == null) {
    header('location:/VG_Food_Ordering/auth/login.php');
}
?>
