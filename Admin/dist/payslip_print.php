<?php 
include 'include/connect.php'; 
error_reporting(0);
$number = '';
    for($i = 0; $i < 10; $i++){
      $number .= $i;
    }

$number = substr(str_shuffle($number), 0, 9); 
 ?>

  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="plugins/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css"/>
  <!-- Font Awesome -->
  <link rel="shortcut icon" href="images/logo.png">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/fullcalendar.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <title>OMDS Enterprises | RECEIPT</title>
 <!DOCTYPE html>
 <html>
    <style type="text/css" media="print">
        @media print{
              .noprint, .noprint *{
                  display: none; !important;
              }
        }
        body {
          font-style: Sans-serif;
        }

    </style>

   <body onload="print()">
     <div class="container">
   <!--     
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="form-group col-sm-6">
        <img src="image/receipt_logo.jpg" style="margin-left:auto; max-width: 35%;max-height: auto">
          </div>
          
                 <label>asdads</label>
              
          <br>
               
          </div>
         
          </div>
          </div> -->
      
     <div class="card-body">
     <table id="" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                           

                                            <tbody>
                                                <?php 
                                                $page = 'schedule';
                                                $i = 1;
                                                $id = $_GET['id'];
                                                $attendance = mysqli_query($conn,"select *,sum(number_hr_morning) as total_morning, sum(number_hr_afternoon) as total_afternoon from tbl_attendance_log where user_id = '$id'") or die (mysqli_error($conn));
                                                while($attendanceRow = mysqli_fetch_assoc($attendance)) {
                                                $id = $attendanceRow['id'];

                                                $employee = mysqli_query($conn,"select * from tbl_user where id = '".$attendanceRow['user_id']."' ") or die (mysqli_error($conn));
                                                $employeeRow = mysqli_fetch_assoc($employee);

                                                $position = mysqli_query($conn,"select * from tbl_work_position where id = '".$employeeRow['position_id']."'");
                                                $positionRow = mysqli_fetch_assoc($position);

                                                $total = 0;
                                                $user_id = $attendanceRow['user_id'];
                                                $total_hr = $attendanceRow['total_morning'] + $attendanceRow['total_afternoon'];
                                                $gross = $positionRow['rate'] * $total_hr;
                                                $net_pay = $gross;

                                                $sss_amount = (4.5/100)*$net_pay;
                                                $pd_amount = (2.75/100)*$net_pay;
                                                $p_amount = (2/100)*$net_pay;
                                                $total_deduction = $sss_amount+$pd_amount+$p_amount;
                                                 ?>
                                                 <tr>
                      <th colspan="8">ODMS Enterprises Payslip #<?php echo $number ?></th>

                    </tr>
                                                <tr>
                                                  <td>Employee Name</td>
                                                    <td><?php echo $employeeRow['fname'] ?> <?php echo $employeeRow['mname'] ?> <?php echo $employeeRow['lname'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Rate Per Hour</td>
                                                     <td><?php echo '₱' , number_format($positionRow['rate'],2) ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Total Hours</td>
                                                     <td><?php echo $total_hr ?> Hours</td>
                                                    </tr>
                                                    <tr>
                                                      <td>SSS Deduction</td>
                                                     <td><?php echo '₱' , number_format($sss_amount,2) ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Philhealth Deduction</td>
                                                     <td><?php echo '₱' , number_format($pd_amount,2) ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Pagibig Deduction</td>
                                                     <td><?php echo '₱' , number_format($p_amount,2) ?></td>
                                                    </tr> 
                                                    <tr>
                                                      <td>Total Deduction</td>
                                                     <td><?php echo '₱' , number_format($total_deduction,2) ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Gross Income</td>
                                                     <td><?php echo '₱' , number_format($gross,2) ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Net Income</td>
                                                     <td><?php echo "₱",  number_format($net_pay-$total_deduction,2) ?></td>
                                                    </tr>
                                                <?php 
                                                include 'deleteModal.php';
                                                include 'scheduleEditModal.php';
                                                
                                            } ?>
                                            </tbody>
                                        </table>
   </div>
     <br>
     <div class="form-group">
          <button type="" class="btn btn-danger noprint" onclick="window.location.replace('payroll.php');">Cancel Printing</button>
     </div>

     </div>





   </body>
 </html>
