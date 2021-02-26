<?php
include("../../api/Classes/config.php");

$populate = mysqli_query($con, "SELECT * FROM location_table");
while($row = mysqli_fetch_assoc($populate)):
?>

<tr>
    <td><?= $row['location_name']?></td>
    <td>
        <button class="btn btn-danger my-2 btn-sm btnDel" type="button" data-id="<?= $row['location_id'] ?>">Delete</button>
    </td>
</tr>
<?php endwhile; ?>