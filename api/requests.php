<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include("Classes/config.php");

if(isset($_POST['request'])){
        $user_fullname = $_POST['userFullname'];
        $user_email = $_POST['userEmail'];
        $user_password = $_POST['userPassword'];
        if($con->connect_error){
            die("Connection failed: ". $con->connect_error);
        }
        $insertQuery = mysqli_query($con, "INSERT INTO `user_table` (`user_fullname`, `user_email`, `user_password`) 
                        VALUES ('$user_fullname', '$user_email', '$user_password')");
}


?>