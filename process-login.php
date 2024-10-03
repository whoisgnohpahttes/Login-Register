<?php
session_start();
$open_connect = 1;
require('connect.php');

if(isset($_POST['email_account']) && isset($_POST['password_account'])){
    $email_account = htmlspecialchars(mysqli_real_escape_string($connect,$_POST['email_account']));
    $password_account = htmlspecialchars(mysqli_real_escape_string($connect,$_POST['password_account']));
    $query_check_account = "SELECT * FROM account WHERE email_account = '$email_account'";
    $call_back_check_account = mysqli_query($connect, $query_check_account);
    if(mysqli_num_rows($call_back_check_account) == 1){
       $result_check_account = mysqli_fetch_assoc($call_back_check_account);
       $hash = $result_check_account['password_account'];
       $password_account = $password_account . $result_check_account['salt_account'];
       $count = $result_check_account['login_count_account'];
       $ban = $result_check_account['ban_account'];

        if($result_check_account['lock_account'] == 1){
            echo "<h1>To many wrong password : $count times</h1>";
            echo "<h3>This account has been locked : $time_ban_account minute </h3>";
            echo "<h3>$ban</h3>";
            echo '<a href="form-login.php">Sign in</a>';
        }elseif(password_verify($password_account, $hash)){
            $query_reset_login_count_account = "UPDATE account SET login_count_account = 0 WHERE email_account = '$email_account'";
            $call_back_reset = mysqli_query($connect, $query_reset_login_count_account);
            if($result_check_account['role_account'] == 'member'){ // Role member
                $_SESSION['id_account'] = $result_check_account['id_account'];
                $_SESSION['role_account'] = $result_check_account['role_account'];
                die(header('Location: index.php'));
            }elseif($result_check_account['role_account'] == 'admin'){ // Role admin
                $_SESSION['id_account'] = $result_check_account['id_account'];
                $_SESSION['role_account'] = $result_check_account['role_account'];
                die(header('Location: admin.php'));
            }
       }else{
        $query_login_count_account = "UPDATE account SET login_count_account = login_count_account + 1 WHERE email_account = '$email_account'";
        $call_back_login_count_account = mysqli_query($connect, $query_login_count_account);
        if($result_check_account['login_count_account'] + 1 >= $limit_login_account){
            $query_lock_account = "UPDATE account SET lock_account = 1, ban_account = DATE_ADD(NOW(), INTERVAL $time_ban_account MINUTE) WHERE email_account = '$email_account'";
            $call_back_lock_account = mysqli_query($connect, $query_lock_account);
        }
        die(header('Location: form-login.php')); // Wrong password
       }


    }else{
       die(header('Location: form-login.php')); // Dont have this email on data
    }

}else{
    die(header('Location: form-login.php')); // กรุณากรอกข้อมูล
}
?>