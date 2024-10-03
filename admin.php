<?php

session_start();
$open_connect = 1;
require('connect.php');

if(!isset($_SESSION['id_account']) || $_SESSION['role_account'] != 'admin'){
    die(header('Location: form-login.php')); // If dont have SESSION id_account or role_account will send to login page
}elseif(isset($_GET['logout'])){ // If clicked logout button SESSION WILL DESTROY
    session_destroy();
    die(header('Location: form-login.php'));
}else{
    $id_account = $_SESSION['id_account'];
    $query_show = "SELECT * FROM account WHERE id_account = '$id_account' ";
    $call_back_show = mysqli_query($connect, $query_show);
    $result_show = mysqli_fetch_assoc($call_back_show);
    $directory = 'images_account/';
    $image_name = $directory.$result_show['image_account'];
    $clear_cache = '?' . filemtime($image_name);
    $image_account = $image_name . $clear_cache;

}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>
<body data-bs-theme="dark">
    <center>
    <!-- <?php echo $result_show['image_account'] ?> -->
    <img src="<?php echo "$image_account" ?>">
    <h1>Welcome <?php echo $result_show['username_account'] ?> Role : <?php echo $result_show['role_account'] ?></h1>
    <a href="index.php?logout=1">Logout</a>
    </center>
</body>
</html>