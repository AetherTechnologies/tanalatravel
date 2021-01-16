<?php
include('connect.php');

        $sql = mysqli_query($con, "SELECT * FROM tbllocation");
        
        while($row = mysqli_fetch_assoc($sql)){
            $long = $row['loc_long'];
            $lat = $row['loc_lat'];

            echo json_encode(['Longhitude' => $long, 'Latitude' => $lat]);
        }
         
?>