<?php session_start();
include 'include/connect.php';

$id = $_GET['MnoQtyPXZORTE'];
$message = $Home = '';
$_SESSION['user'] = $id;
$id_decode = base64_decode($id);
 ?>


<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Forgot Password |</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/sys_logo.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

    </head>

<body>

  <!--   <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div> -->
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <?php if (isset($_SESSION['error'])) { ?>
                  <div class="alert alert-warning text-center">
                    <?php echo $_SESSION['error']; ?>
                  </div>
                  <?php }
                  unset($_SESSION['error']);
                  ?>

                <?php if (isset($_SESSION['success'])) { ?>
                  <div class="alert alert-success text-center">
                    <?php echo $_SESSION['success']; ?>
                  </div>
                  <?php }
                  unset($_SESSION['success']);
                  ?> 
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Forgot Password</h5>
                                <p class="text-white-50">Change password to continue E-Learning.</p>
                                <a href="#" class="logo logo-admin">
                                    <img src="assets/images/123.png" height="74" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" method="post" action = "reset_password.php">
                                  <input type="hidden" name="id" value="<?php echo $id_decode?>">
                                   <input type="hidden" name="base64" value="<?php echo $id?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password" >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Confirm Passowrd</label>
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" >
                                    </div>
                                   
                                    
                                    <div class="row">
                                        <div class="form-group col-sm-12 text-end">
                                            <button type="submit" class="btn btn-primary" name="btn_password" id="requestSubmit"><i class="fa fa-check"></i> Submit</button>
                                       
                                        </div>
                                    </div>

                                    <!-- <div class="mt-2 mb-0 row">
                                         <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="btn_login">Log In</button>
                                        </div>
                                    </div> -->

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Don't have an account ? <a href="user_registration.php" class="fw-medium text-primary"> Signup now </a> </p>
                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> E-Learning Material for CCSICT  <i class="mdi mdi-heart text-danger"></i></p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>


    
         <script>
function myFunction() {
  alert("Notification was sent to the client email!");
}
</script>

</body>

</html>