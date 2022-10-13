<?php session_start(); ?>
<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Registers | OMDS Enterprises<style type="text/css">
    body {
        background-image: url('images/loginbg3.jpg');
        background-attachment: fixed;
        background-size: cover;
    }
</style></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
    
    
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    
    </head>
<style type="text/css">
    body {
        background-image: url('images/loginbg3.jpg');
        background-attachment: fixed;
        background-size: cover;
    }
</style>
    <body>

        <div class="account-pages my-5 pt-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-lg-6">
                        <div class="card overflow-hidden">
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
                            <div class="bg-warning">
                                <div class="text-primary text-center p-4">
                                    <h5 class="text-white font-size-20">Free Register</h5>
                                    <p class="text-white-50">Get your free ODMS Enterprises account now.</p>
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="images/odms.png" height="59" alt="logo">
                                    </a>
                                </div>
                            </div>
    
                            <div class="card-body p-4">
                                <div class="p-3">
                                    <form class="mt-4" action="signup.php" method="POST">
                                        <div class="row">
                                        <div class="mb-3 form-group col-md-6">
                                            <label class="form-label" for="useremail">First name</label>
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter first name" required>
                                        </div>
                                        <div class="mb-3 form-group col-md-6">
                                            <label class="form-label" for="username">Middle name</label>
                                            <input type="text" class="form-control" name="mname" id="fname" placeholder="Enter middle name" required>
                                        </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 form-group col-md-6">
                                            <label class="form-label" for="username">Last name</label>
                                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter last name" required>
                                            </div>
                                           <div class="mb-3 form-group col-md-6">
                                            <label class="form-label" for="userpassword">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                                        </div>
                                        </div>
                                        <div class="row">
                                           <div class="mb-3 form-group col-md-6">
                                            <label class="form-label" for="year_level">Year level</label>
                                            <input type="text" name="year_level" value="First Year" class="form-control" readonly>
                                           </div>
                                           <div class="mb-3 form-group col-md-6">
                                            <label class="form-label" for="section">Section</label>
                                            <input type="text" name="section"  class="form-control" placeholder="Enter Section" required>
                                           </div> 
                                        </div>
                                        <div class="row">
                                             <div class="mb-3 form-group col-md-6">
                                            <label class="form-label" for="username">Gender</label>
                                            <select name="gender" class="form-control" required>
                                                <option disabled selected>Select gender. . .</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            </div>
                                            <div class="mb-3 form-group col-md-6">
                                            <label class="form-label" for="userpassword">Contact No.</label>
                                            <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter contact no." required>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="mb-3 form-group col-md-12">
                                            <label class="form-label" for="userpassword">Address</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" required>
                                        </div>
                                         <div class="mb-3 form-group col-md-6">
                                            <label class="form-label" for="userpassword">School ID</label>
                                            <input type="text" class="form-control" name="users_id" id="users_id" placeholder="Enter school ID" required>
                                        </div>
                                        <div class="mb-3 form-group col-md-6">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                                        </div>
                                        </div>
                                        

                                        <div class="mb-0 row">
                                            <div class="col-12 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="btn_register">Register</button>
                                            </div>
                                        </div>
    
    
                                    </form>
    
                                </div>
                            </div>
    
                        </div>
    
                        <div class="mt-5 text-center">
                            <p>Already have an account ? <a href="login.php" class="fw-medium text-primary"> Login </a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Website for ODMS Enterprises <i class="mdi mdi-heart text-danger"></i></p>
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

    </body>
</html>
