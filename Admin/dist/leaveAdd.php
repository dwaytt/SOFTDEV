<?php
include 'include/connect.php';
include 'include/session.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_leave'])) {

$user_id = $user_id;
$reason = $_POST['reason'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$leave_type = $_POST['leave_type'];
$date = date('Y-m-d');
$leave_remaining = $_POST['leave_remaining'];
$status = 'Pending';

$leave = mysqli_query($conn,"insert into tbl_leave (user_id,reason,start_date,end_date,leave_type,status,date_created,leave_remaining) value ('$user_id','$reason','$start_date','$end_date','$leave_type','$status','$date','$leave_remaining')") or die (mysqli_error($conn));

$_SESSION  = 'Leave Added Successfully';
header('location: leave.php');
}
 ?>
