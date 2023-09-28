<div class="navbar">
    <a href="/vG_Food_Ordering/user/">
        <div class="heading">VG-FOOD-ORDERING</div>
    </a>
    <div class="inputBox">
        <input type="text" placeholder="search here">
    </div>
    <?php if (isset($_SESSION['username'])): ?>
    	<div class="profile">
        <img src="../images/logo1.png" alt="">
        <?php echo $_SESSION['username']; ?>
    </div>
    <?php endif; ?>
</div>