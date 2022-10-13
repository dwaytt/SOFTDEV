<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_position'])) {

$time_in_morning = $_POST['time_in_morning'];
$time_out_morning = $_POST['time_out_morning'];
$Sched = $_POST['Sched'];

$schedule = mysqli_query($conn,"insert into tbl_schedule (time_in_morning,time_out_morning,Sched) value ('$time_in_morning','$time_out_morning','$Sched')") or die (mysqli_erro($conn));

$_SESSION['success'] = 'Schedule Added Successfully';
header('location:schedule.php');


}
?>