<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inquiries</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Inquiries</li>
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
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inquiries</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                    <tbody>
                    <?php include('process/messages.process.php'); ?>
                    </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
                </div>
                <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="ViewMessage">
        <div class="modal-dialog modal-xl my-0" style="width: 100%; height:100%; padding:0;">
          <div class="modal-content" style="height: auto;min-height: 100%; border-radius:0;">
            <div class="overlay d-none justify-content-center align-items-center" id="iterinaryOverlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title" id="message_title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="message_content">
            <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5 id="message-From"></h5>
                <h6>
                  <span class="mailbox-read-time float-right" id="message-date"></span></h6>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message" id="message-content">
                
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-footer -->
            <div class="card-footer">
              <button type="button" class="btn btn-default btn-dlt" id="delete"><i class="far fa-trash-alt"></i> Delete</button>
            </div>
            <!-- /.card-footer -->
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
      <!-- /.modal -->
    </section>
    <!-- /.content -->
  </div>