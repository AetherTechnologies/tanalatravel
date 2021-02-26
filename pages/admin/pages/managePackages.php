<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Package</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tour Management</a></li>
              <li class="breadcrumb-item active">Manage Package</li>
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
                <h3 class="card-title">Manage Package</h3>
              </div>
              <div class="card-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <table id="packageList" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Package Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include("process/processPackage.php"); ?>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <div class="modal fade" id="IterinaryEdit">
        <div class="modal-dialog modal-xl my-0" style="width: 100%; height:100%; padding:0;">
          <div class="modal-content" style="height: auto;min-height: 100%; border-radius:0;">
            <div class="modal-header">
              <h4 class="modal-title">Tour Editor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row" style="min-height: 80vh;">
                <div class="col-md-6">
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">
                        Tour Order
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="iterinary">
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div id="map"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="EditPackage">
        <div class="modal-dialog modal-xl my-0" style="width: 100%; height:100%; padding:0;">
          <div class="modal-content" style="height: auto;min-height: 100%; border-radius:0;">
          <div class="overlay justify-content-center align-items-center d-none" id="EditLoad">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">Package Editor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="CreatePackage" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="PackageName">Package Name</label>
                                <input type="text" name="PackageName" class="form-control" id="PackageName" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <label for="Price">Package Price In USD</label>
                                <input type="text" name="pricing" class="form-control" id="Price" placeholder="Price" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <label for="LocationPhoto">Upload New Photo</label>
                                  <div class="input-group">
                                      <div class="input-images" id="LocationPhoto" style="width: 100%">
                                          
                                      </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Inclusion</label>
                                <select class="select2" id="Inclusion" name="inclusion[]" multiple="multiple" data-placeholder="Select an Inclusion" style="width: 100%;" autocomplete="off" required>
                                </select>
                            </div>
                    </div>
                    <!-- /.col -->
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Location Description</label>
                          <textarea class="textarea" id="PackageDescription" placeholder="Place some text here" name="description"
                                  style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"  id="AddPackage">Save Changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="IterinaryCreate">
        <div class="modal-dialog modal-xl my-0 modal-dialog-scrollable" style="width: 100%; height:100%; padding:0;">
          <div class="modal-content" style="height: auto;min-height: 100%; border-radius:0;">
            <div class="overlay d-none justify-content-center align-items-center" id="iterinaryOverlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">Iterinary Editor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="DataIterinary">
                
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success btn-lg" type="button" data-dismiss="modal">Done</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="DirectionSelector">
        <div class="modal-dialog modal-xl my-0 modal-dialog-scrollable" style="width: 100%; height:100%; padding:0;">
          <div class="modal-content" style="height: auto;min-height: 100%; border-radius:0;">
            <div class="overlay d-none justify-content-center align-items-center" id="iterinaryOverlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">Direction Editor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="DirectionSimulate">
                <div class="row">
                  <div class="col-md-12">
                    <div id="mapDirect" style="height: 300px"></div>
                  </div>
                </div>
                  <form class="row mt-2">
                    <div class="col-md-6">
                      <label>Start</label>
                      <div class="form-group">
                          <label for="Longhitude">From</label>
                          <input type="text" class="form-control" name="longhitudeEnd" id="StartLocation" placeholder="Longhitude" required>
                      </div>
                      <div class="form-group">
                          <label for="Longhitude">Longhitude</label>
                          <input type="text" class="form-control" name="longhitudeStart" id="LonghitudeStart" placeholder="Longhitude" readonly="readonly">
                      </div>
                      <div class="form-group">
                          <label for="Latitude">Latitude</label>
                          <input type="text" class="form-control" name="latitudeStart" id="LatitudeStart" placeholder="Latitude" readonly="readonly">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>End</label>
                      <div class="form-group">
                          <label for="Longhitude">To</label>
                          <input type="text" class="form-control" name="longhitudeEnd" id="EndLocation" placeholder="Longhitude" required>
                      </div>
                      <div class="form-group">
                          <label for="Longhitude">Longhitude</label>
                          <input type="text" class="form-control" name="longhitudeEnd" id="LonghitudeEnd" placeholder="Longhitude" readonly="readonly">
                      </div>
                      <div class="form-group">
                          <label for="Latitude">Latitude</label>
                          <input type="text" class="form-control" name="latitudeEnd" id="LatitudeEnd" placeholder="Latitude" readonly="readonly">
                      </div>
                    </div>
                  </form>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-info btn-md btnReset" type="button" >Reset</button>
              <button class="btn btn-success btn-md btnPlace" type="button">Place</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>
    <!-- /.content -->
  </div>
  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbSmW0o0udL-0Kkllfh2ntL72mIi6loC8&callback=initMap&libraries=&v=weekly" defer></script>