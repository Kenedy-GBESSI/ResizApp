<?php
 session_start();
 include_once "./config.php";
 $email =  $_GET['email'];
 $token = $_GET['token'];
 if(!empty($email) && !empty($token)){
     $sql = mysqli_query($conn_bd,"SELECT unique_id,expiration < now() as expired FROM users WHERE email = '{$email}' AND status = 'inactif'");
     if(mysqli_num_rows($sql)){
        $user = mysqli_fetch_assoc($sql);
        if((int)$user['expired'] === 1){
            $sql1 = mysqli_query($conn_bd, "DELETE FROM users WHERE unique_id = {$user['unique_id']}");
            if($sql1){
                echo "The token expired! Try to signup !";
            }  
        }else{
            if(password_verify($token,$user['token'])){
                $_SESSION['unique_id'] = $user["unique_id"]; 
                echo "success";
            }
        }
     }
 }

?>