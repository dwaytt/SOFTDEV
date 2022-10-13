<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_position'])) {
$id = $_POST['id'];
$position = $_POST['position'];
$rate = $_POST['rate'];

$position = mysqli_query($conn,"update tbl_work_position set position='$position', rate='$rate' where id = '$id'") or die (mysqli_error($conn));

$_SESSION['success'] = 'Position Updated Successfully';
header('location: position.php');
}
 ?>
