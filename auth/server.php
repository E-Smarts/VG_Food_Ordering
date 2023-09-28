<?php
error_reporting(0);
session_start();
$username = '';
$errors = [];
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'sample');

if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);

    if (empty($username)) {
        array_push($errors, 'Username is required');
    }
    if (empty($password)) {
        array_push($errors, 'Password is required');
    }
    $user_check_query = "SELECT * FROM registration WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, 'Username already exists');
        }
    }

    if (count($errors) == 0) {
        $sql = "INSERT INTO `registration` (`username`, `password`, `phone`, `address`,`pincode`) VALUES ('$username', '$password', '$phone', '$address','$pincode')";
        mysqli_query($conn, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = 'login_ok';
        header('location:/VG_Food_Ordering/user/');
    }
}

// User Login
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, 'Username is required');
    }
    if (empty($password)) {
        array_push($errors, 'Password is required');
    }

    if (count($errors) == 0) {
        if (($username == 'admin') & ($password == 'admin')) {
            $_SESSION['admin'] = $username;
            $_SESSION['success'] = 'login_ok';
            header('location:/VG_Food_Ordering/admin/');
        } else {
            $query = "SELECT * FROM `registration` WHERE `username`='$username' AND `password`='$password';";
            $result = mysqli_query($conn, $query);
            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = 'login_ok';
                header('location:/VG_Food_Ordering/user/');
            } else {
                array_push(
                    $errors,
                    'Wrong username/password combination ' . $password
                );
            }
        }
    }
}

//  On load total amount sending
if (
    !empty($_POST) &&
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['name']) &&
    $_POST['name'] === 'getAmount'
) {
    // echo "response accepted";
    $income = 0;
    $completed = 0;
    $pending = 0;
    $query = 'SELECT * FROM `orders`';
    $result1 = mysqli_query($conn, $query);
    $orders = mysqli_num_rows($result1);
    if ($orders > 0) {
        while ($order = mysqli_fetch_assoc($result1)) {
            $income += $order['amount'];
            if ($order['status'] == 'completed') {
                $completed += 1;
            } elseif ($order['status'] == 'pending') {
                $pending += 1;
            }
        }
        echo "$income" . '~' . $completed . '~' . $pending;
    }
}

if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_cat = $_POST['product_cat'];
    $product_quantity = $_POST['product_quantity'];

    if (isset($_FILES['product_img'])) {
        $date = new DateTime('now');
        $results = $date->format('YmdHis');
        $file_name = $_FILES['product_img']['name'];
        $file_size = $_FILES['product_img']['size'];
        $file_tmp = $_FILES['product_img']['tmp_name'];
        $file_type = $_FILES['product_img']['type'];
        $file_ext = strtolower(
            end(explode('.', $_FILES['product_img']['name']))
        );
        $expensions = ['jpeg', 'jpg', 'png'];
        if (in_array($file_ext, $expensions) === false) {
            $errors1[] =
                'extension not allowed, please choose a JPEG or PNG file.';
            // array_push($errors, 'extension not allowed, please choose a JPEG or PNG file.');
        }
        if ($file_size > 2097152) {
            $errors1[] = 'File size must be excately 2 MB';
        }
        if (empty($errors1) == true) {
            $newFileName = $results . '.' . $file_ext;
            // move_uploaded_file( $file_tmp,'../uploads/' . $newFileName);

            if (move_uploaded_file($file_tmp, '../uploads/' . $newFileName)) {
                // insert new product in database
                $query = "INSERT INTO `products` (`product_name`, `price`, `category`, `quantity`,`image`) VALUES ('$product_name', '$product_price', '$product_cat', '$product_quantity','$newFileName')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    array_push($errors, 'success');
                    // echo "success";
                } else {
                    array_push($errors, 'error');
                }
            } else {
                array_push($errors, 'Error In Uploading Image');
            }
        } else {
            array_push($errors, 'Unknown error occurs');
        }
    }
}

if (
    !empty($_POST) &&
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['name']) &&
    $_POST['name'] === 'AddNewCategory'
) {
    $newcategory = $_POST['category'];
    // check given category exist in database
    $query = 'SELECT * FROM `categories`';
    $result1 = mysqli_query($conn, $query);
    $categories = mysqli_num_rows($result1);
    $flag=true;
    if ($categories > 0) {
        while ($category = mysqli_fetch_assoc($result1)) {
            if ($category['category'] == $newcategory) {
                echo "error";
                $flag=false;
                break;
            }
        }
    }
    if ($flag == true) {
        $query = "INSERT INTO `categories` (`category`) VALUES ('$newcategory')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
}

// complete order

if (
    !empty($_POST) &&
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['name']) &&
    $_POST['name'] === 'completeOrder'
) {
    $id = $_POST['o_id'];
    $query = "UPDATE `orders` SET `status`='completed' WHERE `id`='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}




if (isset($_GET['logout'])) {
    if ($params['a' == 'admin']) {
        session_start();
        unset($_SESSION['admin']);
        unset($_SESSION['success']);
        header('location:/VG_Food_Ordering/auth/login.php');
    } else {
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['success']);
        header('location:/VG_Food_Ordering/auth/login.php');
    }
}
?>
