<?php
include("include/session.php");
include("include/connect.php");
date_default_timezone_set('Asia/Manila');
$today = $_POST['today'];

if(isset($_POST['btn_in'])) {
$id = $_POST['id'];
$time_in = date('H:i:s', strtotime($_POST['time_in']));
$date_in = date('Y-m-d', strtotime($_POST['date_in']));
$status = '';
$time_in_option = $_POST['time_in_option'];
$today = $_POST['today'];
$site_location = $_POST['site_location'];

if($time_in_option == 'Morning') {


if(mysqli_affected_rows($conn) > 0){
              echo "<script>window.location.href='attendance.php?filter=$today&status=1&logstatus=$logstatus'</script>";
              mysqli_close($conn);
            } else { 

    $attendance = mysqli_query($conn,"select * from tbl_attendance_log  where user_id = '$user_id' AND date_in = '$date_in'") or die (mysqli_error($conn));
    $attendanceRow = mysqli_fetch_assoc($attendance);

    $sql = mysqli_query($conn,"select * from tbl_user where id ='$id'");
    $userRow = mysqli_fetch_assoc($sql);

    $schedule_id = $userRow['schedule_id'];

    $schedule = mysqli_query($conn,"select * from tbl_schedule where id ='$schedule_id'") or die (mysqli_error($conn));
    $scheduleRow = mysqli_fetch_assoc($schedule);

    $logstatus = ($time_in > $scheduleRow['time_in_morning']) ? 0 : 1;

    if($attendanceRow['logstatus_morning'] == '1' || $attendanceRow['logstatus_afternoon'] == '1' AND $attendanceRow['date_in'] == $date_in) {

        $_SESSION['error'] = "Attendance for the day already exist.";
        header("Location: attendance.php?filter=$today");
    }
    else {
        // insert details into database
     $time_in = mysqli_query($conn,"insert into tbl_attendance_log (user_id,date_in,time_in_morning,logstatus_morning,site_location) values ('$id','$date_in','$time_in','$logstatus','$site_location')") or die(mysqli_error($conn));
             $_SESSION['success'] = "Time In Morning Added Successfully";
            header("Location: attendance.php?filter=$today&status=1&logstatus=$logstatus");
}
}
    
}
else {
    $attendance = mysqli_query($conn,"select * from tbl_attendance_log where user_id = '$user_id' AND date_in = '$date_in'") or die (mysqli_error($conn));
    $attendanceRow = mysqli_fetch_assoc($attendance);

    $employee = mysqli_query($conn,"select * from tbl_user where id ='$id'") or die (mysqli_error($conn));
    $rowEmployee = mysqli_fetch_assoc($employee);

    $schedule_id = $rowEmployee['schedule_id'];

    $schedule = mysqli_query($conn,"select * from tbl_schedule where id = '$schedule_id'")  or die (mysqli_error($conn));
    $scheduleRow = mysqli_fetch_assoc($schedule);

    $logstatus = ($time_in > $scheduleRow['time_in_afternoon']) ? 1 : 0;

    $attendance = mysqli_query($conn,"update tbl_attendance_log set time_in_afternoon ='$time_in', logstatus_afternoon = '$logstatus' where user_id = '$id' AND date_in ='$date_in'") or die (mysqli_error($conn));

    $_SESSION['success'] = 'Afternoon Time In Added Successfully';
            header("Location: attendance.php?filter=$today&status=1&logstatus=$logstatus");

            //cut off


}
        
    }
    else
        header("Location: attendance.php?filter=$today&status=1&logstatus=$logstatus");



if(isset($_POST['btn_out'])) {
$id = $_POST['id'];
$time_in = date('H:i:s', strtotime($_POST['time_in']));
$date_in = date('Y-m-d', strtotime($_POST['date_in']));
$time_in_option = $_POST['time_in_option'];
$today = $_POST['today'];

if($time_in_option == 'Morning') {

            $attendanceUpdate = mysqli_query($conn,"update tbl_attendance_log set time_out_morning='$time_in' where user_id = '$id' AND date_in= '$date_in'") or die(mysqli_error($conn));


            $attendance = mysqli_query($conn,"select * from tbl_attendance_log where user_id = '$id' AND date_in = '$date_in'");
            $attendanceRow = mysqli_fetch_assoc($attendance);

            $start = $attendanceRow['time_in_morning'];

         
            $time_start = new DateTime($start);
            $time_end = new DateTime($time_in);
            $interval = $time_start->diff($time_end);
            $hrs = $interval->format('%h');
            $mins = $interval->format('%i');
            $mins = $mins/60;
            $int = $hrs + $mins;

            $number_hr = mysqli_query($conn,"update tbl_attendance_log set number_hr_morning = '$int' where user_id = '$id' AND date_in ='$date_in'") or die (mysqli_error($conn));

            $_SESSION['success'] = 'Time Out Morning Added Successfully';
            header("Location: attendance.php?filter=$today&status=1&logstatus=$logstatus");

           
        

    } else {


        $attendanceUpdate = mysqli_query($conn,"update tbl_attendance_log set time_out_afternoon='$time_in' where user_id = '$id' AND date_in= '$date_in'") or die(mysqli_error($conn));


            $attendance = mysqli_query($conn,"select * from tbl_attendance_log where user_id = '$id' AND date_in = '$date_in'");
            $attendanceRow = mysqli_fetch_assoc($attendance);

            $start = $attendanceRow['time_in_afternoon'];

         
            $time_start = new DateTime($start);
            $time_end = new DateTime($time_in);
            $interval = $time_start->diff($time_end);
            $hrs = $interval->format('%h');
            $mins = $interval->format('%i');
            $mins = $mins/60;
            $int = $hrs + $mins;

            $number_hr = mysqli_query($conn,"update tbl_attendance_log set number_hr_afternoon = '$int' where user_id = '$id' AND date_in ='$date_in'") or die (mysqli_error($conn));

            $_SESSION['success'] = 'Time Out Afternoon Added Successfully';
            header("Location: attendance.php?filter=$today&status=1&logstatus=$logstatus");



    if($attendanceRow1['logstatus_morning'] == '1' || $attendanceRow1['logstatus_afternoon'] =='1'  ) {
                $_SESSION['warning'] = 'Attendance Already Existed';
                 header('location: attendance.php?filter=$today');
            }
    }
    
    }
?>

