<?php
include 'include/session.php';
include 'include/connect.php';

if(isset($_POST['submit'])) {

$email = $_POST['email'];

$email = mysqli_query($conn,"select * from tbl_user where email = '".$email."'") or die (mysqli_error($conn));
}
 ?>
