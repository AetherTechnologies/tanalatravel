<?php
include("../../api/Classes/config.php");
$count = 0;
$query = mysqli_query($con, "SELECT * FROM inclusion_table");

if($query){
    while($row = mysqli_fetch_assoc($query)){
        $className = $row['inclusion_status'] == 0 ? "btn-danger" : "btn-success";
        $buttonValue = $row['inclusion_status'] == 0 ? "Disabled" : "Enabled";
        echo '<tr><td><span class="" id="span'.$row['inclusion_id'].'">'.$row["inclusion_name"].'</span><input type="hidden" id="input'.$row['inclusion_id'].'" class="form-control"></td><td>
        <button type="button" class="btn btn-sm '.$className.' buttonControl" data-name="'.$row["inclusion_name"].'" data-inclusion="'.$row['inclusion_id'].'">'.$buttonValue.'</button>
        <button type="button" class="btn btn-sm btn-info buttonEdit" data-name="'.$row['inclusion_name'].'" data-inclusion="'.$row["inclusion_id"].'">Edit</button>
        <button type="button" class="btn btn-sm btn-danger deleteButton" data-id="'.$row["inclusion_id"].'">Delete</button>
        </td></tr>';
        $count++;
    }
}
?>