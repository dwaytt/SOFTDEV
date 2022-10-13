<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_status'])) {

$id = $_POST['id'];
$status = $_POST['status'];

$status = mysqli_query($conn,"update tbl_leave set status='$status' where id ='$id'") or die (mysqli_error($conn));

if($_POST['status'] == 'Approved') {
	$_SESSION['success'] = 'Approved Successfully';
	header('location: leave.php');
}elseif($_POST['status'] == 'Rejected') {
	$_SESSION['error'] = 'Rejected Successfully';
	header('location: leave.php');
}
}
 ?>

