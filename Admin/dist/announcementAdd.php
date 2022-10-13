<?php
include("include/session.php");
include("include/connect.php");
if(isset($_POST['btn_announcement'])) {

$announcement_title = $_POST['announcement_title'];
$announcement_date = $_POST['announcement_date'];
$announcement_time = $_POST['announcement_time'];

            // insert details into database
     $sql = mysqli_query($conn,"insert into tbl_announcement (announcement_title, announcement_date,announcement_time) VALUES('$announcement_title','$announcement_date','$announcement_time')") or die(mysqli_error($conn));
             $_SESSION['success'] = " Announcement Added Successfully";
            header("Location: announcement.php");
        
    }
    else
        header("Location: announcement.php");


?>

