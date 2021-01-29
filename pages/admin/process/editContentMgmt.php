<?php
    include('../../../api/Classes/config.php');
    if(isset($_GET['tac'])){
        $a = mysqli_query($con, "SELECT * FROM cms_table WHERE cms_for = 'termsAndCondition'");
        $fetch = array();
        while($row = mysqli_fetch_array($a)){
            array_push($fetch,$row['cms_content']);
        }
        echo json_encode($fetch);
    }
    if(isset($_GET['au'])){
        $a = mysqli_query($con, "SELECT * FROM cms_table WHERE cms_for = 'AboutUs'");
        $fetch = array();
        while($row = mysqli_fetch_array($a)){
            array_push($fetch,$row['cms_content']);
        }
        echo json_encode($fetch);
    }
    if(isset($_POST['tacPost'])){
        $change = $_POST['tacPost'];
        $a = mysqli_query($con, "UPDATE cms_table SET cms_content = '$change', cms_update_date = current_timestamp() WHERE cms_for = 'termsAndCondition'");

    }
    if(isset($_POST['auPost'])){
        $change = $_POST['auPost'];
        $a = mysqli_query($con, "UPDATE cms_table SET cms_content = '$change', cms_update_date = current_timestamp() WHERE cms_for = 'AboutUs'");
    }
?>