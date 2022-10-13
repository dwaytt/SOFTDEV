<?php
include("include/session.php");
include 'include/connect.php';

if(isset($_POST['btn_content'])) {
$id = $_POST['id'];
$editor = $_POST['editor'];

if(empty($id)) {
$visitor_log = mysqli_query($conn, "insert into tbl_content (editor) values ('$editor')") or die (mysqli_error($conn));

   $_SESSION['success'] = " Content Added Successfully";
            header("Location: compiler.php");
}
elseif(!empty($id)) {
$visitor_log = mysqli_query($conn, "update tbl_content set editor='$editor' where id = '$id'") or die (mysqli_error($conn));

   $_SESSION['success'] = " Content Added Successfully";
            header("Location: compiler.php");
}
}

 ?>

