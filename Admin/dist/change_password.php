<?php 
include 'include/connect.php';


 ?>

<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Change password | ODM Enterprises</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/login_logo.png">
        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    
        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    
    </head>

    <!-- <body data-sidebar="dark"> -->
        <body data-sidebar="colored">
        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php ?>
                 <!-- ========== Header Start ========== -->
            <?php include 'include/header.php' ?>
             <!-- ========== Header Start ========== -->

             <!-- ========== Left Sidebar Start ========== -->
            <?php include 'include/sidebar.php' ?>
            <!-- ========== Left Sidebar Start ========== -->


            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">My profile</h6>
                                  <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">My profile <i class="mdi mdi-arrow-down"></i></a></li>
                                       
                                    </ol> 
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="text-center">
                                                    <!-- Satic modal -->
                                                    <!-- <a href="inmate_release_print.php" type="button" class="btn btn-primary waves-effect waves-light">
                                                        <i class="ion ion-md-print"></i> Print
                                                    </a> -->
                                                
                                                     <ol class="breadcrumb float-sm-right">
                                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                                      <li class="breadcrumb-item active">My_profile</li>
                                    </ol>
                                              
                                         </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                          <?php if (isset($_SESSION['error'])) { ?>
                  <div class="alert alert-warning text-center">
                    <?php echo $_SESSION['error']; ?>
                  </div>
                  <?php }
                  unset($_SESSION['error']);
                  ?>

                <?php if (isset($_SESSION['success'])) { ?>
                  <div class="alert alert-success alert-dismissible  fade show text-center" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    <?php echo $_SESSION['success']; ?>

                  </div>
                  <?php }
                  unset($_SESSION['success']);
                  ?>
<?php
    $teacher = mysqli_query($conn,"select * from tbl_user where id = $user_id") or die (mysqli_error($conn));
while($rowTeacher = mysqli_fetch_assoc($teacher)) {
    $school_id = $rowTeacher['users_id'];
    $fname = $rowTeacher['fname'];
    $mname = $rowTeacher['mname'];
    $lname = $rowTeacher['lname'];
    $position_id = $rowTeacher['position_id'];
    $contact_no = $rowTeacher['contact_no'];
    $gender = $rowTeacher['gender'];
    $address = $rowTeacher['address'];
    $profile_pic = $rowTeacher['profile_pic'];
    $branch = $rowTeacher['branch'];

    $work_position = mysqli_query($conn,"select * from tbl_work_position where id = '".$rowTeacher['position_id']."'") or die (mysqli_error($conn));
    $positionRow = mysqli_fetch_assoc($work_position);
}
 ?>
        <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <?php if($role == '1') { ?>
             <?php if($profile_pic != '') { ?>
              <!-- <img src="profile_pic/<?php echo $profile_pic ?>" alt="Profile" class="rounded-circle" height="100" width="100"> -->
           <?php }else { ?>
            <img src="profile_pic/25-avatar.png" alt="Profile" class="rounded-circle" height="100" width="100">
           <?php } ?>
         <?php } ?>

            <?php if($role == '2') { ?>
            <?php if($profile_pic != '') { ?>
              <img src="profile_pic/<?php echo $profile_pic ?>" alt="Profile" class="rounded-circle" height="100" width="100">
            <?php }else { ?>
            <img src="profile_pic/25-student_avatar.jpg" alt="Profile" class="rounded-circle" height="100" width="100">
           <?php } ?>
            <?php } ?>

              <h3 class="mt-3"><?php echo $fullname ?></h3>
              <?php if($role == '1') { ?>
              <h4>(Human Resources)</h4>
              <?php }elseif($role == '2') { ?>
                <h4>(Employee)</h4>
              <?php } ?>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
<form action="passwordEdit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user_id ?>">
              <div class="row">
                <div class="col-md-12 form-group mb-3">  
                  <label for="validationCustomUsername" class="form-label">User ID</label>
                    <div class="input-group has-validation">
                     <span class="input-group-text" id="inputGroupPrepend">U</span>
                         <input type="text" class="form-control" readonly id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="users_id" value="<?php echo $school_id ?>">
                      <div class="invalid-feedback">
                            Please choose a username.
                         </div>
                     </div>
                 </div>  
                <div class="col-md-12 form-group">  
                  <label for="validationCustomUsername" class="form-label">Password</label>
                    <div class="input-group has-validation">
                     <span class="input-group-text" id="inputGroupPrepend">P</span>
                         <input type="password" class="form-control" id="password" aria-describedby="inputGroupPrepend" name="password">
                      <div class="invalid-feedback">
                            Please choose a username.
                         </div>
                     </div>
                 </div>
             <div class="modal-footer col-md-12">
            <button type="submit" class="btn btn-primary waves-effect waves-light col-md-12" name="btn_password"><i class="mdi mdi-check-bold"></i> Save</button>
            </div> 
             </div>
         </form>
            </div>
          </div>
      </div>

      <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
             
              <div class="tab-content pt-2">
