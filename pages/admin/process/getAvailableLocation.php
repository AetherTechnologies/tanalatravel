<?php
    include('../../../api/Classes/config.php');
    // Fetch Data
    if(isset($_GET['getLocation'])){
        $fetchAvailableLocation = mysqli_query($con, "SELECT * FROM location_table");
        // Initialize Array
        $locationData = array();
        // Propagating Data to Array
        while($data = mysqli_fetch_assoc($fetchAvailableLocation)){
            array_push($locationData, $data);
        }
        // Return Value To JS
        echo json_encode($locationData);
    }
    if(isset($_POST['Data'])){
        $ID = $_POST['Data'];
        echo json_encode(mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM location_table WHERE location_id = '$ID'")));
    }
?>