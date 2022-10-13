<?php 
include 'include/connect.php';
 ?>
<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Leave | ODMS Enterprises</title>
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
                                    <h6 class="page-title"><i class="mdi mdi-airplane-takeoff mdi-18px"></i> Leave Record</h6>
                                  <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">List of Leave Record <i class="mdi mdi-arrow-down"></i></a></li>
                                       
                                    </ol> 
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="text-center">
                                                    <!-- Satic modal -->
                                                    <!-- <a href="inmate_release_print.php" type="button" class="btn btn-primary waves-effect waves-light">
                                                        <i class="ion ion-md-print"></i> Print
                                                    </a> -->
                                                <?php if($role == '2') { ?>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light"  data-bs-toggle="modal"
                                                        data-bs-target="#leave">
                                                         <i class="mdi mdi-timer"> </i> Compose Leave
                                                    </button>
                                                    <?php include 'leaveAddModal.php'; ?>
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
                                    <div class="card-body">
                                          <?php if (isset($_SESSION['error'])) { ?>
                  <div class="alert alert-warning alert-dismissible  fade show text-center" role="alert">
                    <?php echo $_SESSION['error']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
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
                                                    <th>Full name</th>
                                                    <th>Reason</th>
                                                    <th>Start date</th>
                                                    <th>End date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $page = 'leave';
                                                $i = 1;
                                                if($role=='2') {
                                                $leave = mysqli_query($conn,"select * from tbl_leave where user_id = '$user_id'") or die (mysqli_error($conn));
                                            }elseif ($role=='1') {
                                                 $leave = mysqli_query($conn,"select * from tbl_leave") or die (mysqli_error($conn));
                                            }
                                                while($leaveRow = mysqli_fetch_assoc($leave)) {
                                                $id = $leaveRow['id'];

                                                $employee = mysqli_query($conn,"select * from tbl_user where id = '".$leaveRow['user_id']."' ") or die (mysqli_error($conn));
                                                $employeeRow = mysqli_fetch_assoc($employee);
                                                 ?>
                                                <tr>
                                                    <td><?php echo $leaveRow['id'] ?></td>
                                                    <td><?php echo $employeeRow['fname'] ?> <?php echo $employeeRow['mname'] ?> <?php echo $employeeRow['lname'] ?></td>
                                                    <td>
                                                        <?php echo $leaveRow['reason'] ?>
                                                    </td>
                                                    <td><?php echo date('F d, Y',strtotime($leaveRow['start_date'])) ?>
                                                    </td>
                                                    <td><?php echo date('F d, Y',strtotime($leaveRow['end_date'])) ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($leaveRow['status']=='Pending') {
                                                         ?>
                                                         <span class="badge bg-warning">Pending</span>
                                                        <?php }elseif($leaveRow['status']=='Approved') { ?>
                                                        <span class="badge bg-success">Approved</span>
                                                    <?php }else { ?>
                                                        <span class="badge bg-danger">Rejected</span>
                                                    <?php } ?>
                                                    </td>
                                                    <td>
                                                    <div class="btn-group">
                                                <?php if($role=='1') { ?>
                                                    <button type="button" class="btn btn-info btn-sm waves-effect waves-light"  data-bs-toggle="modal"
                                                        data-bs-target="#status<?php echo $id ?>">
                                                         <i class="ti ti-exchange-vertical"> </i> Change Status
                                                    </button>
                                                <?php } ?>
                                                   <button type="button" class="btn btn-danger btn-sm waves-effect waves-light"  data-bs-toggle="modal"
                                                        data-bs-target="#delete<?php echo $id ?>">
                                                         <i class="ti ti-trash"> </i> Delete
                                                    </button>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                include 'leave_changeStatusModal.php';
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

        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

        <script type="text/javascript">
            CKEDITOR.replace('editor')
        </script>
    </body>
</html>
