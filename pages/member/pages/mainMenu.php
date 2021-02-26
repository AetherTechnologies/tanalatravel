<div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2 text-center">
          <div class="col-sm-12">
            <h1 class="mx-auto text-dark"> Available Packages <small>(New)</small></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <div class="content">
      <div class="container">
      <div class="row justify-content-center">
        <form class="search-form col-md-6 mb-4" id="searchPackage" method="POST">
            <div class="input-group">
              <input type="text" name="packageSearch" class="form-control" placeholder="Search Location">

              <div class="input-group-append">
                <button type="submit" name="submitSearch" class="btn btn-warning"><i class="fas fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
      </div>
      <div class="row justify-content-center">
          <?php include('process.member/packagesNormal.php'); ?>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>