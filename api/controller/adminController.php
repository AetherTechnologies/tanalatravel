<?php
    include('../../api/Classes/config.php');
    session_start(); 
    $uri = "";
    if(!empty($_SERVER['REQUEST_URI'])){
         $uri = $_SERVER['REQUEST_URI'];
    }
    if(empty($_SESSION['ID'])){
        unset($_SESSION['ID']);
        header("location : ../../");
    }
    else if(!empty($_SESSION['ID'])){
        // Verify if Admin 
        $ID = $_SESSION['ID'];
        $isValid = mysqli_fetch_assoc(mysqli_query($con, "SELECT user_priviledge FROM user_table WHERE user_id = '$ID'"));
        if($isValid['user_priviledge'] != 1){
            unset($_SESSION['ID']);
            header("location: ../../");
        }
    }

?>