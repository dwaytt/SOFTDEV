<?php 
include 'include/connect.php';
include 'include/session.php';
date_default_timezone_set('Asia/Manila');

$to = date('Y-m-d');
$from = date('Y-m-d', strtotime('-15 day', strtotime($to)));

if(isset($_GET['range'])){
  $range = $_GET['range'];
  $ex = explode('-', $range);
  $from = date('Y-m-d', strtotime($ex[0]));
  $to = date('Y-m-d', strtotime($ex[1]));
}
error_reporting(0);
$number = '';
    for($i = 0; $i < 10; $i++){
      $number .= $i;
    }

$number = substr(str_shuffle($number), 0, 9);

$id = $_GET['id'];

$date = date('Y-m-d');
$number = '';
    for($i = 0; $i < 10; $i++){
      $number .= $i;
    }

$number = substr(str_shuffle($number), 0, 9); 

$id = $_GET['id'];
$employee = mysqli_query($conn,"select * from tbl_user where id = '$id'") or die (mysqli_error($conn));
while($employeeRow = mysqli_fetch_assoc($employee)) {

  $fname = $employeeRow['fname'];
  $mname = $employeeRow['mname'];
  $lname = $employeeRow['lname'];
  $address = $employeeRow['address'];
  $contact_no = $employeeRow['contact_no'];

  $position = mysqli_query($conn,"select * from tbl_work_position where id = '".$employeeRow['position_id']."'") or die (mysqli_error($conn));
  $positionRow = mysqli_fetch_assoc($position);

  $position = $positionRow['position'];
  $rate = $positionRow['rate'];

  $attendace = mysqli_query($conn,"SELECT *,sum(number_hr_morning) as morning,sum(number_hr_afternoon) as afternoon from tbl_attendance_log where date_in between '$from' AND '$to' AND user_id = '".$employeeRow['id']."'") or die (mysqli_error($conn));
  $attendaceRow = mysqli_fetch_assoc($attendace);

  $total_hr = $attendaceRow['morning'] + $attendaceRow['afternoon'];

  $gross = $positionRow['rate'] * $total_hr;
  $net_pay = $gross;
  $sss_amount = (4.5/100)*$net_pay;
  $pd_amount = (2.75/100)*$net_pay;
  $p_amount = (2/100)*$net_pay;
  $total_deduction = $sss_amount+$pd_amount+$p_amount;
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
                        
                        <!-- end page title -->

                        <div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print" style="float: right;">
            <a href="payroll.php" type="button" class="btn btn-warning waves-effect waves-light">
             <i class="mdi mdi-arrow-left"></i> Back
           </a>
           <a href="payroll_receipt.php?id=<?php echo $id ?>" type="button" class="btn btn-primary waves-effect waves-light">
             <i class="ion ion-md-print"></i> Print
           </a> 
            </span>
            <img src="images/odms.png" height="50" width="40">
            ODMS Enterprises
         </div> 
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
               <small>To</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse"><?php echo $fname ?> <?php echo $mname ?> <?php echo $lname ?></strong><br>
                 <?php echo $address ?><br>
                  City, Zip Code<br>
                  Phone: (+63) <?php echo $contact_no ?><br>
               </address>
            </div>
            <div class="invoice-date">
               <small>Invoice / <?php echo date("F",strtotime($date)) ?> quarter</small>
               <div class="date text-inverse m-t-5"><?php echo date("F d, Y",strtotime($date)) ?></div>
               <div class="invoice-detail">
                  #000<?php echo $number ?><br>
                  Services Employee
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>POSITION DESCRIPTION</th>
                        <th class="text-center" width="10%">RATE</th>
                        <th class="text-center" width="10%">HOURS</th>
                        <th class="text-right" width="20%">GROSS INCOME</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse"><?php echo $position?></span>
                        </td>
                        <td class="text-center"><?php echo "₱", number_format($rate,2) ?> </td>
                        <td class="text-center"><?php echo $total_hr ?></td>
                        <td class="text-right"><?php echo "₱", number_format($gross,2) ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>SSS Deduction</small>
                        <span class="text-inverse"><?php echo "₱", number_format($sss_amount,2) ?></span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-plus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>Philhealth Deduction</small>
                        <span class="text-inverse"><?php echo "₱", number_format($pd_amount,2) ?></span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-plus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>Pagibig Deduction</small>
                        <span class="text-inverse"><?php echo "₱", number_format($pd_amount,2) ?></span>
                     </div>
                     <div class="sub-price">
                        <i class="fas fa-equals text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>Total Deduction</small>
                        <span class="text-inverse"><?php echo "₱", number_format($total_deduction,2) ?></span>
                     </div>
                  </div>
               </div>
               <div class="invoice-price-right">
                  <small>NET INCOME</small> <span class="f-w-600"><?php echo "₱",  number_format($net_pay-$total_deduction,2) ?></span>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
         <!-- <div class="invoice-note">
            * Make all cheques payable to [Your Company Name]<br>
            * Payment is due within 30 days<br>
            * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
         </div> -->
         <!-- end invoice-note -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR BUSINESS
            </p>
           <!--  <p class="text-center">
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
            </p> -->
         </div>
         <!-- end invoice-footer -->
      </div>
   </div>
</div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                 <?php include 'include/footer.php' ?>
              


            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
<style type="text/css">
body{
    margin-top:20px;
    background:#eee;
}

.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
</style>
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
