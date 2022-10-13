<?php
include 'incude/connect.php';
include 'include/session.php';

if(isset($_POST['btn_schedule'])) {

$id = $_POST['id'];
$time_in_morning = $_POST['time_in_morning'];
$time_out_morning = $_POST['time_out_morning'];
$time_in_afternoon = $_POST['time_in_afternoon'];;

$schedule = mysqli_query($conn,"update tbl_schedule set time_in_morning='$time_in_morning', time_out_morning='$time_out_morning',time_in_afternoon='$time_in_afternoon' where id ='$id'") or die (mysqli_erro($conn));

$_SESSION['success'] = 'Schedule Updated Successfully';
header('location:schedule.php');

}
 ?>
