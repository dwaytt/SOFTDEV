<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_position'])) {

$position = $_POST['position'];
$rate = $_POST['rate'];

$position = mysqli_query($conn,"insert into tbl_work_position (position,rate) values ('$position','$rate')") or die (mysqli_error($conn));
$_SESSION['success'] = 'Position Added Successfully';
header('location: position.php');

}
 ?>
