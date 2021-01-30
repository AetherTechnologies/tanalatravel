<?php
include('../../api/Classes/config.php');
$fetchPackage = mysqli_query($con, "SELECT * FROM package_table");
while($package = mysqli_fetch_array($fetchPackage)):
    $packageID = $package['package_id'];
    $packageTime = mysqli_query($con, "SELECT DATE_FORMAT(package_created_date, '%l:%i %p at %b %e,%Y') as Formatted FROM `package_table` WHERE package_id = '$packageID'");
    $Time = mysqli_fetch_assoc($packageTime);
    $stringPhoto = rtrim($package['package_photo'], "|");
    $photoArray = explode("|",$stringPhoto);
    $photoCount = count($photoArray) - 1;
?>
    <div class="col-md-6">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <span class="username"><a href="#"><?= $package['package_name'] ?></a></span>
                    <span class="description">Shared publicly - <?= $Time['Formatted']; ?></span>
                </div>
                    <!-- /.card-tools -->
            </div>
                <!-- /.card-header -->
            <div class="card-body-posts px-5 my-3">
            <?php if($photoCount != null): 
                    $sorceURL = $photoArray[RAND(0,$photoCount)]; ?>
                    <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success text-lg">Available</div>
                      </div>
                <img class="img-fluid pad my-2" src="../../uploads/package/<?= $sorceURL ?>" alt="Photo" style="background-size: cover;">
            <?php endif; ?>
                <div class="row">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-sm"><i class="far fa-circle"></i> Pin</button>
                    <button type="button" class="btn btn-default btn-sm" data-card-widget="collapse"><i class="fas fa-minus"></i> View More</button>
                </div>
            </div>
            <div class="card-body collapse">
                <?= $package['package_description']; ?>
            </div>
        </div>
                <!-- /.card -->
    </div>
<?php endwhile; ?>