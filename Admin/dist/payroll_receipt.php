<?php
include 'include/connect.php';
include 'include/session.php';
$date = date('Y-m-d');
$number = '';
    for($i = 0; $i < 10; $i++){
      $number .= $i;
}

$to = date('Y-m-d');
$from = date('Y-m-d', strtotime('-15 day', strtotime($to)));

if(isset($_GET['range'])){
  $range = $_GET['range'];
  $ex = explode('-', $range);
  $from = date('Y-m-d', strtotime($ex[0]));
  $to = date('Y-m-d', strtotime($ex[1]));
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

  $attendace = mysqli_query($conn,"select *,sum(number_hr_morning) AS morning, sum(number_hr_afternoon) AS afternoon from tbl_attendance_log where user_id = '".$employeeRow['id']."'") or die (mysqli_error($conn));
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs4 invoice - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body onload="print()">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
           <!-- -->
            </span>
            <img src="images/odms.png" height="40" width="35">
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
                  Services Product
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
                        <th class="text-center" width="20%">RATE PER HOUR</th>
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
</div>

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

<script type="text/javascript">

</script>
</body>
</html>