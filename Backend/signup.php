<?php
   session_start();
   include_once "./config.php";
   function sendEmail($token,$email,$firstname){
       $link = APP_URL."/Backend/activation.php?email=$email&token=$token";
       $subject = "Confirmation of email";
       $message = "
       <html>
       <head>
       <title>{$subject}</title>
       </head>
       <body>
       <p><strong>Dear {$firstname}</strong></p>
       <p>Thanks you to register! Verify your email to access our website. Click below link to verify</p>
       <p><a href='{$link}'>Verify email</a></>
       </body>
       </html>
       ";
       // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

       // More headers
      $headers .= "From:". SENDER_EMAIL;
      if(mail($email,$subject,$message,$headers)){
         return true;
      }
      return false;
}
   $firstname =mysqli_real_escape_string($conn_bd,$_POST['firstname']);
   $lastname =mysqli_real_escape_string($conn_bd,$_POST['lastname']) ;
   $password =mysqli_real_escape_string( $conn_bd,$_POST['password']);
   $email = mysqli_real_escape_string($conn_bd,$_POST["email"]);
   if(!empty($firstname) && !empty($lastname) && !empty($password) && !empty($email)){
       if(filter_var($email,FILTER_VALIDATE_EMAIL)){
          $sql = mysqli_query($conn_bd, "SELECT email FROM users WHERE email = '{$email}'");
          if(mysqli_num_rows($sql) > 0){
            echo "Email already exists";
          }else{
             if(strlen($password) < 6){
                echo "6 length min of password";
             }else{
               // To be inserted
     
                $random_id = rand(time(),10000000);
                $password_hash = password_hash($password,PASSWORD_DEFAULT);
                $token = password_hash(bin2hex(random_bytes(10)),PASSWORD_DEFAULT);
                $expiry_date = date('Y-m-d H:i:s',time() + (1 * 24 * 60 * 60));
                $status = "inactif";

                //Insert
                 $sql2 = mysqli_query($conn_bd, "INSERT INTO users (unique_id,firstname,lastname,email,password,token,expiration,status) VALUES ({$random_id}, '{$firstname}', '{$lastname}', '{$email}','{$password_hash}','{$token}','{$expiry_date}','{$status}')");
                //Verification
                 if($sql2){
                  $sql3 = mysqli_query($conn_bd, "SELECT * FROM users WHERE email = '{$email}'");
                  
                  // This is without email verification
                  if(mysqli_num_rows($sql3) > 0 ){
                    $row = mysqli_fetch_assoc($sql3);
                    $_SESSION['unique_id'] = $row["unique_id"]; 
                     echo "success";
                 }
                //  if(sendEmail($token,$email,$firstname)){
                //    echo "success";
                //  }else{
                //    echo "Retry it! Something went wrong!";
                //  }

                 }else{
                   echo "Something went wrong";
                 }
           }
          } 
       }else{
         echo "Email not valided!";
       }
   }else{
     echo "All fields inputs are required!";
   }
?>