<form action="passwordEdit.php" method="post" enctype="multipart/form-data">
       <div class="tab-pane fade show active profile-overview" id="profile-overview">
        <input type="hidden" name="id" value="<?php echo $user_id ?>">
             <div class="row mb-4">
                 <div class="col-md-4 form-group">  
                  <label for="validationCustomUsername" class="form-label">First name</label>
                    <div class="input-group has-validation">
                     <span class="input-group-text" id="inputGroupPrepend">F</span>
                         <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="fname" value="<?php echo $fname ?>">
                      <div class="invalid-feedback">
                            Please choose a username.
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4 form-group">  
                  <label for="validationCustomUsername" class="form-label">Middle name</label>
                    <div class="input-group has-validation">
                     <span class="input-group-text" id="inputGroupPrepend">M</span>
                         <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="mname" value="<?php echo $mname ?>">
                      <div class="invalid-feedback">
                            Please choose a username.
                         </div>
                     </div>
                 </div>

                <div class="col-md-4 form-group">  
                  <label for="validationCustomUsername" class="form-label">Last name</label>
                    <div class="input-group has-validation">
                     <span class="input-group-text" id="inputGroupPrepend">L</span>
                         <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="lname" value="<?php echo $lname ?>">
                      <div class="invalid-feedback">
                            Please choose a username.
                         </div>
                     </div>
                 </div>               
             </div>
             <div class="row mb-4">
                 <div class="col-md-4 form-group">  
                  <label for="validationCustomUsername" class="form-label">Position</label>
                    <div class="input-group has-validation">
                     <span class="input-group-text" id="inputGroupPrepend">Y</span>
                         <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="position_id" value="<?php echo $positionRow['position'] ?>">
                      <div class="invalid-feedback">
                            Please choose a username.
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4 form-group">  
                  <label for="validationCustomUsername" class="form-label">Contact number</label>
                    <div class="input-group has-validation">
                     <span class="input-group-text" id="inputGroupPrepend">C</span>
                         <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="contact_no" value="<?php echo $contact_no ?>">
                      <div class="invalid-feedback">
                            Please choose a username.
                         </div>
                     </div>
                 </div>

                <div class="col-md-4 form-group">  
                  <label for="validationCustomUsername" class="form-label">Gender</label>
                    <div class="input-group has-validation">
                     <span class="input-group-text" id="inputGroupPrepend">G</span>
                         <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="gender" value="<?php echo $gender ?>">
                      <div class="invalid-feedback">
                            Please choose a username.
                         </div>
                     </div>
                 </div>               
             </div>

             <div class="row mb-4">
                 <div class="col-md-6 form-group">  
                  <label for="validationCustomUsername" class="form-label">Branch</label>
                    <div class="input-group has-validation">
                     <span class="input-group-text" id="inputGroupPrepend">S</span>
                         <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="branch" value="<?php echo $branch ?>">
                      <div class="invalid-feedback">
                            Please choose a username.
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 form-group">  
                  <label for="validationCustomUsername" class="form-label">Address</label>
                    <div class="input-group has-validation">
                     <span class="input-group-text" id="inputGroupPrepend">A</span>
                         <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="address" value="<?php echo $address ?>">
                      <div class="invalid-feedback">
                            Please choose a username.
                         </div>
                     </div>
                 </div>       
             </div>
                    
        <div class="row">
             <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_profile"><i class="mdi mdi-check-bold"></i> Save</button>
            </div> 
        </div>
         </div>
     </form>
            </div>
          </div>
      </div>
    </div>
   
  </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                 <?php include 'include/footer.php' ?>
              


            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <?php include 'include/settings.php' ?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


               <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->

        <script src="assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="assets/js/pages/form-validation.init.js"></script>

        <script src="assets/js/app.js"></script>
    </body>
</html>
