<?php 
include 'include/connect.php';
date_default_timezone_set('Asia/Manila');
/*session_start();*/
error_reporting(0);
 ?>
<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Student Log | E-Learning Management System</title>
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
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
                                    <h6 class="page-title">Visitor Log Record</h6>
                                 <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">List of visitor logs <i class="mdi mdi-arrow-down"></i></a></li>
                                </ol>
                                
                                  <!--   <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Veltrix</a></li>
                                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                                    </ol> -->
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="text-center">
                                                    <!-- Satic modal -->
                                                    <!-- <a href="visitor_log_print.php" type="button" class="btn btn-primary waves-effect waves-light">
                                                        <i class="ion ion-md-print"></i> Print
                                                    </a> -->
                                                  <!--   <button type="button" class="btn btn-primary waves-effect waves-light"  data-bs-toggle="modal"
                                                        data-bs-target="#add">
                                                         <i class="mdi mdi-plus-circle"> </i> Add Visitor Log
                                                    </button> -->
                                                    
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
        <form action="logs.php" method="get">
         <div class="row mb-3">
          <div class="form-group col-sm-3">
                                    <label for="clearance" style="font-size: 15px;" class="mb-2">Logs: <span style="color:red;">*</span></label>
                                    <select name="attendance" id="account" class="form-control">
                                      <option disabled selected>Select logs. . .</option>
                                      <?php $customer = mysqli_query($conn,"select DISTINCT status from tbl_students_log") or die(mysqli_error($conn));
                                      while($row=mysqli_fetch_array($customer)) {
                                       ?>
                                      <option value="<?php echo $row['status']; ?>"><?php echo $row['status'] ?></option>
                                      <?php } ?>
                                    </select> 
          
          
          </div>
          <div class="form-group col-sm-3" style="padding-top: 3%">
                  <button class="btn btn-primary btn-sm" type="submit"> <i class="fa fa-search"> </i> Search</button>
          
                  </div>
            </div>
        </form>
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Student name</th>
                                                    <th>Date</th>
                                                    <th>Time in</th>
                                                    <th>Time out</th>
                                                </tr>
                                            </thead>


                                <tbody>
                 <?php 
                          $page = 'log';
                           $i = 1;
                           $attendance=$_GET['attendance'];
                            $logs = mysqli_query($conn,"select * from tbl_students_log where status = '$attendance' ") or die (mysqli_error($conn));
                                while($rowLog = mysqli_fetch_assoc($logs)) {
                                 $id = $rowLog['id'];
                                 $student_id = $rowLog['student_id'];

                            $student = mysqli_query($conn,"SELECT * from tbl_user where id = '$student_id' AND role_id = 2") or die (mysql_error($conn));
                            $rowStudent = mysqli_fetch_assoc($student);

                            ?>
                             <tr>
                             <td><?php echo $i++; ?></td>
                             <td><?php echo $rowStudent['fname'] ?> <?php echo $rowStudent['mname'] ?> <?php echo $rowStudent['lname'] ?></td>
                             <td><?php echo date("F d(D), Y",strtotime($rowLog['date_in'])) ?></td>
                             <td><?php echo date("h:i A",strtotime($rowLog['time_in'])) ?></td>
                             <td>
                                <?php if($rowLog['time_out'] == '') { ?>
                               <span class="badge bg-danger">Not yet</span>
                                    <?php }else { ?>
                                        <?php echo date("h:i A",strtotime($rowLog['time_out'])) ?>
                                    <?php } ?>
                                </td>
                     </tr>
                     <?php 
                       include 'deleteModal.php';
                    } ?>
                          </tbody>
                            </table>

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

        
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="script.js"></script>
    </body>
</html>
