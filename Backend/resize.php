<?php
  session_start();
  include_once "./config.php";
  $reduction = mysqli_real_escape_string($conn_bd,$_POST['percentage']);
  if(isset($_FILES['image_resize'])){
        $filename = $_FILES['image_resize']['name'];
        $typefile = $_FILES['image_resize']['type'];
        $tmp_name = $_FILES['image_resize']['tmp_name'];
  
        // extensions requises
        $extension = end(explode('.',$filename));
        $extensions = ["jpeg","jpg"];
        if(in_array($extension,$extensions) == true){
           list($w,$h) = getimagesize($tmp_name);
           // Resize the dimensions of image;
           $resize = ((float)$reduction)/100;
           $rwidth = ceil($w * $resize);
           $rheight = ceil($h * $resize);
           $new_name = time().$filename;
           $image =  imagecreatetruecolor($rwidth,$rheight);
           $newImage = imagecreatefromjpeg($tmp_name);
           imagecopyresampled($image,$newImage,0,0,0,0,$rwidth,$rheight,$w,$h);
           imagejpeg($image,"./images/".$new_name);       
           if($_SESSION['unique_id']){
            $sql = mysqli_query($conn_bd,"INSERT INTO images (img_url,img_user_id) VALUES('{$new_name}',{$_SESSION['unique_id']})");
            if($sql){
              echo "success";
            }else{
              echo "Something went wrong"; 
            } 
           }
           
        }else{
          echo "Please select an Image file(jpeg,jpg)";
        }
      }else{
      echo "Please choose an image";
  }

?>