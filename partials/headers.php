<?php 
include_once '../auth/server.php';
?>
<?php
$sql = 'SELECT * FROM `products`';
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" href="../images/applogo.webp">