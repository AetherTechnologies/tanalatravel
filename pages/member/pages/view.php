<style>
  .timeline-item{
    cursor: pointer;
  }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 id="packageName">Timeline</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">View Packages</a></li>
              <li class="breadcrumb-item active" id="breadCrumb" ></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Package Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Itinerary</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <div class="row mb-5">
                    <div class="col-md-5" id="location"></div>
                    <div class="col-md-2" id="daysStay"></div>
                    <div class="col-md-5">
                      <div id="map" style="height: 400px"></div>
                    </div>
                  </div>
                  <div class="row m-5">
                    <div class="col-md-7" id="description">
                      Description
                    </div>
                    <div class="col-md-5 px-5">
                    <h2 id="pricePack"></h2>
                      <button class="btn btn-info btn-block" type="button" id="reserve" >Reserve Package</button>
                    </div>
                  </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->

            <h1>Itinerary</h1>
            <div class="row">
            
            <div class="col-md-6 mb-5">
                <div id="mapIterinary" style="height: 500px;width: 100%"></div>
              </div>
              <div class="col-md-6">
                <div class="timeline" id="timeline">
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
       
        
        
      </div>
      <!-- /.timeline -->
      <div class="modal fade" id="ReservePackage">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Reserve Package</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id='configSet'>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbSmW0o0udL-0Kkllfh2ntL72mIi6loC8&callback=initMap&libraries=&v=weekly" defer></script>