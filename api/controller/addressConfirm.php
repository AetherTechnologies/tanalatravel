<?php

    session_start();
    include("../api/Classes/config.php");
    if(empty($_SESSION['ID'])){
        header("Location: ../../");
    }
    if(isset($_POST['address'])){
        $ID = $_SESSION['ID'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $a = mysqli_query($con , "INSERT INTO user_info_table (`user_id`, `user_address`, `user_contact`) VALUES ('$ID', '$address', '$number')");
        if($a){
            header("Location: member/");
        }
    }
    if(!empty($_SESSION['ID'])){
        $ID = $_SESSION['ID'];
        $x = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user_info_table WHERE user_id = '$ID'"));
        if($x > 0){
            header("Location: member/");
        }
    }
    
?>