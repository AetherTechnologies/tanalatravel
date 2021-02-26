<?php
    include('../../../api/Classes/config.php');
    session_start();
    if(isset($_POST['Send'])){
        $_SESSION['r4nd0m'] = $_POST['Send'];
    }
    if(isset($_POST['remove'])){
        unset($_SESSION['r4nd0m']);
    }
    if(isset($_POST['fetch'])){
        $z = array();
        if(!empty($_SESSION['r4nd0m'])){
            $a = $_SESSION['r4nd0m'];
            $x = mysqli_query($con, "SELECT * FROM package_table WHERE package_id = '$a'");
            if($a){
                $b = mysqli_fetch_assoc($x);
                $z =$b;
            }
        }else{
            array_push($z, [true]);
        }
        echo json_encode($z);
    }
    if(isset($_POST['display'])){
        $a = $_POST['package'];
        $b = $_POST['location'];
        $z = array();
        $x = mysqli_query($con, "SELECT days FROM config_table WHERE package_id = '$a' AND location_id = '$b'");
        if($x){
            $z = mysqli_fetch_assoc($x);
        }
        echo json_encode($z);
    }
    if(isset($_POST['configPackage'])){
        $ID = $_POST['configPackage'];
        $x = array();
        $z = mysqli_query($con, "SELECT * FROM iterinary_table WHERE config_id = '$ID' ORDER BY iterinary_day ASC, iterinary_time ASC");
        if($z){
            while($y = mysqli_fetch_assoc($z)){
                array_push($x, $y);
            }
        }
        echo json_encode($x);
    }
    if(isset($_POST['fetchPackage'])){
        $ID = $_POST['fetchPackage'];
        $loc = $_POST['locationConfig'];
        $x = array();
        $z = mysqli_query($con , "SELECT * FROM config_table WHERE package_id = '$ID' AND location_id = '$loc'");
        if($z){
            while($y = mysqli_fetch_assoc($z)){
                $x = $y;
            }
        }
        echo json_encode($x);
    }
    if(isset($_POST['fetchSub'])){
        $ID = $_POST['subID'];
        $a = mysqli_query($con, "SELECT * FROM sub_itinerary_table WHERE iti_id = '$ID' ORDER BY siti_id ASC");
        $z = array();
        if($a){
            while($row = mysqli_fetch_assoc($a)){
                array_push($z, $row);
            }
        }
        echo json_encode($z);
    }
    if(isset($_POST['reserve'])){
        $date = $_POST['date'];
        $ID = $_SESSION['ID'];
        $package = $_SESSION['r4nd0m'];
        $b = mysqli_query($con, "SELECT * FROM book_table WHERE package_id = '$package' AND user_id = '$ID'");
        $c = mysqli_num_rows($b);
        if($c == 0){
            $a = mysqli_query($con, "INSERT INTO book_table (book_date, package_id, user_id) VALUES ('$date', '$package', '$ID')");
            echo json_encode("Y");
        }else{
            echo json_encode("X");
        }
    }
    if(isset($_POST['fetchLoc'])){
        $ID = $_POST['LocID'];
        $a = mysqli_query($con, "SELECT * FROM location_table WHERE location_id ='$ID'");
        if($a){
           while($s = mysqli_fetch_assoc($a)){
               echo json_encode($s);
           }
        }
    }
    if(isset($_POST['insertCustom'])){
        $raw_data = $_POST['config'];
        $data = json_decode($raw_data);
        $dateS = $_POST['dateS'];
        $dateE = $_POST['dateE'];
        $pname = $_POST['pName'];
        $ID = $_SESSION['ID'];
        $a = mysqli_query($con, "INSERT INTO custom_table (custom_name, user_id,start,end) VALUES ('$pname','$ID','$dateS','$dateE')");
        if($a){
            $PID = mysqli_insert_id($con);
            foreach($data as $key => $value){
                $NID = $value -> {'ID'};
                $days = $value -> {'day'};
                $b = mysqli_query($con, "INSERT INTO config_table (package_id, days, location_id) VALUES ('$PID','$days', '$NID')");
            }
        }
    }
?>