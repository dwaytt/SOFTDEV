<?php
include_once('include/session.php');
include_once('include/connect.php');

if (isset($_POST['btn_profile'])) {
    # code...
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $year_level = $_POST['year_level'];
    $contact_no = $_POST['contact_no'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $address = $_POST['address'];


    $query = mysqli_query($conn, "update tbl_user set fname='$fname', mname='$mname', lname='$lname', year_level='$year_level', contact_no='$contact_no', gender='$gender', position = '$position', address = '$address' where id='$id' ") or die(mysqli_error($conn));

    $_SESSION['success'] = "Profile Edited Successfully";
    header("location:change_password.php");

} else
        {
            header("Location: change_password.php?");
        }



if(isset($_POST['btn_password'])) {
  $id = $_POST['id'];
   $school_id = $_POST['users_id'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

       $query = mysqli_query($conn, "update tbl_user set users_id = '$school_id', password='$password' where id='$id' ") or die(mysqli_error($conn));

       $_SESSION['success'] = "Edited Successfully";
    header("location:change_password.php");

   
}
?>