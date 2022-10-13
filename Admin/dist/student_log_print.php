<?php include 'include/connect.php';  
 ?>

  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="plugins/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css"/>
  <!-- Font Awesome -->
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
  <title>POS | RECEIPT</title>
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
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
               <div class="form-group col-sm-12">
                <center>
                <h2>ISABELA STATE UNIVERSITY</h2>
                </center>

              </div>
              <div class="form-group col-sm-12">
                <h4>STUDENT'S LOG RECORD</h4>

              </div>
            </div>
          </div>
        </div>
     <table id="ready" class="table table-striped table-bordered" style="width: 100%;">
          <thead>
            <tr>
                    <th>No.</th>
                    <th>Student name</th>
                    <th>Date in</th>
                    <th>Time in</th>
                    <th>Time out</th>
                    <th>Status</th>    


            </tr>
          </thead>
          <tbody>
                <?php
                $i=1;
               $student_log = mysqli_query($conn,"select * from tbl_students_log") or die (mysqli_error($conn));
                                while($rowLog = mysqli_fetch_assoc($student_log)) {
                                 $id = $rowLog['id'];

                              $student = mysqli_query($conn,"SELECT * from tbl_user where id = '".$rowLog['student_id']."' ") or die (mysqli_error($conn));
                             $rowStudent = mysqli_fetch_assoc($student);

                 ?>
                 <tr>
                    <td><?php echo $i++ ?>
                    </td>
                    <td>
                      <?php echo $rowStudent['fname'] ?>  <?php echo $rowStudent['mname'] ?>  <?php echo $rowStudent['lname'] ?>
                    </td>
                    <td>
                     <?php echo date("F d(D), Y",strtotime($rowLog['date_in'])) ?>
                    </td>
                    <td>
                     <?php echo date("h:iA",strtotime($rowLog['time_in'])) ?>
                    </td>
                     <td>
                     <?php if($rowLog['time_out']=='') { ?>

                      <?php }else { ?>
                     <?php echo date("h:iA",strtotime($rowLog['time_out'])) ?>
                   <?php } ?>
                    </td>
                    <td>
                    <?php echo $rowLog['status'] ?>
                    </td>
                    </tr>         

            <?php } ?>
          </tbody>

     </table>
   </div>
     <br>
     <div class="form-group">
          <button type="" class="btn btn-danger noprint" onclick="window.location.replace('students_log.php');">Cancel Printing</button>
     </div>

     </div>





   </body>
 </html>
