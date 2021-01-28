<?php
    session_start();
    include("../api/Classes/config.php");
    if(isset($_SESSION['ID'])){
        $clientID = $_SESSION['ID'];
        $selectQuery = mysqli_query($con, "SELECT user_priviledge FROM `user_table` WHERE user_id = '$clientID'");
        $sQ = mysqli_fetch_array($selectQuery);
        $uV = $sQ[0];
        if($uV == 0){
            header("location: member/");
        }
        elseif($uV == 1){
            header("location: admin/");
        }
    }
?>