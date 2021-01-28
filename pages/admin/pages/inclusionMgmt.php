<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inclusion Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inclusion Management</a></li>
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
                <h3 class="card-title">Inclusions</h3>
                <div class="card-tools">
                  <button type="button" id="addInclusion" data-toggle="modal" data-target="#newInclusion" class="btn btn-success btn-sm">Add Inclusion &nbsp
                    <i class="fas fa-plus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <table id="inclusionTB" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Inclusion Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include("process/processInclusion.php"); ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="modal fade" id="newInclusion">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Inclusion</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" id="AddNewInclusion">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="InclusionName">Inclusion Name</label>
                        <input type="text" name="InclusionName" class="form-control" id="InclusionName" placeholder="Inclusion Name" required />
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  </div>