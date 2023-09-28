<?php
include_once '../partials/headers.php';
include_once '../auth/isAdmin.php';
$query = 'SELECT * FROM `orders`';
$result1 = mysqli_query($conn, $query);
$orders = mysqli_num_rows($result1);
?>
<title>VG-FOOD-ORDERING</title>
</head>
<body onload="getData('<?php echo $_SESSION['admin'];?>')">
    <?php include '../partials/adminSidebar.php'; ?>
    <section class="home-section admin" id="admin">
        <?php include '../partials/adminNavbar.php'; ?>
        <div class="home-container admin">
            <div class="heading" style="margin-top: 20px;margin-left: 20px; text-shadow: 0 2px 4px rgb(236, 236, 236);">
                Find the best food
            </div>
            <div class="product-menu admin">
                <div class="statistics box1">
                    <p class="count"><?php echo $orders?></p>
                    <p class="name">New</p>
                </div>
                <div class="statistics box2">
                    <p class="count" id="totalOrders" ><?php echo $orders?></p>
                    <p class="name">Total Orders</p>
                </div>
                <div class="statistics box3">
                    <p class="count" id="totalIncome" >0</p>
                    <p class="name">Total In-Come</p>
                </div>
                <div class="statistics box4">
                    <p class="count" id="completed_o">0</p>
                    <p class="name">Out Of Delivery</p>
                </div>
                <div class="statistics box5">
                    <p class="count" id="pending_o">0</p>
                    <p class="name">Pending Orders</p>
                </div>
            </div>
            <div class="product-container admin" id="admin-producs">
                <div class="heading" style="text-shadow: 0 2px 4px rgb(236, 236, 236); margin: 5px 0;">
                    New Orders
                </div>
                <div id="new-products">
                <?php if ($orders > 0) { ?>
                <?php while ($data = mysqli_fetch_assoc($result1)) { 
                    if($data['status']=='completed'){
                        continue;
                    }
                    ?>
                    <div class="new_product_box">
                        <div class="userInfo">
                            <div class="img">
                                <img src="../images/logo1.png" alt="">
                            </div>
                            <div class="info">
                                <p class="head"><?php echo $data['username']; ?></p>
                                <p class="about">User of VG food ordering</p>
                            </div>
                        </div>
                        <div class="productInfo">
                            <?php $productArr =  explode(" ",$data['products']); ?>
                            <?php foreach($productArr as $product) {?>
                                <?php 
                                    // get product data using id
                                $query = "SELECT * FROM `products` WHERE id = '$product'";
                                $result01 = mysqli_query($conn, $query);
                                $productData = mysqli_num_rows($result);
                                if($productData>0){
                                    while($row01 = mysqli_fetch_assoc($result01)){?>
                                        <div class="p-info">
                                            <p class="p-name head"><?php echo $row01['product_name']?></p>
                                            <p class="p-price about">$<?php echo $row01['price']?></p>
                                        </div>
                            <?php }}} ?>
                           
                        </div>
                        <div class="actions">
                            <p class="p-name head">Total</p>
                            <p class="p-price about">$<?php echo $data['amount']; ?></p>
                            <i class='bx bx-check-double' id="readBtn" onclick="completeOrder('<?php echo $data['id']; ?>')"></i>
                        </div>
                    </div>
                <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="../js/alerts.js"></script>
    <script src="../js/admin.js"></script>
</body>
</html>