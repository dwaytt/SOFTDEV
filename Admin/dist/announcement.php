<?php 
include 'include/connect.php';
 ?>
<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Announcement | ODMS Enterprises</title>
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
                                    <h6 class="page-title"><i class="mdi mdi-bullhorn mdi-18px"></i> Anouncement Record</h6>
                                  <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">List of Anouncement <i class="mdi mdi-arrow-down"></i></a></li>
                                       
                                    </ol> 
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                             <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Announcement</h4>
                                        <div class="chat-conversation">
                                            <ul class="conversation-list" data-simplebar style="max-height: 367px;">
                                                <?php
                                                $announcement = mysqli_query($conn,"select * from tbl_announcement") or die (mysqli_error($conn));
                                                if(mysqli_num_rows($announcement)) {
                                                while($announcementRow = mysqli_fetch_assoc($announcement)) {
                                                 ?>
                                                
                                                <li class="clearfix">
                                                    <div class="chat-avatar" style="width: 6%">
                                                        <img src="assets/images/avatar.png"
                                                            class="avatar-xs rounded-circle" alt="male">
                                                       <!--  <span class="time"><?php echo date('h:i A',strtotime($announcementRow['announcement_time'])); ?></span> -->
                                                       <span class="time"><?php echo date('M d, y',strtotime($announcementRow['announcement_date'])); ?></span>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name">HR
                                                             <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right; height: 3px">
                                                            </button> -->
                                                            </span>
                                                            <p>
                                                               <?php echo $announcementRow['announcement_title']; ?>
                                                            </p>
                                                            <span class="time" style="float: right; font-size: 10px"><?php echo date('h:i A',strtotime($announcementRow['announcement_time'])); ?></span>
                                                        </div>

                                                    </div>
                                                </li>
                                                <?php } }else { ?>

                                                    <li class="clearfix">
                                                    <div class="chat-avatar" style="width: 6%">
                                                        <img src="assets/images/avatar.png"
                                                            class="avatar-xs rounded-circle" alt="male">
                                                       <!--  <span class="time"><?php echo date('h:i A',strtotime($announcementRow['announcement_time'])); ?></span> -->
                                                      
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name">HR
                                                             <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right; height: 3px">
                                                            </button> -->
                                                            </span>
                                                            <p class="text-danger">
                                                               The admin not yet posted.
                                                            </p>

                                                        </div>

                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            <?php if($role == '1') { ?>
                                            <form  enctype="multipart/form-data" method="POST" action="announcementAdd.php" class="needs-validation" novalidate>
                                             <div class="row">
                                                <input type="hidden" name="announcement_date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                                <input type="hidden" name="announcement_time" class="form-control" value="<?php echo date('H:i:s') ?>">
                                                <div class="col-sm-9 col-8 chat-inputbar">
                                                    <input type="text" class="form-control chat-input" name="announcement_title" 
                                                        placeholder="Enter your text">
                                                </div>
                                                <div class="col-sm-3 col-4 chat-send">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-success" name="btn_announcement">Post</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form> 
                                        <?php } ?>
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

        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

        <script type="text/javascript">
            CKEDITOR.replace('editor')
        </script>
    </body>
</html>
