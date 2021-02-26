<?php

include('../../api/Classes/config.php');
$ID = $_SESSION['ID'];
$status3 = "";
    $a = mysqli_query($con, "SELECT * FROM custom_table WHERE user_id = '$ID' AND status = 1 ORDER BY date_created DESC");
    while($row = mysqli_fetch_array($a)):
       
    $status = "";
    switch($row['status']){
        case 1:
            $status = 'PENDING';
            break;

        case 2:
            $status = 'Approved';
            break;

    }
?>

<tr>
    <td><?= $row['custom_name'] ?></td>
    <td><?= $status ?></td>
    <td>Custom Package</td>
</tr>

<?php endwhile; ?>
<?php 
$c = mysqli_query($con, "SELECT * FROM book_table WHERE user_id = '$ID' AND book_status = 1");
while($row2 = mysqli_fetch_assoc($c)):
    $cc = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM package_table WHERE package_id ='".$row2['package_id']."'"));
    switch($row2['book_status']){
        case 1:
            $status3 = 'PENDING';
            break;
        case 2:
            $status3 = 'Approved';
            break;

    }
?>
<tr>
    <td><?= $cc['package_name'] ?></td>
    <td><?= $status3 ?></td>
    <td>Book Package</td>
</tr>
<?php endwhile; ?>