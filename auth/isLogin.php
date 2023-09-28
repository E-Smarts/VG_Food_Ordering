<?php

if($_SESSION['username'] == null) {
    header('location:/VG_Food_Ordering/auth/login.php');
}
?>
