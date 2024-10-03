<?php

$open_connect = 1;
require('connect.php');

if(isset($_POST['username_account']) && isset($_POST['email_account']) && isset($_POST['password_account1']) && isset($_POST['password_account2'])){
    $username_account = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['username_account']));
    $email_account = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['email_account']));
    $password_account1 = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['password_account1']));
    $password_account2 = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['password_account2']));

    if(empty($username_account)){
        die(header('Location: form-register.php')); // Fail username
    }elseif(empty($email_account)){
        die(header('Location: form-register.php')); // Fail email
    }elseif(empty($password_account1)){
        die(header('Location: form-register.php')); // Fail password
    }elseif(empty($password_account2)){
        die(header('Location: form-register.php')); // Fail verify password
    }elseif($password_account1 != $password_account2){
        die(header('Location: form-register.php')); // Password not match
    }else{
        $query_check_email_account = "SELECT email_Account FROM account WHERE email_account = '$email_account'";
        $call_back_query_check_email_account = mysqli_query($connect, $query_check_email_account);
        if(mysqli_num_rows($call_back_query_check_email_account) > 0){
            die(header('Location: form-register.php')); //Already have account
        }else{
            $length = random_int(97, 128);
            $salt_account = bin2hex(random_bytes($length));
            $password_account1 = $password_account1 . $salt_account;
            $algo = PASSWORD_ARGON2ID;
            $options = [
                'cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
                'time_cost' => PASSWORD_ARGON2_DEFAULT_TIME_COST,
                'threads' => PASSWORD_ARGON2_DEFAULT_THREADS 
            ];
            $password_account = password_hash($password_account1 , $algo , $options); // นำรหัสผ่านที่ต่อกับsaltแล้ว เข้ารหัสด้วยวิธี ARGON2ID
            $query_create_account = "INSERT INTO account VALUES ('', '$username_account', '$email_account', '$password_account', '$salt_account', 'member', 'default_images_account.jpg', '', '', '')";
            $call_back_create_account = mysqli_query($connect , $query_create_account);
            if($call_back_create_account){
                die(header('Location: form-login.php')); // Success create account
            }else{
                die(header('Location: form-register.php')); // Fail create account
            }
        }
    }

}else{
    die(header('Location: form-register.php')); // Dont have info
}
?>