<?php 
  session_start();
  include_once "./header.php";
  if($_SESSION["unique_id"]){
    header("location: ./dashboard.php");
}
?>
<body>
    <section class="wrapper">
        <div class="form signup">
         <div class="curved-line image">
            <div class="curved-line-content">
              <img src="./5907.jpg" alt="">
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave">
             <path fill="#fff" fill-opacity="1" d="M0,224L80,197.3C160,171,320,117,480,133.3C640,149,800,235,960,245.3C1120,256,1280,192,1360,160L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
            </svg>
         </div>
          <div class="notification-error">This the error field souke dalo sso shn</div>
          <div class="group1">
          <form action="">
             <div class="names-fields">
                <input required name="firstname" type="text" class="fname-input" placeholder="Firstname">
                 <input required name="lastname" type="text" class="lname-input" placeholder="Lastname">
              </div>
              <input required name="email" type="email" class="email-input" placeholder="Enter your email">
              <div class="password-field">
               <input required name="password" type="password" class="password-input" placeholder="Enter new password">
               <span class="material-symbols-outlined">visibility</span>
              </div>
              <input type="button" value="Submit" class="btn-input">
          </form>
            <p>Have you an account ? <a href="./login.php">Login here</a></p>
          </div>
        </div>
    </section>
  <script src="./JavaScript/pwd_show_hide.js"></script>
  <script src="./JavaScript/AJAX/signup.js"></script>
</body>
</html>