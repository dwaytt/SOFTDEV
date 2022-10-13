<?php 
include 'include/connect.php';
date_default_timezone_set('Asia/Manila');

$to = date('Y-m-d');
$from = date('Y-m-d', strtotime('-15 day', strtotime($to)));

if(isset($_GET['range'])){
  $range = $_GET['range'];
  $ex = explode('-', $range);
  $from = date('Y-m-d', strtotime($ex[0]));
  $to = date('Y-m-d', strtotime($ex[1]));
}
 ?>
<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Payroll | ODMS Enterprises</title>
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
                                    <h6 class="page-title"><i class="ti ti-credit-card"></i> Paroll Records</h6>
                                  <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">List of Paroll <i class="mdi mdi-arrow-down"></i></a></li>
                                       
                                    </ol> 
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="text-center">
                                                    <!-- Satic modal -->
                                                    <!-- <a href="inmate_release_print.php" type="button" class="btn btn-primary waves-effect waves-light">
                                                        <i class="ion ion-md-print"></i> Print
                                                    </a> -->
                                               
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
                                        <h3 class="card-title">Payroll From <b><?php echo date('M d, Y', strtotime($from)) ?>&nbsp(<?php echo date('D', strtotime($from)) ?>) </b>To <b><?php echo date('M d, Y', strtotime($to)) ?>&nbsp(<?php echo date('D', strtotime($to)) ?>)</b></h3>
                                    </div>
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
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Employee Name</th>
                                                    <th>Gross Income</th>
                                                    <th>Total Deduction</th>
                                                    <th>Net Income</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $page = 'payroll';
                                                $i = 1;
                                                if($role == '1') {
                                                $attendance = mysqli_query($conn,"SELECT a.*,u.*,u.id,a.user_id,p.* from tbl_attendance_log as a inner join tbl_user as u ON a.user_id = u.id inner join tbl_work_position as p ON p.id = u.position_id where date_in between '$from' AND '$to'");
                                            }elseif($role == '2') {
                                            $attendance = mysqli_query($conn,"SELECT a.*,u.*,u.id,a.user_id,p.* from tbl_attendance_log as a inner join tbl_user as u ON a.user_id = u.id inner join tbl_work_position as p ON p.id = u.position_id where date_in between '$from' AND '$to' AND a.user_id = '$user_id'");
                                            }
                                                $total = 0;
                                                while($attendanceRow = mysqli_fetch_assoc($attendance)) {
                                                $id = $attendanceRow['user_id'];

                                            
                                                
                                                $user_id = $attendanceRow['user_id'];
                                                $total_hr = $attendanceRow['number_hr_morning'] + $attendanceRow['number_hr_afternoon'];
                                                $gross = $attendanceRow['rate'] * $total_hr;
                                                $net_pay = $gross;

                                                $sss_amount = (4.5/100)*$net_pay;
                                                $pd_amount = (2.75/100)*$net_pay;
                                                $p_amount = (2/100)*$net_pay;
                                                $total_deduction = $sss_amount+$pd_amount+$p_amount;
                                                 ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $attendanceRow['fname'] ?> <?php echo $attendanceRow['mname'] ?> <?php echo $attendanceRow['lname'] ?></td>
                                                    <td><?php echo "₱", number_format($gross,2) ?></td>
                                                    <td><?php echo "₱", number_format($total_deduction,2) ?></td>
                                                    <td><?php echo "₱",  number_format($net_pay-$total_deduction,2) ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                                <a href="payslip.php?id=<?php echo $id ?>" type="button" class="btn btn-primary waves-effect waves-light btn-sm">
                                                            <i class="ti ti-eye"></i> Payslip
                                                                </a>
                                                      
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
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
