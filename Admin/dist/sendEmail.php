<?php
use PHPMailer\PHPMailer\PHPMailer;
include 'include/connect.php';

if(isset($_POST['email'])){
    $subject = $_POST['subject'];
    $email = $_POST['email'];

    $emailSend = mysqli_query($conn,"select * from tbl_user where email = '".$email."'") or die (mysqli_error($conn));
    $count = mysqli_num_rows($emailSend);
    $row = mysqli_fetch_assoc($emailSend);
        $id = $row['id'];
        $id_encode = base64_encode($id);
        $body = "<a href='http://localhost/CCSICT_E-learning/Admin/dist/reset_pass.php?MnoQtyPXZORTE=$id_encode' class='btn btn-info btn-sm'>Change Password</a>";

  

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "angelo.pinque321@gmail.com";
    $mail->Password = 'DNsmile<<123';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";
    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email);
    $mail->addAddress("$email");
    $mail->Subject = ("$subject");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>
      