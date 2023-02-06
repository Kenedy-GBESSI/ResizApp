<?php
  session_start();
  include_once "./config.php";
  $password = mysqli_real_escape_string($conn_bd,$_POST['password']);
  $email = mysqli_real_escape_string($conn_bd,$_POST['email']);
  if(!empty($password) && !empty($email)){
    $sql = mysqli_query($conn_bd,"SELECT * FROM users WHERE email = '{$email}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        if(password_verify($password,$row['password'])){
          $_SESSION['unique_id'] = $row['unique_id'];
          echo "success";
        }else{
            echo "Password incorrect!";
        }
    }else{
        echo "Something went wrong!";
    }
  }else{
    echo "All fields are required!";
  }

?>