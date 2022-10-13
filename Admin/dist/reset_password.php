<?php
include 'include/connection.php';
include 'include/session.php';

if(isset($_POST['btn_password'])) {
$id = $_POST['id'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$confirm_password = $_POST['confirm_password'];
$base64 = $_POST['base64'];
$password = mysqli_query($conn,"update tbl_user set password = '$password' where id = '$id'") or die (mysqli_error($conn));

$_SESSION['success'] = "Password Reset Successfully";
header("location: reset_pass.php?MnoQtyPXZORTE=$base64");


}
 ?>