<?php

    include('connect.php');
    if(isset($_GET['update'])){
        
        $bid = $_GET['update'];
        $query="DELETE FROM bookings WHERE `bookings`.`bookingID` = $bid";
        mysqli_query($con, $query);

    }
            include('connect.php');
            $sql2 = "SELECT * FROM bookings WHERE bookingID = $id";
            if($result2 = mysqli_query($con, $sql)){
            $row2 = mysqli_fetch_assoc($result);

            $name2 = $row2['booking_name'];

            echo "<input type='text' class='form-control'><?= $name2 ?></input>";
            
            }
            else{
            echo '<p class="card-text" name="booking_location"><strong>No data found</strong></p>';
            }
                                                        
?>
