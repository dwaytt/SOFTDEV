   <!-- sample modal content -->
<div id="status<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
<form  enctype="multipart/form-data" method="POST" action="leave_statusAdd.php">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
      <h5 class="modal-title" id="myModalLabel"><i class="ti ti-exchange-vertical"> </i> Change Status </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
 <div class="modal-body">
  <input type="hidden" name="id" value="<?php echo $id ?>">
   <div class="row mb-3">
    <div class="col-md-12 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Status <span style="color:red;">*</span></label>
                <select class="form-control" name="status" required>
                  <option value="Pending">Select status . . .</option>
                  <option value="Approved">Approve</option>
                  <option value="Rejected">Reject</option>
                </select>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
      </div>
   </div>
</div>
         <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"><i class="mdi mdi-close"></i> No</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_status"><i class="mdi mdi-check-bold"></i> Yes</button>
         </div>
     </div>
            <!-- /.modal-content -->
   </div>
           <!-- /.modal-dialog -->
</form>
  </div>
    <!-- /.modal -->