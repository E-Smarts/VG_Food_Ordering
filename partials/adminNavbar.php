<div class="navbar">
    <a href="/vG_Food_Ordering/admin/">
        <div class="heading">VG-FOOD-ORDERING</div>
    </a>
    <div class="inputBox">
        <input type="text" placeholder="search here">
    </div>
    <?php if (isset($_SESSION['admin'])): ?>
    	<div class="profile">
        <img src="../images/logo1.png" alt="">
        <?php echo $_SESSION['admin']; ?>
    </div>
    <?php endif; ?>
    <?php include_once 'alerts.php' ?>
</div>
