<?php 
    include("../../api/Classes/config.php");
    $status3 = "";
    $a = mysqli_query($con, "SELECT * FROM custom_table ORDER BY date_created DESC");
    while($row = mysqli_fetch_array($a)):
        $b = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_table WHERE user_id ='".$row['user_id']."'"));
        $action = '<button class="btn btn-sm btn-success sam" data-id="'.$row['custom_id'].'">Accept</button>
                            <button class="btn btn-sm btn-danger dec" data-id="'.$row['custom_id'].'">Decline</button>';
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
    <td><?= $b['user_fullname']; ?></td>
    <td><?= date('m-d-Y , g:i a ', strtotime($row['date_created']));?></td>
    <td><?= $status ?></td>
    <td><?= $action ?></td>
    <td>Custom Package</td>
</tr>

<?php endwhile; ?>
<?php 
$c = mysqli_query($con, "SELECT * FROM book_table");
while($row2 = mysqli_fetch_assoc($c)):
    $bc = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_table WHERE user_id ='".$row2['user_id']."'"));
    $action2 = '<button class="btn btn-sm btn-success csam" data-id="'.$row2['book_id'].'">Accept</button>
                            <button class="btn btn-sm btn-danger cdec" data-id="'.$row2['book_id'].'">Decline</button>';
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
    <td><?= $bc['user_fullname']; ?></td>
    <td><?= date('m-d-Y , g:i a ', strtotime($row2['date_created']));?></td>
    <td><?= $status3 ?></td>
    <td><?= $action2 ?></td>
    <td>Book Package</td>
</tr>
<?php endwhile; ?>