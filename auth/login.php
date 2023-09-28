<?php include 'server.php'; 
// if($_SESSION['admin'] == 'admin') {
//     header('location:/VG_Food_Ordering/admin/');
// }else{
    
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="icon" href="../images/applogo.webp">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <img src="../images/home.png" alt="" id="home-img">
    <div class="bg-cover"></div>
    <?php include '../partials/alerts.php'; ?> 
    <div class="btnbox back">
        <a class="backBtn" href="/VG_Food_Ordering/">
            <span class="btnText">back to home</span>
        </a>
    </div>
    <div class="reg-container">
        <form action="/VG_Food_Ordering/auth/login.php" method="post">
            <div class="logo-details">
                <i class='bx bxs-store'></i>
                <span class="logo_name">VG-FOOD-ORDERING</span>
                <span class="logo_name" style="font-size:14px; margin-top:-2px" >User Login</span>
            </div>
            <div class="inputbox">
                <input type="text" name="username" id="username" required>
                <span>Username</span>
            </div>
            <div class="inputbox">
                <input type="password" name="password" id="password" required>
                <span>Password</span>
            </div>
            <div class="btnbox">
                <a class="backBtn" href="/VG_Food_Ordering/auth/register.php">
                    <span class="btnText">Register</span>
                </a>
                <button class="submit" type="submit" name="login_user">
                    <span class="btnText">Login</span>
                </button>
            </div>
        </form>
    </div>
    <script src="../js/alerts.js"></script>
</body>
</html>



