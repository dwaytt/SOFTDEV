<?php
session_start();
include_once('include/connect.php');

if (isset($_POST['btn_add'])) {
    # code...
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $date_of_brith = $_POST['date_of_brith'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];
    $users_id = $_POST['users_id'];
    $role_id = '2';
    $position_id = $_POST['position_id'];
    $branch = $_POST['branch'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $date_registered = date('Y-m-d H:i:s');
    $email = $_POST['email'];
    $schedule_id = $_POST['schedule_id'];

    //check email if users_id exist
    $email_query = mysqli_query($conn, "select * from tbl_user where users_id='$users_id' ") or die(mysqli_error($conn));
    if (mysqli_num_rows($email_query)>0) {
        # code...
        $_SESSION['error'] = "User ID already exist";
        header("location:employee.php");
    }else{
            
                $query = mysqli_query($conn, "insert into tbl_user (fname, mname, lname, gender, date_of_brith, contact_no, address, password, users_id, role_id, position_id, branch, date_registered, email,schedule_id) values('$fname','$mname','$lname','$gender','$date_of_brith','$contact_no','$address','$password','$users_id','$role_id','$position_id','$branch','$date_registered','$email','$schedule_id') ") or die(mysqli_error($conn));
                $_SESSION['success'] = "Employee Registered Successfully";
                header("location:employee.php");
        
    }
}else{
    echo "nothing";
}
?>