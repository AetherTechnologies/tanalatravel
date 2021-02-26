<?php
    include("../../api/Classes/config.php");
    $count = 0;
    $query = mysqli_query($con, "SELECT * FROM location_table");
    if($query){
        while($row = mysqli_fetch_assoc($query)){
            echo '<tr><td>'.$row["location_name"].'</td><td>
            <button type="button" class="btn btn-sm btn-success buttonControl" location="'.$row['location_id'].'">Add</button>
            <button type="button" class="btn btn-sm btn-info locationButton" marker="'.$count.'" location-id="'.$row["location_id"].'">View</button></td>
            <td>$'. $row['location_price'] .'/Day</td>
            </tr>';
            $count++;
        }
    }
?>