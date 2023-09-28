<?php
include '../partials/headers.php';
include '../auth/isLogin.php';
?>
<title>VG-FOOD-ORDERING</title>
</head>

<body onload="getData('<?php echo $_SESSION['username'];?>')">
    <?php include '../partials/sidebar.php'; ?>
    <section class="home-section">
        <?php include '../partials/navbar.php'; ?>
        <div class="home-container">
            <div class="heading" style="margin-top: 20px;margin-left: 20px; text-shadow: 0 2px 4px rgb(236, 236, 236);">
                Find the best foods
            </div>
            <div class="product-menu">
                <a href="#all" class="list-item active">
                    <div class="img">
                        <img src="../images/logo1.png" alt="">
                    </div>
                    <p>All</p>
                </a>
                <?php 
                    $sql1 = "SELECT category FROM categories";
                    $stmt1 = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt1, $sql1))
                    {
                        die('SQL error');
                    }
                    else
                    {
                        mysqli_stmt_execute($stmt1);
                        $result1 = mysqli_stmt_get_result($stmt1);
                        while ($row1 = mysqli_fetch_assoc($result1))
                        {
                            print( '<a href="#'.$row1['category'].'" class="list-item active">
                            <div class="img">
                                <img src="../images/logo1.png" alt="">
                            </div>
                            <p>'.$row1['category'].'</p>
                        </a>');
                        }
                    }
                ?>
            </div>
            <div class="product-container" id="all">
                <?php if ($rows > 0) { ?>
                <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <div class="card">
                    <img src="../uploads/<?php echo $data[
                        'image'
                    ]; ?>" alt="">
                    <div class="h-c">
                        <div class="head">
                            <?php echo $data[
                            'product_name'
                        ]; ?>
                        </div>
                    </div>
                    <div class="cal-pri">
                        <div class="cal" style="border-right: 1px solid white;">
                            <label>$
                                <?php echo $data['price']; ?>
                            </label>
                            <span>Price</span>
                        </div>
                        <div class="cal" style="border-right: 1px solid white;">
                            <label>
                                <?php echo $data['quantity']; ?>
                            </label>
                            <span>Quantity</span>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="addtoCart" onclick="addToCart(<?php echo $data['id']; ?> )"
                            style=" font-size:13px; font-weight:bold; color:#525252;">Add to Cart </button>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
            <?php 
            $sql2 = "SELECT category FROM categories";
            $stmt2 = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt2, $sql2))
            {die('SQL error');} else{mysqli_stmt_execute($stmt2);
                $result2 = mysqli_stmt_get_result($stmt2);
                while ($row2 = mysqli_fetch_assoc($result2)){echo $row2['category'];
                    // get products using category and display it
                    $mycat=$row2['category'];?>
                     <div class="product-container" id="<?php echo $mycat; ?>">
                    <?php
                    
                    $sql3 = "SELECT * FROM products WHERE category='$mycat'";
                    $stmt3 = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt3, $sql3))
                    {
                        die('SQL error');
                    } else
                    {
                        mysqli_stmt_execute($stmt3);
                        $result3 = mysqli_stmt_get_result($stmt3);
                        while ($row3 = mysqli_fetch_assoc($result3))
                        {?>
                                <div class="card">
                        <img src="../uploads/<?php echo $row3[
                            'image'
                        ]; ?>" alt="">
                        <div class="h-c">
                            <div class="head">
                                <?php echo $row3[
                                'product_name'
                            ]; ?>
                            </div>
                        </div>
                        <div class="cal-pri">
                            <div class="cal" style="border-right: 1px solid white;">
                                <label>$
                                    <?php echo $row3['price']; ?>
                                </label>
                                <span>Price</span>
                            </div>
                            <div class="cal" style="border-right: 1px solid white;">
                                <label>
                                    <?php echo $row3['quantity']; ?>
                                </label>
                                <span>Quantity</span>
                            </div>
                        </div>
                        <div class="buttons">
                            <button class="addtoCart" onclick="addToCart(<?php echo $row3['id']; ?> )"
                                style=" font-size:13px; font-weight:bold; color:#525252;">Add to Cart </button>
                            <button class="buyNow" onclick="buyNow(<?php echo $row3['id']; ?>)">Buy</button>
                        </div>
                    </div>
                    <?php }}?>
                    </div>
        <?php
    }}?>
        </div>
    </section>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="../js/productFilter.js"></script>
</body>

</html>