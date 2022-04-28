<?php
session_start();
include 'connection.php';
include 'header.php';
?>
<?php
  $msg1="";
  if(isset($_POST['submit'])){
      $uname=mysqli_real_escape_string($conn,$_POST['uname']);
      $opass=password_hash($_POST['opwd'],PASSWORD_DEFAULT);

      if (isset($_POST['npwd'])
      && isset($_POST['cpwd'])) {

	      function validate($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
	      }  
        $npwd = validate($_POST['npwd']);
        $cpwd = validate($_POST['cpwd']);
        if($npwd !== $cpwd){
          $_SESSION['msg1']="The confirmation password  does not match";
       
        }else{
          $opass=mysqli_real_escape_string($conn,$_POST['opwd']); 
          $npass=mysqli_real_escape_string($conn,$_POST['npwd']); 
          $cpass=mysqli_real_escape_string($conn,$_POST['cpwd']);
          $res=mysqli_query($conn,"SELECT `log_id`, `uname`, `pwd` FROM login_mst WHERE uname='$uname'");
          if(mysqli_num_rows($res)>0){
            $row=mysqli_fetch_assoc($res);
            $verify=password_verify($opass,$row['pwd']);
              if($verify==1){ 
                $npass=password_hash($_POST['npwd'],PASSWORD_DEFAULT);
                $ress=mysqli_query($conn,"UPDATE login_mst SET pwd='$npass' WHERE uname='$uname'");
                $_SESSION['msg1']="Password change successfully";
              }else{
                $_SESSION['msg1']="Old Password not match";
              }
          }
       }
     }else{$_SESSION['msg1']="Password not match";}
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
      <h2>Change Password</h2>
      <div class="error"><?php echo $_SESSION['msg1'];?> <?php echo $_SESSION['msg1']="";?></div>
      <div class="input-group">
        <input type="email" name="uname" id="email" required>
        <label for="loginUser">Email</label>
      </div>
      <div class="input-group">
        <input type="password" name="opwd" id="pwd" required>
        <label for="loginPassword">Old Password</label>
      </div>
      <div class="input-group">
        <input type="password" name="npwd" id="npwd" required>
        <label for="loginPassword">New Password</label>
      </div>
      <div class="input-group">
        <input type="password" name="cpwd" id="cpwd" required>
        <label for="loginPassword">Confirm New Password</label>
      </div>
      <input type="submit" value="Save" name="submit" class="submit-btn"><br>
      <a href="Login.php" style="color:#1482e9;">Back<i class="bi bi-arrow-counterclockwise"></i></a>
    </form>
</div>