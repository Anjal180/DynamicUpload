<?php
include 'connection.php';
$user_id=$_POST['user_id'];
$user_name=$_POST['user_name'];
$user_pwd=md5($_POST['user_pwd']);

$user="SELECT `cust_id`, `user_id`, `user_name`, `user_pwd` FROM `c_user_mst` WHERE  user_pwd='$user_pwd'";
$result=mysqli_query($conn,$user);
    if(mysqli_num_rows($result)>0){
        $resp['status']=false;
        $resp['message']= "Password Should different from Existing Password";
    }else{
        $n_user="SELECT `cust_id`, `user_id`, `user_name`, `user_pwd` FROM `c_user_mst` WHERE `user_id`='$user_id'";
        $n_result=mysqli_query($conn,$n_user);
        if(mysqli_num_rows($n_result)>0){
            $insert="UPDATE `c_user_mst` SET `user_pwd`='$user_pwd' WHERE `user_id`='$user_id';";
            $i_result=mysqli_query($conn,$insert);
            if($i_result){
                $resp['status']=true;
                $resp['message']= "Password Update Successful!";
            }
        }else{
            $resp['status']=false;
            $resp['message']= "Password Updation failed";
        }
    }header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($resp,JSON_PRETTY_PRINT);
?>