
  <!-- sample modal content -->
<div id="schedule" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
<form  enctype="multipart/form-data" method="POST" action="scheduleAdd.php" class="needs-validation" novalidate>
  <div class="modal-dialog modal-md">
    <div class="modal-content"> 
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><i class="mdi mdi-plus-circle"> </i> Add Schedule </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
 <div class="modal-body">
  <div class="row mb-3">
    <div class="col-md-6 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Add Schedule <span style="color:red;">*</span></label>
                <select  required="true" name="time_in_morning" class="form-control" id="validationTooltip01">
                    <option class="text-muted" value="">Select Time In</option>
                    <option value="07:00">07:00 AM</option>
                    <option value="07:30">07:30 AM</option>
                    <option value="08:00">08:00 AM</option>
                </select>
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
              <label for="validationTooltip01" style="float: left" class="mb-2"><span style="color:red;">&nbsp</span></label>
                 <select  required="true" name="time_out_morning" class="form-control" id="validationTooltip01">
                              <option class="text-muted" value="">Select Time Out</option>
                              <option value="11:30">11:30 AM</option>
                              <option value="3:00">3:00 PM</option>
                              <option value="5:00">5:00 PM</option>

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

   <div class="row mb-3">
    <div class="col-md-6 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Schedule <span style="color:red;">*</span></label>
                <select  required="true" name="Sched" class="form-control custom-select">
                    <option class="text-muted" value="">Select Days</option>
                    <option value="M-W-F">M-W-F</option>
                    <option value="T-TH-S">T-TH-S </option>
                    <option value="Weekdays">Weekdays</option>
                </select>
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
              <label for="validationTooltip01" style="float: left" class="mb-2"><span style="color:red;">&nbsp</span></label>
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