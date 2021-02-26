<?php
    include("../../../api/Classes/config.php");
    if(isset($_POST['DeletePackage'])){
        $ID = $_POST['DeletePackage'];
        $a = mysqli_query($con, "DELETE FROM package_table WHERE package_id = '$ID'");
    }
    if(isset($_POST['fetchID'])){
        $z = array();
        $ID = $_POST['fetchID'];
        $x = mysqli_query($con, "SELECT * FROM package_table WHERE package_id = '$ID'");
        if($x){
            while($y = mysqli_fetch_assoc($x)){
                $z = $y;
            }
        }
        echo json_encode($z);
    }
    if(isset($_POST['checkIterinary'])){
        $z = array();
        $ID = $_POST['checkIterinary'];
        $x = mysqli_query($con, "SELECT * FROM config_table WHERE package_id ='$ID'");
        if($x){
            while($y = mysqli_fetch_assoc($x)){
                $z = $y;
            }
        }else{
            array_push($z, false);
        }
        echo json_encode($z);
    }
    if(isset($_POST['fetchConfig'])){
        $z = array();
        $location = $_POST['location'];
        $package = $_POST['package'];
        if(!empty($location) && !empty($package)){
            $query = mysqli_query($con, "SELECT * FROM config_table WHERE package_id = '$package' AND location_id = '$location'");
            if($query){
                $fetchQuery = mysqli_fetch_assoc($query);
                $configID = $fetchQuery['config_id'];
                $query2 = mysqli_query($con, "SELECT iterinary_table.it_id, iterinary_table.iterinary_time, iterinary_table.iterinary_day, iterinary_table.iterinary_activity, iterinary_type.type  FROM `iterinary_table`
                INNER JOIN iterinary_type ON iterinary_type.type_id = iterinary_table.iterinary_type WHERE iterinary_table.config_id = '$configID' ORDER BY iterinary_table.iterinary_day ASC , iterinary_table.iterinary_time ASC");
                $checkQuery2 = mysqli_num_rows($query2);
                if($checkQuery2 > 0){
                    while($data = mysqli_fetch_assoc($query2)){
                        array_push($z, $data);
                    }
                }else{
                    array_push($z,"False");
                }
            }else{
                array_push($z,"False");
            }
        }else{
            array_push($z,"False");
        }
        echo json_encode($z);
    }
    if(isset($_POST['dataDlt'])){
        $ID = $_POST['dataDlt'];
        $z = mysqli_query($con, "DELETE FROM iterinary_table WHERE it_id = '$ID'");
    }
    if(isset($_POST['fetchOption'])){
        $z = array();
        $location = $_POST['location'];
        $package = $_POST['package'];
        if(!empty($location) && !empty($package)){
            $query = mysqli_query($con, "SELECT days FROM config_table WHERE package_id = '$package' AND location_id ='$location'");
            if($query){
                $fetch = mysqli_fetch_array($query);
                $days = $fetch['days'];
                if($days > 0){
                    array_push($z,$days);
                }else{
                    array_push($z,"Error Occured");
                }
            }else{
                array_push($z,"False");
            }
        }else{
            array_push($z,"False");
        }
        echo json_encode($z);
    }
    if(isset($_POST['toggleData'])){
        $ID = $_POST['toggleData'];
        if(!empty($ID)){
            $y = mysqli_query($con, "SELECT package_status FROM package_table WHERE package_id = '$ID'");
            if($y){
                $z = mysqli_fetch_assoc($y);
                $a = $z['package_status'];
                if($a == 1){
                    $b = mysqli_query($con, "UPDATE package_table SET package_status = '2' WHERE package_id = '$ID'");
                }else{
                    $b = mysqli_query($con, "UPDATE package_table SET package_status = '1' WHERE package_id = '$ID'");
                }
            }
        }
    }
    if(isset($_POST['fetchType'])){
        $z = array();
        $query = mysqli_query($con, "SELECT * FROM iterinary_type WHERE status = '1'");
        if($query){
            while($x = mysqli_fetch_assoc($query)){
                array_push($z, $x);
            }
        }
        echo json_encode($z);
    }
    if(isset($_POST['insertData'])){
        $package = $_POST['package'];
        $location = $_POST['location'];
        $configID = 0;
        $y = mysqli_query($con, "SELECT config_id FROM config_table WHERE package_id = '$package' AND location_id = '$location'");
        if($y){
            $fetchY = mysqli_fetch_assoc($y);
            $configID = $fetchY['config_id'];
        }
        if($configID != 0){
            $day = $_POST['day'];
            $type = $_POST['type'];
            $timeRaw = $_POST['time'];
            $activity = $_POST['activity'];
            $time = date("H:i", strtotime($timeRaw));
            $z = mysqli_query($con, "INSERT INTO iterinary_table (config_id, iterinary_time, iterinary_type, iterinary_day, iterinary_activity) VALUE ('$configID', '$time', '$type', '$day', '$activity')");
            if($z){
                $m = mysqli_query($con, "UPDATE package_table SET package_status = '2' WHERE package_id = '$package'");
            }
        }else{
            echo json_encode("False");
        }
    }
    if(isset($_POST['subIti'])){
        $locS = $_POST['locS'];
        $langS = $_POST['langS'];
        $latiS = $_POST['latiS'];
        $locE = $_POST['locE'];
        $langE = $_POST['langE'];
        $latiE = $_POST['latiE'];
        $loc = $_POST['itiID'];
        $Merged = $locS . ' - ' . $locE; 
        $a = mysqli_query($con, "INSERT INTO sub_itinerary_table 
        (
            iti_id,
            start_lat,
            start_lng,
            end_lat,
            end_lng,
            sub_iti_name
        )
        VALUES (
            '$loc',
            '$latiS',
            '$langS',
            '$latiE',
            '$langE',
            '$Merged'
        )");
    }
    if(isset($_POST['fetchSub'])){
        $IDs = $_POST['SubID'];
        $a = mysqli_query($con, "SELECT * FROM sub_itinerary_table WHERE iti_id = '$IDs'");
        $z = array();
        if($a){
            while($x = mysqli_fetch_assoc($a)){
                array_push($z, $x);
            }
        }
        echo json_encode($z);
    }
    if(isset($_POST['data'])){
        $raw_data = $_POST['data'];
        $data = json_decode($raw_data);
        $packageID = $_POST['packageID'];
        $z = array();
        foreach ($data as $key => $value) {
            array_push($z,$value ->{'ID'});
            $ID = $value -> {'ID'};
            $days = $value -> {'day'};
            $x = mysqli_query($con, "INSERT INTO config_table (package_id, days, location_id) VALUES ('$packageID','$days', '$ID')");
        }
    }
    if(isset($_POST['generateID'])){
        $ID = $_POST['generateID'];
        $z = array();
        $x = mysqli_query($con, "SELECT * FROM location_table WHERE location_id = '$ID'");
        if($x){
            while($y = mysqli_fetch_assoc($x)){
                $z = $y;
            }
        }
        echo json_encode($z);
    }
    if(isset($_POST['subDelete'])){
        $ID = $_POST['subID'];
        $a = mysqli_query($con, "DELETE FROM sub_itinerary_table WHERE siti_id = '$ID'");

    }
    if(isset($_POST['reID'])){
        $ID = $_POST['ItID'];
        $a = mysqli_query($con, "SELECT config_table.package_id FROM `iterinary_table` 
        INNER JOIN config_table ON config_table.config_id = iterinary_table.config_id
        WHERE iterinary_table.it_id = '$ID'");
        $z = array();
        if($a){
            $z = mysqli_fetch_assoc($a);
            
        }
        echo json_encode($z);
    }
    if(isset($_POST['UpdateID'])){
        $ID = $_POST['UpdateID'];
        $packageName = $_POST['packageName'];
        $packagePrice = $_POST['packagePrice'];
        $description = $_POST['description'];
        $inclusion = "";
        if(isset($_POST['inclusion'])){
            foreach ($_POST['inclusion'] as $x) {
                $inclusion .= $x . "|";
            }
        }
        if(isset($_FILES['files'])){
            $countFiles = count($_FILES['files']['name']);
            $files_arr = "";
            if($countFiles > 0){
                $uploadLocation = "../../../uploads/package/";
                
                for($i = 0; $i < $countFiles; $i++){
                    if(isset($_FILES['files']['name'][$i]) && $_FILES['files']['name'] != ''){
                        $fileName = date("YmdHis") . "-" .$_FILES['files']['name'][$i];
                        $ext = strtolower(pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION));
                        $validExt = array("png", "jpeg", "jpg");
                        if(in_array($ext, $validExt)){
                            $path = $uploadLocation.$fileName;
                            if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $path)){
                                $files_arr .= $fileName."|";
                            }
                        }
                    }
                }
                $a = mysqli_query($con, "UPDATE `package_table` SET 
                `package_name` = '$packageName', 
                `package_price` = '$packagePrice',
                `package_inclusion` = '$inclusion',
                `package_description` = '$description',
                `package_photo` = '$files_arr'
                WHERE package_id = '$ID'
                ");
            }else{
                $a = mysqli_query($con, "UPDATE `package_table` SET 
                        `package_name` = '$packageName', 
                        `package_price` = '$packagePrice',
                        `package_inclusion` = '$inclusion',
                        `package_description` = '$description'
                        WHERE package_id = '$ID'
                        ");
            }
        }
        if(!isset($_FILES['files'])){
            $a = mysqli_query($con, "UPDATE `package_table` SET 
                        `package_name` = '$packageName', 
                        `package_price` = '$packagePrice',
                        `package_inclusion` = '$inclusion',
                        `package_description` = '$description'
                        WHERE package_id = '$ID'
                        ");
        }
    }
    if(isset($_POST['LocationDelete'])){
        $ID = $_POST['ID'];
        $a = mysqli_query($con, "DELETE FROM location_table WHERE location_id = '$ID'");
    }
    if(isset($_POST['ID2'])){
        $s = $_POST['ID2'];
        $a = mysqli_query($con, "DELETE FROM custom_table WHERE custom_id = '$s'");

    }
    if(isset($_POST['ID4'])){
        $s = $_POST['ID4'];
        $a = mysqli_query($con, "DELETE FROM book_table WHERE book_id = '$s'");
        
    }
    if(isset($_POST['ID1'])){
        $x = $_POST['ID1'];
        $a = mysqli_query($con, "UPDATE custom_table SET status = 2 WHERE custom_id = '$s'");
    }
    if(isset($_POST['ID3'])){
        $x = $_POST['ID3'];
        $a = mysqli_query($con, "UPDATE book_table SET book_status = 2 WHERE book_id = '$s'");
    }
?>