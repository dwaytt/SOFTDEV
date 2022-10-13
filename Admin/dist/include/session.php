<?php
session_start();
include('connect.php');

if (isset($_SESSION['user_id'])) {
    # code...
    
$user_id = $_SESSION['user_id'];

$session_query = mysqli_query($conn, "select * from tbl_user where id='$user_id' ") or die(mysqli_error($conn));
$session_row = mysqli_fetch_assoc($session_query);

$fullname = $session_row['fname'] . " " . $session_row['mname'] . " " . $session_row['lname'];
$role = $session_row['role_id'];

}else{
    $_SESSION['error'] = "You dont have permission to view this Page";
    header("location:index.php");
}
?>