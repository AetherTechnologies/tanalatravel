<?php
  $ID = $_SESSION['ID'];
  $fetchData = mysqli_query($con, "SELECT user_info_table.user_address, user_info_table.user_contact, user_table.user_fullname,user_table.user_email FROM user_info_table 
                                      INNER JOIN user_table ON user_table.user_id = user_info_table.user_id WHERE user_info_table.user_id = '$ID'");
  $fetchUser = mysqli_fetch_assoc($fetchData);

  if(isset($_POST['updateInfo'])){
    $Name = mysqli_real_escape_string($con, $_POST['fullName']);
    $address = mysqli_real_escape_string($con,$_POST['userAddress']);
    $contact = mysqli_real_escape_string($con,$_POST['contactNumber']);
    if(!empty($Name)){
      $z = mysqli_query($con, "UPDATE user_table SET user_fullname = '$Name' WHERE user_id = '$ID'");
    }
    if(!empty($address) && !empty($contact)){
      $y = mysqli_query($con, "UPDATE user_info_table SET user_address = '$address', user_contact = '$contact' WHERE user_id = '$ID'");
    }
    echo "<meta http-equiv='refresh' content='0'>";
  }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Personal Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Personal Information</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Personal Information</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <form method="POST">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" value="<?= $fetchUser['user_fullname'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fullName">Email</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Full Name" value="<?= $fetchUser['user_email'] ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Contact" value="<?= $fetchUser['user_contact'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="userAddress">User Address</label>
                        <input type="text" class="form-control" id="userAddress" name="userAddress" placeholder="Address" value="<?= $fetchUser['user_address'] ?>" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="Submit" name="updateInfo" class="btn btn-success btn-md">Update</button>
                </div>
                <!-- /.card-footer-->
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>