<?php 
   $conn_bd = mysqli_connect("localhost","root",'kenedy','db_resize');
   const APP_URL = "http://localhost/RezApp";
   const SENDER_EMAIL = "gbessikenedy@gmail.com";
   if(!$conn_bd){
     echo "Database not connected".mysqli_connect_error();
   }
?>