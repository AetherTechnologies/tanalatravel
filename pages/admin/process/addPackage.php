<?php
include('../../../api/Classes/config.php');
// Count total files

// To store uploaded files path
$files_arr = "";
$inclusion = "";
$location = "";
$description = "";
$packageName = "";
$price = "";
if(isset($_POST['packageName'])){
    $packageName = $_POST['packageName'];
}
if(isset($_FILES['files'])){
    $countfiles = count($_FILES['files']['name']);
    if($countfiles > 0){
        // Upload directory
        $upload_location = "../../../uploads/package/";
    
    
        // Loop all files
        for($index = 0;$index < $countfiles;$index++){
    
            if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                // File name
                $filename = date("YmdHis") . "-" .$_FILES['files']['name'][$index];
    
                // Get extension
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
                // Valid image extension
                $valid_ext = array("png","jpeg","jpg");
    
                // Check extension
                if(in_array($ext, $valid_ext)){
    
                    // File path
                    $path = $upload_location.$filename;
    
                    // Upload file
                    if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                        $files_arr .= $filename."|";
                    }
                }
            }
        }
    }
}
if(isset($_POST['price'])){
    $price = $_POST['price'];
}
if(isset($_POST['locations'])){
    foreach($_POST['locations'] as $y){
        $location .= $y."|";
    }
}
if(isset($_POST['inclusion'])){
    foreach($_POST['inclusion'] as $x){
        $inclusion .= $x."|";
    }
}
if(isset($_POST['description'])){
    $description = $_POST['description'];
}

$insert = mysqli_query($con, "INSERT INTO package_table (`package_name`, `package_price`, `package_inclusion`, `package_tours`, `package_description`, `package_photo`, `package_status`) 
                                                VALUES ('$packageName', '$price', '$inclusion', '$location', '$description', '$files_arr', '3')");

?>