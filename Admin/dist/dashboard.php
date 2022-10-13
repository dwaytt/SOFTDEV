<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "db_payroll");
$query = '
SELECT *, 
UNIX_TIMESTAMP(CONCAT_WS(" ", date_in, date_in)) AS datetime
FROM tbl_attendance_log 
ORDER BY date_in DESC, date_in DESC
';
$result = mysqli_query($connect, $query);
$rows = array();
$table = array();
$table['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Employee', 
  'type' => 'number'
 ),

);

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $datetime = explode(".", $row["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(

      "v" => $row["id"]
     );

 $rows[] =  array(
     "c" => $sub_array
    );
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);

?>

<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Dashboard | ODMS Enterprises</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/logo.png">
    
        <link href="assets/libs/chartist/chartist.min.css" rel="stylesheet">
    
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">


 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart()
   {
    var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

    var options = {
     title:'Attendance History',
     legend:{position:'bottom'},
     chartArea:{width:'95%', height:'80%'}
    };

    var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

    chart.draw(data, options);
   }
  </script>
  <style>
  .page-wrapper
  {
   width:1000px;
   margin:0 auto;
  }
  </style>
    
    </head>

    <body data-sidebar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">

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
                                    <h6 class="page-title">Dashboard</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Welcome to ODMS Enterprises</li>
                                    </ol>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-cog me-2"></i> Settings
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Nothing to display</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <?php if($role == '1') { ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                              <a href="employee.php">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="assets/images/services-icon/01.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Employee</h5>
                                            <h4 class="fw-medium font-size-24">
                                            <?php $employee = mysqli_query($conn,"select id from tbl_user where role_id = 2 order by id asc");
                                            $row = mysqli_num_rows($employee);
                                            echo $row;
                                             ?>
                                             <i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                            <div class="mini-stat-label bg-success">
                                                <p class="mb-4"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </a>
                            </div>
                            <?php } ?>
                            
                            <?php if($role == '1') { ?>
                            <div class="col-xl-3 col-md-6">
                              <a href="leave.php">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="assets/images/services-icon/03.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Emp. Leave</h5>
                                            <h4 class="fw-medium font-size-24">
                                            <?php $module = mysqli_query($conn,"select id from tbl_leave where status = 'Approved   '  order by id asc");
                                            $row = mysqli_num_rows($module);
                                            echo $row;
                                             ?>
                                             <i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                            <div class="mini-stat-label bg-info">
                                                <p class="mb-4"> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                              </a>
                            </div>
                            <?php } ?>


                            <div class="col-xl-3 col-md-6">
                              <a href="announcement.php">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-15 text-uppercase text-white-50">Announcement</h5>
                                            <h4 class="fw-medium font-size-24"> 
                                            <?php $time_in = mysqli_query($conn,"select id from tbl_announcement order by id asc");
                                            $row = mysqli_num_rows($time_in);
                                            echo $row;
                                             ?>
                                            <i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                            <div class="mini-stat-label bg-warning">
                                                <p class="mb-4"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </a>
                            </div>
                        </div>
                        <!-- end row -->
                      <?php if($role == '1') { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                 <div class="page-wrapper">
                                <h4 align="center">Attendance History</h4>
                                <div id="line_chart" style="width: 100%; height: 500px"></div>
                                </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                      <?php } ?>
                        <!-- end row -->

                        <!-- end row -->



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
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        <!-- JAVASCRIPT -->
         <script src="assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="assets/js/pages/form-validation.init.js"></script>

        <script src="assets/js/app.js"></script>
<!--         <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [{
        label: 'Statistics',
     
        data: [1,2,6,7,9,3,2,5,15,5,4,7],
  
        borderWidth: 2,
        backgroundColor: 'rgb(87,75,144)',
        borderColor: 'rgb(87,75,144)',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            stepSize: 150
          }
        }],
        xAxes: [{
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
  </script> -->

    </body>

</html>


