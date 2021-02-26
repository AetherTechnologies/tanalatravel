<?php
include("../../api/Classes/config.php");

$populate = mysqli_query($con, "SELECT * FROM package_table");
while($row = mysqli_fetch_array($populate)):
    $ID = $row['package_id'];
    $fetchDate = mysqli_fetch_array(mysqli_query($con, "SELECT DATE_FORMAT(package_created_date, '%l:%i %p | %b %e,%Y') as Formatted FROM package_table WHERE package_id = '$ID'"));
    $RawInclusion = str_replace("|",",",$row['package_inclusion']);
    $TrimInclusion = substr($RawInclusion, 0, -1);
    $hasInclusion = !empty($TrimInclusion) ? $TrimInclusion : "None";
    $Status = $row['package_status'];
    $statusOut = "";
    $status = "";
    switch($Status){
        case 1 : 
            $statusOut = '<span class="badge badge-success status-badge" id="badge_'. $row['package_id'] .'">Enabled</span>';
            $status = 'Disable';
            $statusClass = "btn-danger";
            break;
        case 2 : 
            $statusOut = '<span class="badge badge-danger status-badge" id="badge_'. $row['package_id'] .'">Disabled</span>';
            $status = 'Enable';
            $statusClass = "btn-success";
            break;
        case 3 :
            $statusOut = '<span class="badge badge-info">No Itinerary</span>';
            break;
        default:
            $statusOut = '<span class="badge badge-danger">Error Occured</span>';
            break;
    }
?>
    <tr>
        <td><?= $row['package_name']; ?></td>
        <td><?= $statusOut; ?></td>
        <td>
            <div class="btn-group mx-auto">
                <button type="button" class="btn btn-success btn-flat" data-toggle="dropdown">Edit</button>
                <button type="button" class="btn btn-success btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                  <div class="dropdown-menu" role="menu" style="z-index: 2;">
                    <a class="dropdown-item btnEdit" href="#" data-id="<?= $row['package_id'];?>">Edit Tour Order</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item btnCreate" href="#" data-id="<?= $row['package_id'];?>">Edit Iterinary</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item btnPackage" data-id="<?= $row['package_id'];?>" href="#">Edit Package</a>
                  </div>
                </button>
            </div>
            <?php if(!empty($status)):?>
                <div class="btn-group">
                <button type="button" class="btn <?= $statusClass ?> btn-flat btnStatus" id="status_<?= $row['package_id'] ?>" data-id="<?= $row['package_id'];?>"><?= $status ?></button>
                </div>
            <?php endif; ?>
            <div class="btn-group">
            <button type="button" class="btn btn-danger btn-flat btnDelete" data-id="<?= $row['package_id'];?>">Delete</button>
            </div>
            
        </td>
    </tr>

<?php endwhile; ?>