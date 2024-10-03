<?php

session_start();
$open_connect = 1;
require('connect.php');

if(!isset($_SESSION['id_account']) || !isset($_SESSION['role_account'])){
    die(header('Location: form-login.php')); // If dont have SESSION id_account or role_account will send to login page
}elseif(isset($_GET['logout'])){ // If clicked logout button SESSION WILL DESTROY
    session_destroy();
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEMBER</title>
</head>
<body>
    <h1>MEMBER</h1>
    <a href="index.php?logout=1">Logout</a>
</body>
</html>