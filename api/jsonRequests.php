<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header('Content-type: application/json');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include("Classes/config.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        if(!empty($email)){
            $chk_email = mysqli_real_escape_string($con, $email);
            $selectQuery = mysqli_query($con, "SELECT * FROM `user_table` WHERE user_email = '$chk_email'");
            $chkRow = mysqli_num_rows($selectQuery);
            if($chkRow > 0){
                echo 'false';
            }else{
                echo 'true';
            }
        }
    }
?>