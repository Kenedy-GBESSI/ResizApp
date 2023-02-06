<?php
  session_start();
  include_once "./Backend/config.php";
  include_once "./header.php";
  if(!$_SESSION['unique_id']){
    header("location: ./login.php");
  }
  
?>
<body>
<section class="wrapper">
        <?php include_once "./dashHeader.php" ?>
         <div class="dashboard-main">
              <div><p class="title">Historical of all resized images</p></div>
               <?php 
                 $content = "";
                 $req = mysqli_query($conn_bd,"SELECT * FROM images WHERE img_user_id = {$_SESSION['unique_id']}");
                 if(mysqli_num_rows($req) > 0){
                   while($row = mysqli_fetch_assoc($req)){
                       $content .= '
                       <div class="historique-item">
                           <img src="./Backend/images/'.$row["img_url"].'" alt="">
                           <span class="material-symbols-outlined">more_vert</span>
                           <div class="actions">
                           <a href="./Backend/download.php?filename='.$row["img_url"].'"><li><span class="material-symbols-outlined">download</span></li></a>
                           <a href="./Backend/delete.php?id='.$row['img_id'].'"><li><span class="material-symbols-outlined">delete</span></li></a>
                           </div>
                         </div>
                       ';
                   }
                 }else{
                  $content .="<p style='text-align:center'>We have nothing !</p>";
                 }
                 echo $content
               ?>
         </div>
         <p>
          By Ken With 💝 
          <span class="logout">Logout</span>
        </p> 
        </div>
    </section>
    <script src="./JavaScript/show_hide_menu.js"></script>
    <script src="./JavaScript/show_hide_actions.js"></script>
    <script src="./JavaScript/AJAX/logout.js"></script>
</body>