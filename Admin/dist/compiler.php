    <?php 
    include 'include/connect.php';
     $content = mysqli_query($conn,"select * from tbl_content") or die (mysqli_error($conn));
                                    while($row = mysqli_fetch_assoc($content)) {
                                     $editor = $row['editor'];
                                     $id = $row['id'];
                }
     ?>
    <!doctype html>
    <html lang="en">

        <head>
        
            <meta charset="utf-8">
            <title>Compiler | E-Learning System for CCSICT</title>
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
            <script src="ckeditor/ckeditor.js"></script>
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
                                        <h6 class="page-title">C++ Compiler</h6>
                                       <ol class="breadcrumb m-0">
                                         <?php if($role == '1') { ?>
                                            <li class="breadcrumb-item"><a href="#">Compile your here <i class="mdi mdi-arrow-down"></i></a></li>
                                           <?php }else { ?>
                                            <li class="breadcrumb-item"><a href="#">Compile your code here <i class="mdi mdi-arrow-down"></i></a></li>
                                            <?php } ?>
                                        </ol> 
                                    </div>
                                    <div class="col-md-4">
                                        <div class="float-end d-none d-md-block">
                                            <div class="text-center">
                                                        <!-- Satic modal -->
                                         <ol class="breadcrumb float-sm-right">
                                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                                          <li class="breadcrumb-item active">Compiler</li>
                                        </ol>
                                                      
                                             </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                       <iframe width="100%" height="475" src="//www.jdoodle.com/online-compiler-c++/" frameborder="0"></iframe>
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
            <script type="text/javascript">
                CKEDITOR.replace("editor");
            </script>
            <script src="assets/libs/parsleyjs/parsley.min.js"></script>

            <script src="assets/js/pages/form-validation.init.js"></script>

            <script src="assets/js/app.js"></script>
        </body>
    </html>
