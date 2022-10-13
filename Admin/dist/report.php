<?php 
include 'include/connect.php';
date_default_timezone_set('Asia/Manila');
/*session_start();*/
 ?>
<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Report | E-Learning Material for CCSICT Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/sys_logo.png">
    
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
                                    <h6 class="page-title">Inmate Report</h6>
                                 <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">Select the date range <i class="mdi mdi-arrow-down"></i></a></li>
                                </ol>
                                
                                  <!--   <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Veltrix</a></li>
                                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                                    </ol> -->
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="text-center"> -->
                                                    <!-- Satic modal -->
                                                    <!-- <a href="visitor_log_print.php" type="button" class="btn btn-primary waves-effect waves-light">
                                                        <i class="ion ion-md-print"></i> Print
                                                    </a>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light"  data-bs-toggle="modal"
                                                        data-bs-target="#add">
                                                         <i class="mdi mdi-plus-circle"> </i> Add Visitor Log
                                                    </button>
                                                    <?php /*include 'visitor_logAddModal.php'*/; ?>
                                         </div>

                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                
                <form action="report.php" method="get">
                  <div class="row">
                  <div class="form-group col-sm-3">
                  <label style="">FROM:</label> <span style="color:red;">*</span> 
                  <input type="date" name="d1" class="form-control" style="font-size: 14px">
                  </div>
                  <div class="form-group col-sm-3">
                   <label style="">TO:</label> <span style="color:red;">*</span> <input type="date" name="d2" class="form-control" value="" style="font-size: 14px">
                  </div>
                  <div class="form-group col-sm-3" style="padding-top: 2%;">
                  <button class="btn btn-primary btn-sm" type="submit"> <i class="fa fa-search"> </i> Search</button>
                  </div>
                  <div class="form-group col-sm-3" style="padding-top: 2%;">
                   <a href="javascript:Clickheretoprint()" style="float: right;" class="btn btn-success btn-sm"><span><i class="fa fa-print" aria-hidden="true"></i> Print</span></a>
                    </div>
                </div>
                </form>
              </div>
           <div class="card-body">
               <div class="table-responsive">
                       <div class="content" id="content">
                   <center>
            <h1> REPORT</h1>
     </center>
                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                         <th width="18%" style="text-align: left;">Full Name</th>
                          <th width="19%" style="text-align: left; ">Date</th>   
                          <th width="19%" style="text-align: left;">Time In</th>
                          <th width="25%" style=";text-align: left;">Time Out</th>
                          <th width="" style=";text-align: left;">Status</th>
                                                </tr>
                                            </thead>


                                <tbody>
                 <?php 
                        $d1 = $_GET['d1'];
                        $d2 = $_GET['d2'];
                         $attendance = mysqli_query($conn,"select * from tbl_students_log where date_in between '$d1' and '$d2' order by id desc") or die (mysqli_error($conn));
                         while($rowLogs = mysqli_fetch_assoc($attendance)) {
                             $id = $rowLogs['id'];

                          $student = mysqli_query($conn,"select * from tbl_user where id ='".$rowLogs['student_id']."' || role_id = 2") or die (mysqli_error($conn));

                          $rowStudent = mysqli_fetch_assoc($student);
                           ?>
                            <tr>
                            <td><?php echo $rowStudent['fname'] ?> <?php echo $rowStudent['mname'] ?> <?php echo $rowStudent['lname'] ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                     </tr>
                     <?php 
                      
                    } ?>
                          </tbody>
                            </table>
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

        
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="script.js"></script>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=1100px, height=1000px, left=150, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal; margin-left: 8%;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
    </body>
</html>
