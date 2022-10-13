<?php
date_default_timezone_set('Asia/Manila');
 ?> 
   <!-- sample modal content -->
<div id="add" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
<form  enctype="multipart/form-data" method="POST" action="employeeAdd.php" class="needs-validation" novalidate>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><i class="mdi mdi-plus-circle"> </i> Add Employee </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
 <div class="modal-body">
  <div class="row mb-3">
    <div class="col-md-4 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">First Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="validationTooltip01" name="fname" required>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
     </div>
     <div class="col-md-4 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Middle Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="validationTooltip01" name="mname" required>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
     </div>

    <div class="col-md-4 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Last Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="validationTooltip01" name="lname" required>
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
          <div class="form-group search_select_box">
              <label for="validationTooltip01" style="float: left" class="mb-2">Gender <span style="color:red;">*</span></label>
             <select name="gender" class="form-control">
              <option disabled selected>Select gender . . . </option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
             </select>
               <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module.
                  </div>    
              </div>
        </div> 
        <div class="col-md-6 position-relative">
          <div class="form-group search_select_box">
              <label for="validationTooltip01" style="float: left" class="mb-2">Date of Birth <span style="color:red;">*</span></label>
            <input type="date" class="form-control" id="validationTooltip01" name="date_of_brith" required>
               <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module.
                  </div>    
              </div>
        </div>
   </div> 

   <div class="row mb-3">
    <div class="col-md-4 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Position <span style="color:red;">*</span></label>
                <select class="form-control" name="position_id" required>
                  <option disabled selected>Select position . . .</option>
                  <?php 
                  $position = mysqli_query($conn,"select * from tbl_work_position");
                  while($rowPosition = mysqli_fetch_assoc($position)) {
                   ?>
                   <option value="<?php echo $rowPosition['id'] ?>"> <?php echo $rowPosition['position'] ?></option>
                  <?php } ?>
                </select>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
     </div>
     <div class="col-md-4 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Branch <span style="color:red;">*</span></label>
                <input type="text" list='listid' class="form-control" id="validationTooltip01" name="branch" required>
                  <datalist id='listid'>
                    <option value='Albay'>
                    <option value='Taguig'>
                  </datalist>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
     </div>
     <div class="col-md-4 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Schedule <span style="color:red;">*</span></label>
                <select class="form-control" name="schedule_id" required>
                  <option disabled selected>Select schedule . . .</option>
                  <?php 
                  $schedule = mysqli_query($conn,"select * from tbl_schedule");
                  while($rowSchedule = mysqli_fetch_assoc($schedule)) {
                   ?>
                   <option value="<?php echo $rowSchedule['id'] ?>"> <?php echo $rowSchedule['time_in_morning'] ?> AM-<?php echo $rowSchedule['time_out_morning'] ?> AM/<?php echo $rowSchedule['Sched'] ?> </option>
                  <?php } ?>
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
     <div class="col-md-4 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Email Address <span style="color:red;">*</span></label>
                <input type="email" class="form-control" id="validationTooltip01" name="email" required>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
     </div>
    <div class="col-md-4 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Phone number <span style="color:red;">*</span></label>
                <input type="number" class="form-control" id="validationTooltip01" name="contact_no" required>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
     </div>
   </div>
   <div class="col-md-4 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Address <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="validationTooltip01" name="address" required>
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
              <label for="validationTooltip01" style="float: left" class="mb-2">Employee ID <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="validationTooltip01" name="users_id" required>
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
              <label for="validationTooltip01" style="float: left" class="mb-2">Password <span style="color:red;">*</span></label>
                <input type="password" class="form-control" id="validationTooltip01" name="password" required>
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
          <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"><i class="mdi mdi-close"></i> Close</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_add"><i class="mdi mdi-check-bold"></i> Save</button>
         </div>
     </div>
            <!-- /.modal-content -->
   </div>
           <!-- /.modal-dialog -->
</form>
  </div>
    <!-- /.modal -->