<?php 
  session_start();
  include_once "./Backend/config.php";
  if(!$_SESSION["unique_id"]){
    header("location: ./login.php");
  }
  include_once "./header.php";
?>
<body>
    <section class="wrapper">
        <?php  include_once "./dashHeader.php" ?>
        <div class="uploads_field">
            <form action="#" enctype="multipart/form-data">
               <div class="container">
                  <div class="wrapper2">
                       <div class="image">
                         <img alt="">
                        </div>
                        <div class="content">
                          <div class="icon"><span class="material-symbols-outlined">cloud_upload</span></div>
                          <div class="text">No file chosen, click!</div>
                        </div>
                        <div id="cancel-btn"><span class="material-symbols-outlined">close</span></div>
                        <div id="file-name">File name here</div>
                  </div>
                  <input type="file" class="default-btn" name="image_resize" hidden>
                  <p class="error-notif">Error notification</p>
                  <p class="download_tag"><a href="./dashboard.php">Download on the dashboard</a></p>
                </div>
               <div class="witch_field_inputs">
                  <div class="select width">
                    <label for="width">Reduction</label>
                  <select name="percentage" id="percentage" required>
                    <option value="10">10%</option>
                    <option value="20">20%</option>
                    <option value="30">30%</option> 
                    <option value="40">40%</option>
                    <option value="50">50%</option>
                    <option value="60">60%</option>
                    <option value="70">70%</option>
                    <option value="80">80%</option>
                    <option value="90">90%</option>
                    <option value="100">100%</option>
                  </select>
                  </div>
               </div>
               <!-- <div>Indicator</div> -->
               <button>Resize</button>
            </form>
            <p>
            <a href="./dashboard.php"><span class="material-symbols-outlined">arrow_back</span></a>
             By Ken With 💝 
        </p>
        </div>
    </section>
    <script src="./JavaScript/show_hide_menu.js"></script>
    <script src="./JavaScript/uplaod_show_hide.js"></script>
    <script src="./JavaScript/AJAX/resize.js"></script>
</body>
</html>