<?php
session_start();
include 'connection.php';
include 'header.php';
?>
<?php
  $msg="";
  if(isset($_POST['submit'])){
    $uname= $_POST['uname'];
    $pass=$_POST['pwd'];
    $res=mysqli_query($conn,"SELECT `log_id`, `uname`, `pwd` FROM login_mst WHERE uname='$uname'");
    if(mysqli_num_rows($res)>0){
      $row=mysqli_fetch_assoc($res);
      $verify=password_verify($pass,$row['pwd']);
        if($verify==1){ 
          $_SESSION['admin_id']=$row['log_id'];
          $_SESSION['admin_email']=$row['uname'];
          header("location:maindashdemo.php");
        }else{
          $msg="Invalid Email or Password";
        }
    }else{
      $msg="Invalid Email or Password";
    }
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
      <h2>LOGIN</h2> 
      <div class="error"><?php echo $msg;?></div>
      <div class="input-group">
        <input type="email" name="uname" id="email"  Placeholder="abc@gmail.com" required autocomplete="off" />
        <!-- <label for="loginUser">Email</label> -->
      </div>
      <div class="input-group">
        <input type="password" name="pwd" id="pwd" Placeholder="******" required>
        <!-- <label for="loginPassword">Password</label> -->
      </div>
      <input type="submit" value="Login" name="submit" class="submit-btn"><br>
      <a href="chgpwd.php" style="color:#1482e9;">Change Password?</a>
    </form>
  </div>
  <!-- <script src="login.js"></script> -->