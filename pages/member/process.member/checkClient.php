<?php
    session_start();
    include('../../api/Classes/config.php');
    if(empty($_SESSION['ID'])){
        header("location: ../login.php");
    }
    $UNAME = "";
    $uri = "";

    if(!empty($_SESSION['ID'])){
        $ID = $_SESSION['ID'];
        $a = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_table WHERE user_id = '$ID'"));
        if($a){
            $userPriviledge = $a['user_priviledge'];

            if($userPriviledge != '0'){
                unset($_SESSION['ID']);
                header("location : ../../");
            }
            $b = mysqli_query($con, "SELECT * FROM user_info_table WHERE user_id = '$ID'");
            if($b){
                $x = mysqli_num_rows($b);
                if($x == 0){
                    header("location: ../almostThere.php");
                }
            }
            $UNAME = $a['user_fullname'];
        }
    }
    if(!empty($_SERVER['REQUEST_URI'])){
        $uri = $_SERVER['REQUEST_URI'];
    }
    if($uri == '/pages/member/index.php?page=logout'){
        unset($_SESSION['ID']);
        header("Location: ../login.php");
    }
?>