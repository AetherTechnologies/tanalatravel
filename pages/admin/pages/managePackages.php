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
                    <table id="packageList" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Package Name</th>
                                <th>Date Created</th>
                                <th>Inclusions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include("process/processPackage.php"); ?>
                        </tbody>
                    </table>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>