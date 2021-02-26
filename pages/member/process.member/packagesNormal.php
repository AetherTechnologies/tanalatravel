<?php
include('../../api/Classes/config.php');
if(!isset($_POST['packageSearch'])):
        $fetchPackage = mysqli_query($con, "SELECT * FROM package_table WHERE package_status = 1");
    while($package = mysqli_fetch_array($fetchPackage)):
        $packageID = $package['package_id'];
        $packageTime = mysqli_query($con, "SELECT DATE_FORMAT(package_created_date, '%l:%i %p at %b %e,%Y') as Formatted FROM `package_table` WHERE package_id = '$packageID'");
        $Time = mysqli_fetch_assoc($packageTime);
        $stringPhoto = rtrim($package['package_photo'], "|");
        $photoArray = explode("|",$stringPhoto);
        $photoCount = count($photoArray);
    ?>
        <div class="col-md-6">
            <div class="card card-widget">
                <div class="card-header">
                    <div class="user-block">
                        <span class="username"><a class="view" data-id="<?= $packageID ?>"><?= $package['package_name'] ?></a></span>
                        <span class="description">Shared publicly - <?= $Time['Formatted']; ?></span>
                    </div>
                        <!-- /.card-tools -->
                </div>
                    <!-- /.card-header -->
                <div class="card-body-posts px-5 my-3">
                    <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success text-lg">Available</div>
                    </div>
                <?php if($photoCount != null): 
                        $newCount = $photoCount - 1;
                        $sorceURL = $photoArray[RAND(0,$newCount)]; ?>
                    <img class="img-fluid pad my-2" src="../../uploads/package/<?= $sorceURL ?>" alt="Photo" style="background-size: cover;">
                <?php endif; ?>
                    <div class="row">
                        <a type="button" class="btn btn-default btn-sm mx-3 view" data-id="<?= $packageID ?>"><i class="fas fa-minus"></i> View More</a>
                    </div>
                </div>
            </div>
                    <!-- /.card -->
        </div>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php
if(isset($_POST['submitSearch'])):
        $searchString = mysqli_real_escape_string($con, $_POST['packageSearch']);
        $fetchSearch = mysqli_query($con, "SELECT location_id FROM location_table WHERE location_name LIKE '%$searchString%' OR location_inclusion LIKE '%$searchString%'");
        $query = "";
        if($fetchSearch){
            $fetchData = mysqli_fetch_assoc($fetchSearch);
            $ID = $fetchData['location_id'];
            $query = "SELECT * FROM package_table WHERE package_tours LIKE '%$ID%' AND package_status = 1";
        }else{
            $query = "SELECT * FROM package_table WHERE package_status = 1";
        }
        $fetchPackage = mysqli_query($con, $query);
        while($package = mysqli_fetch_array($fetchPackage)):
            $packageID = $package['package_id'];
            $packageTime = mysqli_query($con, "SELECT DATE_FORMAT(package_created_date, '%l:%i %p at %b %e,%Y') as Formatted FROM `package_table` WHERE package_id = '$packageID'");
            $Time = mysqli_fetch_assoc($packageTime);
            $stringPhoto = rtrim($package['package_photo'], "|");
            $photoArray = explode("|",$stringPhoto);
            $photoCount = count($photoArray);
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
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-success text-lg">Available</div>
                        </div>
                    <?php if($photoCount != null): 
                            $newCount = $photoCount - 1;
                            $sorceURL = $photoArray[RAND(0,$newCount)]; ?>
                        <img class="img-fluid pad my-2" src="../../uploads/package/<?= $sorceURL ?>" alt="Photo" style="background-size: cover;">
                    <?php endif; ?>
                        <div class="row">
                            <button type="button" class="btn btn-default btn-sm mx-3"><i class="fas fa-share"></i> Share</button>
                            <button type="button" class="btn btn-default btn-sm mx-3"><i class="far fa-circle"></i> Pin</button>
                            <a type="button" class="btn btn-default btn-sm mx-3 view" data-id="<?= $packageID ?>"><i class="fas fa-minus"></i> View More</a>
                        </div>
                    </div>
                </div>
                        <!-- /.card -->
            </div>
        <?php endwhile; ?>
    <?php endif; ?>


