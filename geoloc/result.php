<?php
include('connect.php');

// if(isset($_POST['input'])){
    
//     $input = $_POST['input'];
//     $sql = mysqli_query($con, "SELECT * FROM tbllocation WHERE loc_name = '$input'");
        
//         // while(){

            
//         // }
//         $row = mysqli_fetch_assoc($sql);
//         $long = $row['loc_long'];
//             $lat = $row['loc_lat'];
//             $loc_name = $row['loc_name'];
//             $loc_price = $row['loc_price'];
//             $loc_status = $row['loc_status'];
//             $loc_image = $row['loc_image'];

//             echo json_encode(['Longhitude' => $long, 'Latitude' => $lat, 'Location_name' => $loc_name, 'Price' => $loc_price, 'Status' => $loc_status, 'Image' => $loc_image]);

// }
    $sql = mysqli_query($con, "SELECT * FROM tbllocation");
    
        // while(){
        // }
        $dataArray = array();
        while($row = mysqli_fetch_assoc($sql)){

            array_push($dataArray,$row);
        }
        
        echo json_encode($dataArray);
?>