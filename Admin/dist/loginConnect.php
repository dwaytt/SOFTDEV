<?php 
session_start();
date_default_timezone_set('Asia/Manila'); 
include('include/connect.php');

if (isset($_POST['btn_login'])) {
    # code...
    $users_id = $_POST['users_id'];
    $password = $_POST['password'];
    $date_in = date('Y-m-d');
    $time_in = date('H:i:s');
    $status = 'Log in';

    $query = mysqli_query($conn, "select * from tbl_user where users_id='$users_id'") or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $count = mysqli_num_rows($query);
    if(password_verify($password, $row['password'])) {
        $_SESSION['user_id']= $row['id'];
        header("location:dashboard.php");

    $log = mysqli_query($conn,"insert into tbl_students_log (student_id, date_in, time_in, status) values ('".$row['id']."','$date_in','$time_in','$status')") or die (mysqli_error($coon));
    }

    elseif($password != $row['password'] || $users_id != $row['users_id']) {
        $_SESSION['error'] = "Username or Password is incorrect";
        header("location:login.php");
    }
} 
else{
        $_SESSION['error'] = "You don't have permission to login";
        header("location:login.php");
    }
    
?>