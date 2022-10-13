<?php 
include 'include/connect.php';
date_default_timezone_set('Asia/Manila');
$attendance = '';
$today = '';

if(isset($_GET['status'])) {
}
if(isset($_GET['filter'])){
  $today = $_GET['filter'];
}

 ?>
<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Attendance | ODMS Enterprises</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/logo.png">
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
                                    <h6 class="page-title"><i class="ti ti-clipboard"></i> Attendance Record</h6>
                                  <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">List of Attendance Record <i class="mdi mdi-arrow-down"></i></a></li>
                                       
                                    </ol> 
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="text-center">
                                                    <!-- Satic modal -->
                                                    <!-- <a href="inmate_release_print.php" type="button" class="btn btn-primary waves-effect waves-light">
                                                        <i class="ion ion-md-print"></i> Print
                                                    </a> -->
                                                <?php if($role == '2' || $role =='1') { ?>
                                                   <!--  <button type="button" class="btn btn-primary waves-effect waves-light"  data-bs-toggle="modal"
                                                        data-bs-target="#time_in">
                                                         <i class="mdi mdi-timer"> </i> Add Attendance
                                                    </button> -->
                                                    <div class="col-md-12">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-timer"></i> Add Attendance <span class="mdi mdi-chevron-down"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#time_in">Add Time In</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#time_out">Add Time Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                                    <?php include 'time_inModal.php'; ?>
                                                    <?php include 'time_outAddModal.php'; ?>
                                                    
                                                <?php } ?>
                                                <!-- <?php if($role == '2') { ?>
                                                     <ol class="breadcrumb float-sm-right">
                                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                                      <li class="breadcrumb-item active">Lecture</li>
                                    </ol>
                                                <?php } ?> -->
                                         </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                       <h3 class="card-title">Attendance Table for <b><?php echo date('F d, Y', strtotime($today)) ?></b></h3>
                                    </div>
                                    <div class="card-body">
                                          <?php if (isset($_SESSION['error'])) { ?>
                  <div class="alert alert-warning text-center alert-dismissible  fade show text-center" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
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
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Employee Name</th>
                                                    <th>Site Location</th>
                                                    <th>Date In</th>
                                                    <th>Time In AM</th>
                                                    <th>Time Out AM</th>
                                                    <th>Total Time</th>
                                                    <th>Time In PM</th>
                                                    <th>Time Out PM</th>
                                                    <th>Total Time</th>
                                                    <?php if($role == '1') { ?>
                                                    <th>Action</th>
                                                <?php } ?>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $page = 'attendance';
                                                $i = 1;
                                                $attendance = mysqli_query($conn,"select * from tbl_attendance_log where date_in = '$today' AND user_id = '$user_id'") or die (mysqli_error($conn));
                                                while($attendanceRow = mysqli_fetch_assoc($attendance)) {
                                                $id = $attendanceRow['id'];

                                                $employee = mysqli_query($conn,"select * from tbl_user where id = '".$attendanceRow['user_id']."' ") or die (mysqli_error($conn));
                                                $employeeRow = mysqli_fetch_assoc($employee);
                                                 ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $employeeRow['fname'] ?></td>
                                                    <td><?php echo $attendanceRow['site_location'] ?></td>
                                                    <td><?php echo date('M d, Y',strtotime($attendanceRow['date_in'])) ?>
                                                    </td>
                                                    <td><?php echo date('h:i A',strtotime($attendanceRow['time_in_morning'])) ?>
                                                    </td>
                                                    <td>
                                                    <?php if($attendanceRow['time_out_morning']=='') {
                                                         ?>
                                                    <span> 00:00 AM </span>
                                                    <?php }else { ?>
                                                        <?php echo date('h:i',strtotime($attendanceRow['time_out_morning'])) ?> AM
                                                    <?php } ?>
                                                    </td>
                                                    <td>
                                                       <span class="badge bg-warning"><?php echo $attendanceRow['number_hr_morning'] ?> HRS </span>
                                                    </td>
                                                    <td>
                                                    <?php if($attendanceRow['time_in_afternoon']=='') {
                                                         ?>
                                                    <span> 00:00 PM </span>
                                                    <?php }else { ?>
                                                        <?php echo date('h:i',strtotime($attendanceRow['time_in_afternoon'])) ?> PM
                                                    <?php } ?>
                                                    </td>
                                                    <td>
                                                       <?php if($attendanceRow['time_out_afternoon']=='') {
                                                         ?>
                                                    <span> 00:00 PM </span>
                                                    <?php }else { ?>
                                                        <?php echo date('h:i',strtotime($attendanceRow['time_out_afternoon'])) ?> PM
                                                    <?php } ?>
                                                    </td>
                                                    <td>
                                                       <span class="badge bg-warning"><?php echo $attendanceRow['number_hr_afternoon'] ?> HRS </span>
                                                    </td>
                                                    <?php if($role == '1') { ?>
                                                    <td>
                                                <div class="btn-group">
                                                     <?php if($role == '1') { ?>
                                                   <button type="button" class="btn btn-danger btn-sm waves-effect waves-light"  data-bs-toggle="modal"
                                                        data-bs-target="#delete<?php echo $id ?>">
                                                         <i class="ti ti-trash"> </i> Delete
                                                    </button>
                                                </div>
                                                    </td>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </tr>
                                                <?php 
                                                include 'time_outAddModal.php';
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
    </body>
</html>
