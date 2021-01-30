<?php
    include("../../../api/Classes/config.php");
    if(isset($_POST['RequestID'])){
        $req_id = $_POST['RequestID'];
        $a = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM request_package WHERE request_id = '$req_id'"));
        echo json_encode($a);
    }
?>