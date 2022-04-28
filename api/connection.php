<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$db="project";
$conn = mysqli_connect($dbhost, $username, $password,$db);
// Check connection
if($conn===false)
{
    die("error,could'nt connect".mysqli_connect_error());
}
?>