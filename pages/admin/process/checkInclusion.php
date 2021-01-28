<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: access");
// header("Access-Control-Allow-Methods: POST");
// header('Content-type: application/json');
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include('../../../api/Classes/config.php');
if(isset($_POST['DataInclusion'])){ 
    $DataInclusion = mysqli_real_escape_string($con, $_POST['DataInclusion']);
    $Query = mysqli_num_rows(mysqli_query($con, "SELECT * FROM inclusion_table WHERE inclusion_name LIKE '%$DataInclusion%'"));
    $ar = array();
    if($Query > 0){
        array_push($ar, true);
    }else{
        $a = mysqli_query($con, "INSERT INTO inclusion_table (`inclusion_name`) VALUES ('$DataInclusion')");
        array_push($ar, false);
    }
    echo json_encode($ar);
}
if(isset($_POST['InclusionID'])){
    $incID = mysqli_real_escape_string($con, $_POST['InclusionID']);
    $checkStatus = mysqli_num_rows(mysqli_query($con, "SELECT * FROM inclusion_table WHERE inclusion_id = '$incID' AND inclusion_status = '1'"));
    if($checkStatus > 0){
        $up = mysqli_query($con, "UPDATE inclusion_table SET inclusion_status = '0' WHERE inclusion_id = '$incID'");
    }else{
        $up = mysqli_query($con, "UPDATE inclusion_table SET inclusion_status = '1' WHERE inclusion_id = '$incID'");
    }
}
if(isset($_POST['update'])){
    $update = $_POST['update'];
    $ID = $_POST['id'];
    $a = mysqli_query($con, "UPDATE inclusion_table SET inclusion_name = '$update' WHERE inclusion_id = '$ID'");
}
if(isset($_POST['delete'])){
    $delete = $_POST['delete'];
    $a = mysqli_query($con, "DELETE FROM inclusion_table WHERE inclusion_id = '$delete'");
}
if(isset($_GET['fetch'])){
    $Fetched = array();
    $FetchQuery = mysqli_query($con, "SELECT inclusion_name FROM inclusion_table WHERE inclusion_status = '1'");
    while($row = mysqli_fetch_array($FetchQuery)){
        array_push($Fetched,$row['inclusion_name']);
    }
    echo json_encode($Fetched);

}
?>