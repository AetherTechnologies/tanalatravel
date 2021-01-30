<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header('Content-type: application/json');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();
include("Classes/config.php"); 

    if(isset($_POST['request'])){
        if(!empty($_POST['userEmail']) && !empty($_POST['userPassword'])){
            $email = mysqli_real_escape_string($con, $_POST['userEmail']);
            $password = mysqli_real_escape_string($con, $_POST['userPassword']);
            $selectQuery = mysqli_query($con, "SELECT * FROM `user_table` WHERE user_email = '$email'");
            $isReg = mysqli_num_rows($selectQuery);
            if($isReg > 0){
                $sQ = mysqli_fetch_array($selectQuery);
                $password_hash = $sQ['user_password'];
                if(password_verify($password, $password_hash)){
                    echo 'true';
                    $_SESSION['ID'] = $sQ['user_id'];
                }
                else{
                    echo 'false';
                }
            }
            else{
                echo 'false';
            }
        }
    }
?>