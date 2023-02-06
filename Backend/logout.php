<?php
session_start();
if($_SESSION['unique_id']){
    session_unset();
    session_destroy();
    echo "success";
}else{
    header("location: dashboard.php");
}

?>