<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php
                                include('../../api/Classes/config.php');
                                echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM user_table WHERE user_priviledge = '0'"));
                             ?>
                            </h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        Good Work 
                    </a>
                    </div>
				</div>
				<div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                            <?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM request_package WHERE package_status = '5'")); ?>
                            </h3>
                            <p>Requested Package</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="index.php?page=rqst-mgmt" class="small-box-footer">
                        More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
				</div>				
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= mysqli_num_rows(mysqli_query($con, "SELECT * FROM book_table WHERE book_status = 1")) ?></h3>
                            <p>Bookings</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
								</div>
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= mysqli_num_rows(mysqli_query($con, "SELECT * FROM message_table WHERE category = 1 AND status = 1")) ?></h3>
                            <p>Inquiries</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="index.php?page=view-inq" class="small-box-footer">
                        More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
								</div>
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= mysqli_num_rows(mysqli_query($con, "SELECT * FROM package_table")) ?></h3>
                            <p>Total Packages</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="index.php?page=pck-mgmt" class="small-box-footer">
                        More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
								</div>
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= mysqli_num_rows(mysqli_query($con, "SELECT * FROM message_table WHERE category = 2 AND status = 1")) ?></h3>
                            <p>Issue Raised</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="index.php?page=view-iss" class="small-box-footer">
                        More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>