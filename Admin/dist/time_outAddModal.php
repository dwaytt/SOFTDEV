<?php
date_default_timezone_set('Asia/Manila');
$date = date('m/d/Y h:i:s a', time());
 ?> 
   <!-- sample modal content -->
<div id="time_out" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
<form  enctype="multipart/form-data" method="POST" action="attendanceAdd.php" class="needs-validation" novalidate>
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><i class="mdi mdi-plus-circle"> </i> Time Out </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
 <div class="modal-body">
  <div class="row mb-3">
    <div class="col-md-12 position-relative">
          <div class="form-group">
             <label for="validationTooltip01" style="float: left" class="mb-2">Option <span style="color:red;">*</span></label>
          </div>
    </div>
    <div class="col-md-4 position-relative">
          <div class="form-group">
            <label class="custom-control custom-radio custom-control-inline">
                            <input required="" type="radio" class="custom-control-input" name="time_in_option" value="Morning" >
                            <span class="custom-control-label">Time Out Morning</span>
                          </label>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
  </div>
  <input type="hidden" name="today" value="<?php echo $today ?>">
  <input type="hidden" name="id" value="<?php echo $user_id ?>">
  <input type="hidden" name="date_in" value="<?php echo date('Y-m-d H:i:s') ?>">

  <div class="col-md-4 position-relative">
          <div class="form-group">
           <label class="custom-control custom-radio custom-control-inline">
                            <input required="" type="radio" class="custom-control-input" name="time_in_option" value="Afternoon">
                            <span class="custom-control-label">Time Out Aftenoon</span>
                          </label>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
          </div>
   </div>

   <div class="row mb-3">
   <div class="col-md-12 position-relative">
          <div class="form-group">
            <label for="validationTooltip01" style="float: left" class="mb-2">Time In <span style="color:red;">*</span></label>
            <input type="time" name="time_in" value="<?php echo date('H:i') ?>" class="form-control" readonly style="color:#888;">
            
          </div>
     </div>
   </div>

</div>
         <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"><i class="mdi mdi-close"></i> No</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_out"><i class="mdi mdi-check-bold"></i> Yes</button>
         </div>
     </div>
            <!-- /.modal-content -->
   </div>
           <!-- /.modal-dialog -->
</form>
  </div>
    <!-- /.modal -->