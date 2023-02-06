<?php
 session_start();
 include_once "./config.php";
 $filename = mysqli_real_escape_string($conn_bd,$_GET['filename']);
 if(!empty($filename)){
    $url = APP_URL."/Backend/images/".$filename;
    $basename = basename($url);
    header('Content-Disposition: attachment; filename=' . $basename);
    if(readfile($url)){
        echo "Hi";
    };

    // if (file_put_contents($basename, file_get_contents($url)))
    // {
    //     echo "File downloaded successfully";
    // }
    // else{
    //     echo "Error";
    // }
 }
?>