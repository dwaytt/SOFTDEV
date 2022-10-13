<?php 
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_edit'])) {

$id = $_POST['id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$position = $_POST['position'];
$branch = $_POST['branch'];
$email = $_POST['email'];
$contact_no = $_POST['contact_no'];
$address = $_POST['address'];


$employee = mysqli_query($conn,"update tbl_user set fname='$fname', mname='$mname', lname='$lname', position='$position', branch='$branch', email='$email', contact_no='$contact_no', address='$address' where id ='$id'") or die (mysqli_error($conn));

$_SESSION['success'] = "Employee Update Successfully";
header('location: employee.php');

}
 ?>
