<?php include '../partials/headers.php';
include '../auth/isLogin.php';
$totalAmout = 0;
$username = $_SESSION['username'];
$ids=[];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="../css/home.css">
<title>VG-FOOD-ORDERING</title>
</head>

<body onload="getData('<?php echo $_SESSION['username']; ?>')">
    <?php include '../partials/sidebar.php'; ?>
    <section class="home-section order">
        <?php include '../partials/navbar.php'; ?>
        <div class="home-order-container">
            <!-- <form action="" class="home-order-container" id="myOrder"> -->
                <div class="order-form">
                    <div class="head">Delivery Information</div>
                    <div class="person-deatils">
                        <div class="inputBox">
                            <label for="username">Name</label>
                            <input type="text" name="username" id="username" placeholder="Your name"  required>
                        </div>
                        <div class="inputBox">
                            <label for="mo-no">Mobile Number</label>
                            <input type="number" name="mo-no" id="mo_no" placeholder="+91 988131xxxx" >
                        </div>
                        <div class="inputBox">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="example@gmail.com" >
                        </div>
                        <div class="inputBox">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" placeholder="solapur" >
                        </div>
                        <div class="inputBox">
                            <label for="zip">Zip</label>
                            <input type="number" name="zip" id="zip" placeholder="413006" >
                        </div>
                        <div class="inputBox">
                            <label for="state">Zip</label>
                            <select name="state" id="state">
                                <option value="none" selected>Select Tehsils</option>
                                <option value="South Solapur">North Solapur</option>
                                <option value="South Solapur">South Solapur</option>
                                <option value="Barshi">Barshi</option>
                                <option value="Akkalkot">Akkalkot</option>
                                <option value="Pandharpur">Pandharpur</option>
                                <option value="Mangalwedha">Mangalwedha</option>
                                <option value="Sangolo">Sangolo</option>
                                <option value="Marshras">Marshras</option>
                                <option value="Mohol">Mohol</option>
                                <option value="Karmala">Karmala</option>
                            </select>
                            <!-- <input type="number" name="zip" id="zip" placeholder="413006" required> -->
                        </div>
                        <div class="inputBox" style="width: 100%;">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" placeholder="Address" >
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="head">Payment Method</div>
                        <!-- <div class="radioBox">
                            <label class="form-control">
                                <input type="radio" name="payment"  value="Online Payment"  />
                                Online Payment
                            </label>
                        </div> -->
                        <div class="radioBox">
                            <label class="form-control">
                                <input type="radio" name="payment" value="Cash on Delivery" checked />
                                Cash on Delivery
                            </label>
                        </div>
                        <!-- <div class="radioBox">
                            <label class="form-control">
                                <input type="radio" name="payment" value="POS on Delivery" />
                                POS on Delivery
                            </label>
                        </div> -->
                    </div>
                </div>
                <div class="cart-container">
                    <div class="head">Order Summary</div>
                    <?php
                    $user = $_SESSION['username'];
                    $sql = "SELECT * FROM registration WHERE username = '$user'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // Output data of the row
                        $row = mysqli_fetch_assoc($result);
                        $string = $row['cart'];
                        $cartArray = explode("~",$string);
                        for ($i = 0; $i < count($cartArray); $i++) {
                            $sql = "SELECT * FROM products WHERE id = '$cartArray[$i]'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result); 
                                array_push($ids,$row['id'])
                                ?>
                                    <div class="card">
                                    <div class="img"><img src="../uploads/<?php echo $row['image']; ?>" alt=""></div>
                                    <div class="info">
                                        <p class="head"><?php echo $row['product_name']; ?></p>
                                        <p class="price">Price : <?php echo $row['price']; $totalAmout+= $row['price']; ?> </p>
                                    </div>
                                    <!-- <div class="quan-con">
                                        <div class="div">
                                            <p class="btn" id="">-</p>
                                            <p> 1 </p>
                                            <p class="btn">+</p>
                                        </div>
                                    </div> -->
                                    </div>
                               <?php
                            }
                        }
                    } else {
                        echo '0 results';
                    }
                    ?>
                    
                    <div class="button-con">
                        <div class="total-con">
                            <p class="price">Total Amount</p>
                            <p class="head" style="font-size: 14px;">$ <?php echo $totalAmout ?></p>
                        </div>
                        <?php $newIds = implode(" ", $ids); ?>
                        <button type="submit" onclick="orderNow('<?php echo $newIds; ?>','<?php echo $totalAmout; ?>')"> Order Now</button>
                    </div>
                </div>
            <!-- </form>  -->
            <div class="order_success " id="order_success">
                <div class="img"><img src="../images/success.png" alt=""></div>
                <div class="success_info">
                    <div class="head">Order Place Successfull</div>
                </div>
                <div class="button-close" onclick="alertBox()">Continue</div>
            </div>
        </div>
    </section>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/productFilter.js"></script>
</body>

</html>