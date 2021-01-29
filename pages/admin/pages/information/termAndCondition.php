<?php 
    include('../api/Classes/config.php');
    $a = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM cms_table WHERE cms_for = 'termsAndCondition'"));
?>
    
    <div class="modal fade" id="Terms">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Term And Condition</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <?= $a['cms_content']; ?>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- /.modal -->