<?php
include_once("include/session.php");
include_once("include/connect.php");

if (isset($_POST['btn_delete'])) {
    # code...
    $id = $_POST['id'];
    $page = $_POST['page'];

    if($page=="position"){
        
        $Query = mysqli_query($conn, "delete from tbl_work_position where id='$id' ") or die(mysqli_error($conn));
        $_SESSION['success'] = "Position Deleted Successfully";
        header("location:position.php");

    }elseif ($page=="schedule") {
        # code...
         $Query = mysqli_query($conn, "delete from tbl_schedule where id='$id' ") or die(mysqli_error($conn));
        $_SESSION['success'] = " Schedule Deleted Successfully";
        header("location:schedule.php");
    }
    elseif ($page=="attendance") {
        # code...
         $Query = mysqli_query($conn, "delete from tbl_attendance_log where id='$id' ") or die(mysqli_error($conn));
        $_SESSION['success'] = "Attendance Deleted Successfully";
        header("location:attendance.php");

        $inmate = mysqli_query($conn,"update tbl_inmate set logs='0' where id = '$inmate_id'") or die (mysqli_error($conn));
    }
    elseif ($page=="leave") {
        # code...
         $Query = mysqli_query($conn, "delete from tbl_leave where id='$id' ") or die(mysqli_error($conn));
        $_SESSION['success'] = "Leave Deleted Successfully";
        header("location:leave.php");
    }
    elseif ($page=="employee") {
        # code...
         $Query = mysqli_query($conn, "delete from tbl_user where id='$id' ") or die(mysqli_error($conn));
        $_SESSION['success'] = "Employee Deleted Successfully";
        header("location:employee.php");
    }
    
    else{

        header("location:dashboard.php");
    }
}

?>