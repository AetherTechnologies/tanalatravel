<?php

include('../../api/Classes/config.php');
$ID = $_SESSION['ID'];
$a = mysqli_query($con, "SELECT * FROM book_table WHERE user_id = '$ID' AND book_status = '1'");
while($x = mysqli_fetch_assoc($a)):
    $PID = $x['package_id'];
    $b = mysqli_query($con, "SELECT * FROM package_table WHERE package_id = '$PID'");
    $c = mysqli_fetch_assoc($b);
?>
<tr>
    <td><?= $c['package_name'] ?></td>
    <td>Pending</td>
    <td><?= $x['book_date']; ?></td>
</tr>

<?php endwhile; ?>