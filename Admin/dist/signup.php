<?php
session_start();
include_once('include/connect.php');

if (isset($_POST['btn_register'])) {
    # code...
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];
    $users_id = $_POST['users_id'];
    $role_id = '2';
    $year_level = $_POST['year_level'];
    $section = $_POST['section'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $date_registered = date('Y-m-d H:i:s');
    $email = $_POST['email'];

    //check email if users_id exist
    $email_query = mysqli_query($conn, "select * from tbl_user where users_id='$users_id' ") or die(mysqli_error($conn));
    if (mysqli_num_rows($email_query)>0) {
        # code...
        $_SESSION['error'] = "User ID already exist";
        header("location:user_registration.php");
    }else{
            
                $query = mysqli_query($conn, "insert into tbl_user (fname, mname, lname, gender, contact_no, address, password, users_id, role_id, year_level, section, date_registered, email) values('$fname','$mname','$lname','$gender','$contact_no','$address','$password','$users_id','$role_id','$year_level','$section','$date_registered','$email') ") or die(mysqli_error($conn));
                $_SESSION['success'] = "Registered Successfully";
                header("location:user_registration.php");
        
    }
}else{
    echo "nothing";
}
?>