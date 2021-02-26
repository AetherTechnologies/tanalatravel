<?php 
    include("../../api/Classes/config.php");
    $a = mysqli_query($con, "SELECT * FROM message_table WHERE category = 2 ORDER BY status ASC");
    while($x = mysqli_fetch_assoc($a)): 
        $userID = $x['user_id'];
        $y = mysqli_query($con, "SELECT * FROM user_table WHERE user_id = '$userID'");
        $b = mysqli_fetch_assoc($y);
        $c = $x['status'];
        $status = "";
        switch($c){
            case 1:
                $status = '<span class="badge badge-success status-badge sts-badge" id="sts_'.$x['message_id'].'">New!</span>';
                break;
            case 2:
                $status = '<span class="badge badge-primary status-badge sts-badge" id="sts_'. $x['message_id'] .'">Seen</span>';
                break;
        }
?>            
                    <tr class="td-hd" data-id="<?= $x['message_id']?>">
                        </td>
                        <td class="mailbox-star"><a><i class="fas fa-star text-warning"></i></a></td>
                        <td class="mailbox-name"><a><?= $b['user_fullname']; ?></a></td>
                        <td class="mailbox-subject"><b><?= $x['message_title']; ?></b>
                        </td>
                        <td class="mailbox-attachment"></td>
                        <td class="mailbox-date"><?= $status ?></td>
                    </tr>

<?php endwhile; ?>