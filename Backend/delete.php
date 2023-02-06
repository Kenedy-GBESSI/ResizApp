<?php
 session_start();
 include_once "./config.php";
 $id = mysqli_real_escape_string($conn_bd,$_GET['id']);
 if(!empty($id)){
    $sqlR = mysqli_query($conn_bd, "DELETE FROM images WHERE img_id = {$id}");
    if($sqlR){
        header("location: http://localhost/RezApp/dashboard.php");
    }
 }

?>