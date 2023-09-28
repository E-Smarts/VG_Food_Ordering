<?php
include '../partials/headers.php';
include '../auth/isAdmin.php';
?>
<title>VG-FOOD-ORDERING</title>
</head>
<body onload="getData('<?php echo $_SESSION['username']; ?>')">
    <?php include '../partials/adminSidebar.php'; ?>
    <section class="home-section admin" id="admin">
        <?php include '../partials/adminNavbar.php'; ?>
        <div class="home-container admin">
            <div class="heading" style="margin-top: 20px;margin-left: 20px; text-shadow: 0 2px 4px rgb(236, 236, 236);">
                Add new product
            </div>
            <div class="add_product">
                <!-- add new product form  -->
                <form action="" id="add-new-product" method="POST" enctype="multipart/form-data">
                    <i class='bx bxs-store'></i>
                    <div class="head">Add New Product</div>
                    <div class="input-field">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" id="product_name" placeholder="Product Name" required>
                    </div>
                    <div class="input-field">
                        <label for="product_price">Product Price</label>
                        <input type="text" name="product_price" id="product_price" placeholder="Product Price" required>
                    </div>
                    <div class="input-field">
                        <label for="product_cat">Quantity</label>
                        <select name="product_cat" id="product_cat" onchange="addNewCategory(value)" required>
                            <option value="none" disabled selected>Select Category</option>
                            <?php 
                            // get all categories from database
                            $sql = "SELECT category FROM categories";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql))
                            {
                                die('SQL error');
                            }
                            else
                            {
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<option >$row[category]</option>";
                                }
                            }
                            ?>
                            <option value="add">Add Category</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="product_quantity">Quantity</label>
                        <input type="text" name="product_quantity" id="product_quantity" placeholder="Quantity"
                            required>
                    </div>
                    <div class="input-field">
                        <label for="product_img">Cost</label>
                        <input type="file" name="product_img" id="product_img" required>
                    </div>
                    <div class="input-field">
                        <button class="submit" type="submit" name="add_product" id="add_product">Add Product</button>
                    </div>
                </form>
            </div>
            <div class="add_menu_con" id="add_menu_con">
                <div class="input-field">
                    <input type="text" name="add_new_menu" id="add_new_menu" placeholder="Add Category">
                    <button id="addMenu" onclick="addCategory()"> Add Category</button>
                </div>
                <i class='bx bx-x' onclick="closeCatCon()"></i>
            </div>
        </div>
    </section>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/alerts.js"></script>
    <script src="../js/addMenu.js"></script>
    <script>
        function getData(user) {
            myuser = user;
            console.log(myuser)
        }
    </script>
</body>
</html>