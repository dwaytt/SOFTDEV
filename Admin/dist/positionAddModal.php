
  <!-- sample modal content -->
<div id="add" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
<form  enctype="multipart/form-data" method="POST" action="positionAdd.php" class="needs-validation" novalidate>
  <div class="modal-dialog modal-md">
    <div class="modal-content"> 
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><i class="mdi mdi-plus-circle"> </i> Add Work Position </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
 <div class="modal-body">
  <div class="row mb-3">
    <div class="col-md-6 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Position <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="validationTooltip01" name="position" required>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
     </div>
     <div class="col-md-6 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Rate per hour <span style="color:red;">*</span></label>
                <input type="number" class="form-control" id="validationTooltip01" name="rate" required>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
     </div>

   </div>
  
         <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"><i class="mdi mdi-close"></i> Close</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_position"><i class="mdi mdi-check-bold"></i> Save</button>
         </div>
     </div>
            <!-- /.modal-content -->
   </div>
           <!-- /.modal-dialog -->
         </div>
</form>
  </div>
    <!-- /.modal -->