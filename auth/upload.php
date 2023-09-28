<?php

if (
    !empty($_POST) &&
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['name']) &&
    $_POST['name'] === 'add_product'
) {
    echo "Request Accepted";
    // $src = $_FILES['image']['tmp_name'];
    // $filename = $_FILES['image']['name'];
    // $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
    // $date = new DateTime('now');
    // $results = $date->format('YmdHis');
    // $output_dir = '../uploads/' . $results . '.' . $file_ext;
    // if (move_uploaded_file($src, $output_dir)) {
    //     echo 'Success! Image uploaded! File: ' . $output_dir;
    // } else {
    //     echo 'Error! Image upload failed! File: ' . $filename;
    // }
}
?>
