<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fixed Layout</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Layout</li>
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
                <h3 class="card-title">Title</h3>
              </div>
              <div class="card-body">
              <table id="requestsTB" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Requested By</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include("process/processRequests.php"); ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <div class="modal fade" id="preview">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
            <form id="preview-edit" method="POST">
              <div class="modal-header">
                <h4 class="modal-title">This Is For Package Name</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="PackageName">Package Name</label>
                              <input type="text" name="PackageName" class="form-control" id="PackageName" placeholder="Address" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="PackagePrice">Package Price</label>
                              <input type="text" name="PackagePrice" class="form-control" id="PackagePrice" placeholder="Price" required>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Inclusion</label>
                              <select class="select2" id="inclusionEdit" name="inclusion[]" multiple="multiple" data-placeholder="Select an Inclusion" style="width: 100%;" autocomplete="off" required>
                              </select>
                          </div>
                      </div>
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
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" id="save">Save changes</button>
              </div>                
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </section>
    <!-- /.content -->
  </div>