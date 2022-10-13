<?php 
include 'include/connect.php';
 ?>
<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Visitor | Jail Management System</title>
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
                                    <h6 class="page-title">Students Record</h6>
                                  <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">List of students <i class="mdi mdi-arrow-down"></i></a></li>
                                       
                                    </ol> 
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="text-center">
                                     <ol class="breadcrumb float-sm-right">
                                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                                      <li class="breadcrumb-item active">Students</li>
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
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>First name</th>
                                                    <th>Middle name</th>
                                                    <th>Last name</th>
                                                    <th>Year level</th>
                                                    <th>Section</th>
                                                    <th>Contact no.</th>
                                                    <th>Gender</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $page = 'students';
                                                $i = 1;
                                                $visitor = mysqli_query($conn,"select * from tbl_user where role_id = 2") or die (mysqli_error($conn));
                                                while($rowVisitor = mysqli_fetch_assoc($visitor)) {
                                                $id = $rowVisitor['id'];

                                                 ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $rowVisitor['fname'] ?></td>
                                                    <td><?php echo $rowVisitor['mname'] ?></td>
                                                    <td><?php echo $rowVisitor['lname'] ?></td>
                                                    <td><?php echo $rowVisitor['year_level'] ?></td>
                                                    <td><?php echo $rowVisitor['section'] ?></td>
                                                    <td><?php echo $rowVisitor['contact_no'] ?></td>
                                                    <td><?php echo $rowVisitor['gender'] ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                        <!--  <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"  data-bs-toggle="modal"
                                                        data-bs-target="#edit<?php echo $id ?>">
                                                         <i class="dripicons dripicons-document-edit"> </i> Edit
                                                    </button> -->
                                                   <button type="button" class="btn btn-danger btn-sm waves-effect waves-light"  data-bs-toggle="modal"
                                                        data-bs-target="#delete<?php echo $id ?>">
                                                         <i class="ti ti-trash"> </i> Delete
                                                    </button>
                                                        </div>
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
    </body>
</html>
