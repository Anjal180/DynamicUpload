<?php
session_start();
include 'connection.php';
include 'header.php';
?>
<?php

  if(isset($_POST['submit'])){
      $uname=mysqli_real_escape_string($conn,$_POST['uname']);
      $opass=password_hash($_POST['opwd'],PASSWORD_DEFAULT);
    //    ------ username and encrypted format display----
    //   echo $uname."<br>".$opass;
    //   -------------------------------------------

    //   -------inserting values login into db, password is encrypted---------
      $q1="INSERT INTO login_mst(uname,pwd) VALUES('$uname','$opass')";
      $run_qry=mysqli_query($conn,$q1);
      if($run_qry){
        echo "New Password Enter Success";
      }
    //   -------------------------------------------------------------------- 
    }
?>

<style>
  .error{
    color: red;font-style: italic; font-weight: bold;
  }
  body {
    background: linear-gradient(rgb(56, 89, 151,0.9),rgba(0, 0, 0))no-repeat center;
    background-size: cover;
    font-family: sans-serif;
  }
</style>
<div class="login-wrapper">
    <form method="post" class="form" id="form">
      <img src="img/av2.png" alt="">
      <h2>Register New Admin</h2>
      <div class="input-group">
        <input type="email" name="uname" id="email" required>
        <label for="loginUser">Email</label>
      </div>
      <div class="input-group">
        <input type="password" name="opwd" id="pwd" required>
        <label for="loginPassword">Password</label>
      </div>
      <input type="submit" value="Save" name="submit" class="submit-btn"><br>
      <a href="Login.php" style="color:#1482e9;">Back<i class="bi bi-arrow-counterclockwise"></i></a>
    </form>
</div>