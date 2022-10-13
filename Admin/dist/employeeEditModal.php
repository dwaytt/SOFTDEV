<?php
date_default_timezone_set('Asia/Manila');
 ?> 
   <!-- sample modal content -->
<div id="edit<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
<form  enctype="multipart/form-data" method="POST" action="employeeEdit.php" class="needs-validation" novalidate>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><i class="mdi mdi-plus-circle"> </i> Edit Employee </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

  <input type="hidden" name="id" value="<?php echo $rowEmployee['id'] ?>">
 <div class="modal-body">
  <div class="row mb-3">
    <div class="col-md-4 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">First Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="validationTooltip01" name="fname" value="<?php echo $rowEmployee['fname'] ?>">
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
                <input type="text" class="form-control" id="validationTooltip01" name="mname" value="<?php echo $rowEmployee['mname'] ?>">
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
                <input type="text" class="form-control" id="validationTooltip01" name="lname" value="<?php echo $rowEmployee['lname'] ?>">
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module name.
                  </div>
              </div>
     </div>
   </div>
<!--    <div class="row mb-3">
        <div class="col-md-12 position-relative">
          <div class="form-group search_select_box">
              <label for="validationTooltip01" style="float: left" class="mb-2">Upload picture <span style="color:red;">*</span></label>
             <input type="file" class="form-control" id="validationTooltip01" name="profile_pic" required>
               <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid module.
                  </div>    
              </div>
        </div> 
   </div> -->

   <div class="row mb-3">
    <div class="col-md-6 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Position <span style="color:red;">*</span></label>
                <select class="form-control" name="position" required>
                  <option value="<?php echo $rowPosition['position'] ?>"><?php echo $rowPosition['position'] ?></option>
                  <option value="Web developer">Web developer</option>
                  <option value="Software Engineer">Software Engineer</option>
                  <option value="Technical Support">Technical Support</option>
                  <option value="Technical Designer">Technical Designer</option>
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
              <label for="validationTooltip01" style="float: left" class="mb-2">Branch <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="validationTooltip01" name="branch" value="<?php echo $rowEmployee['branch'] ?>">
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
                <input type="email" class="form-control" id="validationTooltip01" name="email" value="<?php echo $rowEmployee['email'] ?>">
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
                <input type="number" class="form-control" id="validationTooltip01" name="contact_no" value="<?php echo $rowEmployee['contact_no'] ?>">
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
                <input type="text" class="form-control" id="validationTooltip01" name="address" value="<?php echo $rowEmployee['address'] ?>">
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
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_edit"><i class="mdi mdi-check-bold"></i> Save</button>
         </div>
     </div>
            <!-- /.modal-content -->
   </div>
           <!-- /.modal-dialog -->
</form>
  </div>
    <!-- /.modal -->