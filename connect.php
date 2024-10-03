<?php

if($open_connect != 1){
    die(header('Location: form-login.php'));
}

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'programming';
$port = NULL;
$socket = NULL;
$connect = mysqli_connect($hostname, $username , $password , $database);

if(!$connect){
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว : " .mysqli_connect_error($connect));
}else{
    mysqli_set_charset($connect, 'utf8');
    $limit_login_account = 3; // Amount of wrong password
    $time_ban_account = 1; // Amount of time ban account
    $query_reset_ban_account = "UPDATE account SET lock_account = 0, login_count_account = 0 WHERE ban_account <= NOW() AND login_count_account >= $limit_login_account";
    $call_back_reset_ban_account = mysqli_query($connect, $query_reset_ban_account);
}

?>