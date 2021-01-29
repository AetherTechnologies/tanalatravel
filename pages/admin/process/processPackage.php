<?php
include("../../api/Classes/config.php");

$populate = mysqli_query($con, "SELECT * FROM package_table");
while($row = mysqli_fetch_array($populate)):
    $ID = $row['package_id'];
    $fetchDate = mysqli_fetch_array(mysqli_query($con, "SELECT DATE_FORMAT(package_created_date, '%l:%i %p | %b %e,%Y') as Formatted FROM package_table WHERE package_id = '$ID'"));
    $RawInclusion = str_replace("|",",",$row['package_inclusion']);
    $TrimInclusion = substr($RawInclusion, 0, -1);
    $hasInclusion = !empty($TrimInclusion) ? $TrimInclusion : "None";
?>
    <tr>
        <td><?= $row['package_name']; ?></td>
        <td><?= $fetchDate['Formatted']; ?></td>
        <td><span class="badge badge-info"><?= $hasInclusion ?></span></td>
        <td>
            <button type="button" class="btn btn-sm btn-success btnEdit">Edit</button>
            <button type="button" class="btn btn-sm btn-danger btnDelete" data-id="<?= $row['package_id'];?>">Delete</button>
        </td>
    </tr>

<?php endwhile; ?>