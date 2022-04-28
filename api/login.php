<?php
include 'connection.php';
// drop down box
    // $cust_name= mysqli_query($conn,"SELECT cust_id,`cust_name` FROM `prod_hdr` GROUP BY cust_name");

    // if(mysqli_num_rows($cust_name)>0){
    //     $i=0;
    //     while($row=mysqli_fetch_assoc($cust_name)){
    //         $cust[$i]['cust_id']=$row['cust_id'];
    //         $cust[$i]['cust_name']=$row['cust_name'];
    //         $i++;
    //     }
    //     $resp['status']=true;
    //     $resp['message']= "sucess";
    //     $resp['data']=$cust;
    // }else{
    //     $resp['status']=false;
    //     $resp['message']= "customer name empty/error";
    //     $resp['data']=[];
    // }
    
    // header('Content-Type: application/json; charset=UTF-8');
    // echo json_encode($resp,JSON_PRETTY_PRINT);

    ////////////////////////////////////////////////////////////////////////

    // login for existing user
    $user_id=$_POST['user_id'];
    $user_name=$_POST['user_name'];
    $user_pwd=md5($_POST['user_pwd']);

    $user="SELECT `cust_id`, `user_id`, `user_name`, `user_pwd` FROM `c_user_mst` WHERE `user_id`='$user_id' and user_pwd='$user_pwd'";
    $result=mysqli_query($conn,$user);
    
    if(mysqli_num_rows($result)>0){
        $u_log['status']=true;
        $u_log['message']= "Login success"; 
    }else{
        $n_user="SELECT `cust_id`, `user_id`, `user_name`, `user_pwd` FROM `c_user_mst` WHERE `user_id`='$user_id' and user_pwd=''";
        $n_res=mysqli_query($conn,$n_user);
        if(mysqli_num_rows($n_res)>0){
            $u_log['status']=true;
            $u_log['message']= "Please Set Password";
        }else{
            $u_log['status']=false;
            $u_log['message']= "invalid username or password";
        }
    }
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($u_log,JSON_PRETTY_PRINT);
   
?>