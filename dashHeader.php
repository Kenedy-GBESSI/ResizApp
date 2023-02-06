
<div class="dashboard">
<div class="header">
            <?php
              include_once "./Backend/config.php";
              $requestSql = mysqli_query($conn_bd,"SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
              if(mysqli_num_rows($requestSql) > 0){
                $row =  mysqli_fetch_assoc($requestSql);
                $user_name = strtoupper($row["firstname"][0]).strtoupper($row["lastname"][0]);
              }
             ?> 
            <button class="btn-rounded"><?php echo $user_name  ?></button>
            <div class="menu">
                <a href="./dashboard.php">Hist</a>
                <a href="./resize.php">Resize</a>
            </div>
            <span class="material-symbols-outlined">menu</span>
</div>