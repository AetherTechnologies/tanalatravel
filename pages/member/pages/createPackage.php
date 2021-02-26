
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Tour Package</li>
                        <li class="breadcrumb-item active">Create Package</li>
                    </ol>
                </div>
            </div> 
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Package</h3>
                    </div>
                    <form id="CreatePackage" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="PackageName">Package Name</label>
                                            <input type="text" name="PackageName" class="form-control" id="PackageName" placeholder="Package Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Date and time range:</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input type="text" name="date" class="form-control float-right" id="reservationtime">
                                            </div>
                                            <!-- /.input group -->
                                            </div>
                                        
                                    </div>
                                    <div class="col-md-7">
                                        <div id="map" style="height: 450px"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="Tours">Tours</label>
                                            <table id="locationView" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Location</th>
                                                        <th>Action</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php include("process.member/populateTableUser.php"); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12" id="PopulateAdd">

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button class="btn btn-primary" type="submit" id="a" name="Add">Request Package</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ReservePackage">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Reserve Package</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" id="config">
                <div id="configSet">
                
                </div>
                <button class="btn btn-success btn-sm" type="submit">Confirm</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbSmW0o0udL-0Kkllfh2ntL72mIi6loC8&callback=initMap" defer></script>