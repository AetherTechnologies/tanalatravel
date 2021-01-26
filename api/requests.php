<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include("Classes/config.php");

if(isset($_POST['request'])){
        $user_fullname = mysqli_real_escape_string($con,$_POST['userFullname']);
        $user_email = mysqli_real_escape_string($con,$_POST['userEmail']);
        $user_password = mysqli_real_escape_string($con,$_POST['userPassword']);
        $hashed = password_hash($user_password, PASSWORD_DEFAULT);
        if($con->connect_error){
            die("Connection failed: ". $con->connect_error);
        }
        $insertQuery = mysqli_query($con, "INSERT INTO `user_table` (`user_fullname`, `user_email`, `user_password`) 
                        VALUES ('$user_fullname', '$user_email', '$hashed')");
}

?>