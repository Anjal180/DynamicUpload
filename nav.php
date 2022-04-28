<?php
session_start();
include 'connection.php';
include 'header.php';
if(!$_SESSION['admin_id']){ 
header("location:login.php");
die();
}
?>
<style>
    #header{font-weight: bold;}
    #head{color: #2f9aff; }
    #h3{padding: 20px;}
   
/* .container{ min-height: 100%;} */
    /* #btn{background-color: orange;} */
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" id="header">Welcome <u id="head"><?php echo $_SESSION['admin_email']; ?></u></a>
    <!-- <a class="navbar-brand" href="#">
      <img src="img/logo.png" alt="" width="130" height="24">
    </a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admindash.php">Document</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link active" href="upload.php">Upload</a>
        </li> -->
        <a class="btn btn-primary" href="logout.php">Logout</a>
      </ul>
    </div>
  </div>
</nav>