<?php 
include("../../../api/Classes/config.php");

if(isset($_POST['fetch'])){
    $ID = $_POST['mess'];
    $z = array();
    $a = mysqli_query($con, "SELECT message_table.message_title , message_table.message_content,user_table.user_email, DATE_FORMAT(message_table.date_created, '%b %c , %Y %r') as date_created, message_table.status, user_table.user_fullname
    FROM message_table 
    INNER JOIN user_table ON user_table.user_id = message_table.user_id
    WHERE message_table.message_id = '$ID'");
    if($a){
        $z = mysqli_fetch_assoc($a);
    }
    echo json_encode($z);
}

if(isset($_POST['seen'])){
    $ID = $_POST['ID'];
    $a = mysqli_query($con, "UPDATE message_table SET status = 2 WHERE message_id = '$ID'"); 
}
if(isset($_POST['delete'])){
    $ID = $_POST['ID'];
    $a = mysqli_query($con, "DELETE FROM message_table WHERE message_id = '$ID'");
}

?>