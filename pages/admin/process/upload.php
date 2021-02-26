<?php
include("../../api/Classes/config.php");
if(isset($_POST['Add'])){
    $countFiles = count($_FILES['LocationImages']['name']);

    $uploadLocation = "../../uploads/locationPhoto/";

    $filesArr = array();
    $str = "";
    if($countFiles > 0){
        for($index = 0; $index < $countFiles; $index++){
            if(isset($_FILES['LocationImages']['name'][$index]) && $_FILES['LocationImages']['name'][$index] != ''){
                // File name
                    $filename = date("YmdHis") . "-" .$_FILES['LocationImages']['name'][$index];
            
                    // Get extension 
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            
                    // Valid image extension
                    $valid_ext = array("png","jpeg","jpg");
            
                    // Check extension
                    if(in_array($ext, $valid_ext)){
                    $str .= $filename."|";
                    // File path
                    $path = $uploadLocation.$filename;
        
                    // Upload file
                    if(move_uploaded_file($_FILES['LocationImages']['tmp_name'][$index],$path)){
                        $filesArr[] = $path;
                    }
                }
            }
        }
        
        $inclusion = "";
        foreach($_POST['inclusion'] as $inclusions){
            $inclusion .= $inclusions."|";
        }
        $lAddress = $_POST['locationAddress'];
        $longhitude = $_POST['longhitude'];
        $latitude = $_POST['latitude'];
        $pricing = $_POST['pricing'];
        $description = mysqli_real_escape_string($con, $_POST['description']);
        mysqli_query($con, "INSERT INTO `location_table` (`location_longhitude`, `location_latitude`, `location_name`, `location_price`, `location_inclusion`, `location_description`, `location_photo`) 
                            VALUES ('$longhitude', '$latitude', '$lAddress', '$pricing', '$inclusion', '$description', '$str');");
    }
}

?>