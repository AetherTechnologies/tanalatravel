<?php
if(isset($_POST['Add'])){
    $countFiles = count($_FILES['LocationImages']['name']);

    $uploadLocation = "..\\..\\uploads\\locationPhoto\\";

    $filesArr = array();
    $str = "";
    if($countFiles > 0){
        for($index = 0; $index < $countFiles; $index++){
            if(isset($_FILES['LocationImages']['name'][$index]) && $_FILES['LocationImages']['name'][$index] != ''){
                // File name
                    $filename = $_FILES['LocationImages']['name'][$index];
            
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
        $description = $_POST['description'];
        
    }
}

?>