<?php
include('include/session.php');
include('include/connect.php');
 ?>
<header id="page-topbar">
                <div class="navbar-header" >
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box"style="background-color: #4B4E30;">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="images/odms_logo.png" alt="" height="50" width="40">
                                </span>
                                <span class="logo-lg">
                                   <!--  <img src="images/school_logo.png" alt="" height="35"> --> <span style="color: white; font-size: 20px; font-weight: bold;">O.D.M.S Enterprises  </span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>

                        <div class="d-none d-sm-block">
                            <div class="dropdown pt-3 d-inline-block">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if($role == '2') { ?>
                                        <?php echo $fullname ?> (Employee) <img src="images/online.png" height="10">
                                <?php } ?>
                                <?php if($role == '1') { ?>
                                        <?php echo $fullname ?> (Administrator) <img src="images/online.png" height="10">
                                <?php } ?>
                                    </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                 <!--    <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="#">You are now Online</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                          <!-- App Search-->
                          <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                
                                
                            </div>
                        </form>

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-md-block ms-2">
                            <button type="button" class="btn header-item waves-effect"
                                data-bs-toggle="">
                                <img class="me-2" src="images/logo.png" alt="Header Language" height="35" width="32"> ODMS <span class=""></span>
                            </button>
                             <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                  <span class="align-middle"> This system is for ODMS ENTERPRISES only </span>
                                </a>
                                 <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                 <img src="assets/images/flags/us_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> English </span>
                                </a> -->
                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/germany_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                                </a> -->

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/italy_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                                </a> -->

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/french_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                                </a> -->

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/spain_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                                </a> -->

                                 <!-- item-->
                                 <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/russia_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                                </a>-->
                            </div> 
                        </div>

          

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge bg-danger rounded-pill"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 font-size-16"> Notifications (0) </h5>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            View all
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if($role == '1') { ?>
                                <img class="rounded-circle header-profile-user" src="assets/images/avatar.png"
                                    alt="Header Avatar">
                            <?php } ?>
                            <?php if($role == '2') { ?>
                                 <img class="rounded-circle header-profile-user" src="assets/images/student_avatar.jpg"
                                    alt="Header Avatar">
                           <?php } ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                             <!--    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a> -->
                              
                                <div class="dropdown-divider"></div>
                                <form action="logoutAdd.php" method="post">
                                <input type="hidden" name="student_id" value="<?php echo $user_id ?>">
                                <button type="submit" class="dropdown-item text-danger" name="btn_logout"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger mdi mdi-logout"></i> Logout
                                </button>
                                </form>
                            </div>
                        </div>

                        
            
                    </div>
                </div>
            </header>
