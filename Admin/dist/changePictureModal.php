<?php
date_default_timezone_set('Asia/Manila');
 ?> 
   <!-- sample modal content -->
<div id="add" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
<form  enctype="multipart/form-data" method="POST" action="moduleAdd.php" class="needs-validation" novalidate>
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><i class="mdi mdi-plus-circle"> </i> Add Module </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
 <div class="modal-body">
  <div class="row mb-3">
    <div class="col-md-12 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Module Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="validationTooltip01" name="module_name" required>
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
          <div class="form-group search_select_box">
              <label for="validationTooltip01" style="float: left" class="mb-2">Upload module <span style="color:red;">*</span></label>
             <input type="file" class="form-control" id="validationTooltip01" name="module" required>
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
    <div class="col-md-12 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Subject <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="validationTooltip01" name="subject" value="Programming 1" readonly>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                  <div class="invalid-tooltip">
                        Please provide a valid subject.
                  </div>
              </div>
          </div>
   </div>
</div>
         <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"><i class="mdi mdi-close"></i> Close</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_module"><i class="mdi mdi-check-bold"></i> Save</button>
         </div>
     </div>
            <!-- /.modal-content -->
   </div>
           <!-- /.modal-dialog -->
</form>
  </div>
    <!-- /.modal -->