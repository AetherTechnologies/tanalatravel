<?php 
    session_start();
    
    include('../../../api/Classes/config.php');
    if(isset($_POST['send'])){
        $z = $_POST['title'];
        $y = $_POST['message'];
        $ID = $_SESSION['ID'];
        if(!empty($ID)){
            $a = mysqli_query($con, "INSERT INTO message_table (message_title, message_content, user_id, category, status) VALUES
                                                                ('$z','$y','$ID','1','1')");

        }
    }
    if(isset($_POST['sendIssue'])){
        $z = $_POST['title'];
        $y = $_POST['message'];
        $ID = $_SESSION['ID'];
        if(!empty($ID)){
            $a = mysqli_query($con, "INSERT INTO message_table (message_title, message_content, user_id, category, status) VALUES
                                                                ('$z','$y','$ID','2','1')");
        }
    }
?>