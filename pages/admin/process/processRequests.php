<?php 
    include("../../api/Classes/config.php");
    $a = mysqli_query($con, "SELECT * FROM request_package ORDER BY request_date DESC");
    while($row = mysqli_fetch_array($a)):
        $b = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_table WHERE user_id ='".$row['created_by']."'"));
        $status = "";
        $action = "";
        switch($row['package_status']){
            case 5:
                $status = '<span class="badge badge-danger">On Approval</span>';
                $action = '<button class="btn btn-sm btn-success sam">Accept</button>
                            <button class="btn btn-sm btn-primary preview" data-preview="'.$row['request_id'].'">Preview</button>
                            <button class="btn btn-sm btn-danger">Decline</button>';
                break;
            default:
                $status = '<span class="badge badge-danger">Error Occur</span>';
                break;
        }
?>

<tr>
    <td><?= $b['user_fullname']; ?></td>
    <td><?= date('m-d-Y , g:i a ', strtotime($row['request_date']));?></td>
    <td><?= $status ?></td>
    <td><?= $action ?></td>
</tr>

<?php endwhile; ?>