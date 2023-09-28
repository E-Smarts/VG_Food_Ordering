<?php include 'server.php'; ?>
<?php
$msg = '';
if (
    !empty($_POST) &&
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['name']) &&
    $_POST['name'] === 'AddToCart'
) {
    $productId = $_POST['product'];
    $user = $_POST['myuser'];
    // Step 1 : get previous array
    $sql = "SELECT * FROM registration WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Output data of the row
        $row = mysqli_fetch_assoc($result);
        $string = $row['cart'];
        $cartArray = explode('~', $string);
        http_response_code(200);
        // echo "Cart ".$string;
        if ($string == '') {
            $sql1 = "update registration set cart='$productId' where username='$user'";
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                http_response_code(200);
                echo 'success';
            } else {
                echo 'Error For Addiing Cart';
            }
        } else {
            if (!in_array($productId, $cartArray)) {
                $newstring = '' . $string . '~' . $productId;
                $sql1 = "update registration set cart='$newstring' where username='$user'";
                $result1 = mysqli_query($conn, $sql1);
                if ($result1) {
                    http_response_code(200);
                    echo 'success';
                } else {
                    echo 'Error For Addiing Cart';
                }
            } else {
                echo 'error';
            }
        }
    } else {
        echo '0 results';
    }
}
//  On load data sending
if (
    !empty($_POST) &&
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['name']) &&
    $_POST['name'] === 'getCartCount'
) {
    $user = $_POST['myuser']; // Retrieve the row with the specific user
    $sql = "SELECT * FROM registration WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Output data of the row
        $row = mysqli_fetch_assoc($result);
        if ($row['cart'] == '') {
            echo '0';
        } else {
            $str = $row['cart'];
            $array = explode('~', $str);
            echo count($array);
        }
    } else {
        echo '0';
    }
}
// Order Product
if (
    !empty($_POST) &&
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['name']) &&
    $_POST['name'] === 'order_product'
) {
    $myuser = $_POST['myuser'];
    $formData = $_POST['formData'];
    $username = $formData['username'];
    $mo_no = $formData['mo_no'];
    $email = $formData['email'];
    $city = $formData['city'];
    $zip = $formData['zip'];
    $state = $formData['state'];
    $address = $formData['address'];
    $product_ids = $formData['product_ids'];
    $payment = $formData['payment'];
    $amount = $formData['amount'];
    $sql = "INSERT INTO `orders` (`user`,`username`, `products`,`phone`,`email`,`city`,`zip`,`state`,`address`,`payment`,`amount`,`status`) VALUES ('$myuser','$username', '$product_ids','$mo_no','$email','$city','$zip','$state','$address','$payment','$amount','pending')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql = "SELECT * FROM orders WHERE user = '$myuser'";
        $result1 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result1) > 0) {
            // Output data of the row
            $row = mysqli_fetch_assoc($result1);
            $string = $row['id'];
            $sql2 = "update registration set myorder='$string' where username ='$myuser'";
            $sql0 = "update registration set cart='' where username='$myuser'";
            $result0 = mysqli_query($conn, $sql0);
            $result2 = mysqli_query($conn, $sql2);
            if ($result2 and $result0) {
                http_response_code(200);
                echo 'success';
            } else {
                echo 'Error For Addiing Cart';
            }
        } else {
            echo '0 results';
        }
    } else {
        echo 'Error' . mysqli_error($conn);
    }
}
// Adding New Category
if (
    !empty($_POST) &&
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['name']) &&
    $_POST['name'] === 'add_category'
) {
    // $myuser = $_POST['myuser'];
    $formData1 = $_POST['formData1']; // check given category exist in database
    $sql = "SELECT * FROM `categories` WHERE category='$formData1'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo 'Category already exists'.$formData1;
    } else {
        // insert new category into mysql database using php
        $sql = "INSERT INTO `categories` (`category`) VALUES ('$formData1')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'success';
        } else {
            echo 'Error';
        }
    }
}
 ?>
