<?php 
session_start();
include_once "./header.php";
if($_SESSION["unique_id"]){
    header("location: ./dashboard.php");
}

?>
<body>
    <section class="wrapper">
        <div class="form login">
          <img src="./5907.jpg" alt="">
          <div class="notification-error">This the error field</div>
          <form action="">
              <input name="email" type="email" class="email-input" placeholder="Enter your email">
              <div class="password-field">
               <input name="password" type="password" class="password-input" placeholder="Enter new password">
               <span class="material-symbols-outlined">visibility</span>
              </div>
              <input type="button" value="Submit" class="btn-input">
          </form>
          <p>Don't have an account ? <a href="./index.php">Register here</a></p>
        </div>
    </section>

    <script src="./JavaScript/pwd_show_hide.js"></script>
    <script src="./JavaScript/AJAX/login.js"></script>
</body>
</html>