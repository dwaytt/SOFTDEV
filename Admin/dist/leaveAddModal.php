<?php
date_default_timezone_set('Asia/Manila');
?>
  <!-- sample modal content -->
<div id="leave" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
<form  enctype="multipart/form-data" method="POST" action="leaveAdd.php" class="needs-validation" novalidate>
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><i class="mdi mdi-plus-circle"> </i> Complose Leave </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
 <div class="modal-body">
  <div class="row mb-3">
    <div class="col-md-12 position-relative">
          <div class="form-group">
            <label for="validationTooltip01" style="float: left" class="mb-2">Type of leave <span style="color:red;">*</span></label>
            <select name="leave_type" class="form-control">
              <option disabled selected>Select . . .</option>
              <option value="Sick">Sick</option>
              <option value="Vacation">Vacation</option>
            </select>
            
          </div>
     </div>
   </div>
   <div class="row mb-3">
    <div class="col-md-6 position-relative">
          <div class="form-group">
            <label for="validationTooltip01" style="float: left" class="mb-2">Start date <span style="color:red;">*</span></label>
            <input type="date" name="start_date" class="form-control">
          </div>
     </div>
     <div class="col-md-6 position-relative">
          <div class="form-group">
            <label for="validationTooltip01" style="float: left" class="mb-2">End date <span style="color:red;">*</span></label>
            <input type="date" name="end_date" class="form-control">
          </div>
     </div>
   </div>
   <div class="row mb-3">
    <div class="col-md-12 position-relative">
          <div class="form-group">
            <label for="validationTooltip01" style="float: left" class="mb-2">Reason of leave <span style="color:red;">*</span></label>
              <textarea id="" name="reason" class="form-control" cols="50" rows="3"></textarea>
          </div>
     </div>

   </div>
  
         <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"><i class="mdi mdi-close"></i> Close</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_leave"><i class="mdi mdi-check-bold"></i> Save</button>
         </div>
     </div>
            <!-- /.modal-content -->
   </div>
           <!-- /.modal-dialog -->
         </div>
</form>
  </div>
    <!-- /.modal -->