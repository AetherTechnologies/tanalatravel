<?php
    include('../../../api/Classes/config.php');
    
    if(isset($_POST['dataID'])){
        $Return = array();
        $ID = $_POST['dataID'];
        $a = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM package_table WHERE package_id = '$ID'"));
        $b = $a['package_tours'];
        if(!empty($b)){
            $c = substr($b, 0 ,-1);
            $d = explode("|",$c);
            foreach ($d as $key => $value) {
                $e = mysqli_query($con , "SELECT * FROM location_table WHERE location_id = '$value'");
                while($row = mysqli_fetch_assoc($e)){
                    array_push($Return, $row);
                }
            }
        }
        echo json_encode($Return);
    }

    if(isset($_POST['updateID'])){
        $ID = $_POST['updateID'];
        $UpdateData = $_POST['updateData'];
        $a = mysqli_query($con, "UPDATE package_table SET package_tours = '$UpdateData' WHERE package_id = '$ID'");
    }
    
?>