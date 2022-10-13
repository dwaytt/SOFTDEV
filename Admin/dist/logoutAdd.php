<?php
require('include/connect.php');

if(isset($_POST['btn_logout'])) {

$id = $_POST['student_id'];
$status = 'Logout';
$time_out = date('H:i:s');

$student = mysqli_query($conn,"update tbl_students_log set status='$status',time_out = '$time_out' where student_id ='$id'");

echo "<script type='text/javascript'>alert('Logout Successfully')</script>";
header( "Refresh:0.01; url=login.php", true, 303);
}
 ?>