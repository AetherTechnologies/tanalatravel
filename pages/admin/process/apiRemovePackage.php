<?php
    include("../../../api/Classes/config.php");
    if(isset($_POST['DeletePackage'])){
        $ID = $_POST['DeletePackage'];
        $a = mysqli_query($con, "DELETE FROM package_table WHERE package_id = '$ID'");
    }
?>