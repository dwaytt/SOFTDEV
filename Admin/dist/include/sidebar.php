<?php
date_default_timezone_set('Asia/Manila');
$to = date('Y-m-d');
$from = date('Y-m-d', strtotime('-15 day', strtotime($to)));

 ?>
            <div class="vertical-menu">

                <div data-simplebar class="h-100" style="background-color: #4B4E30;">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="dashboard.php" class="waves-effect">
                                    <i class="ti-home"></i>
                                    <!-- <span class="badge rounded-pill bg-primary float-end">  </span> -->
                                    <span>Dashboard</span>
                                </a>
                            </li>
                           
                            <li class="menu-title">Components</li>
                            <?php if($role == '2') { ?>
                            <li>
                                <a href="attendance.php?filter=<?php echo $to ?>" class="waves-effect">
                                    <i class="ti ti-agenda"></i>
                                    <span>Attendance</span>
                                </a>
                            </li>
                             <li>
                                <a href="leave.php" class=" waves-effect">
                                    <i class="mdi mdi-airplane-takeoff mdi-18px"></i>
                                    <span>Leave</span>
                                </a>
                            </li>
                         
                            
                            <li>
                                <a href="announcement.php" class=" waves-effect">
                                    <i class="mdi mdi-bullhorn mdi-18px"></i>
                                    <span>Announcement</span>
                                </a>
                            </li> 
                        <?php } ?>
                         <?php if($role == '1') { ?>
                            <li>
                                <a href="position.php" class=" waves-effect">
                                    <i class="ti ti-layout-tab-v"></i>
                                    <span>Position</span>
                                </a>
                            </li>
                            <li>
                                <a href="schedule.php" class=" waves-effect">
                                    <i class="ti ti-timer"></i>
                                    <span>Schedule</span>
                                </a>
                            </li>
                            <li>
                                <a href="employee.php" class=" waves-effect">
                                    <i class="ti ti-user"></i>
                                    <span>Employee</span>
                                </a>
                            </li>
                            <li>
                                <a href="attendance.php?filter=<?php echo $to ?>" class=" waves-effect">
                                    <i class="ti ti-alarm-clock"></i>
                                    <span>Attendance</span>
                                </a>
                            </li> 
                            
                             
                            <li>
                                <a href="leave.php" class=" waves-effect">
                                    <i class="mdi mdi-airplane-takeoff mdi-18px"></i>
                                    <span>Employee Leave</span>
                                </a>
                            </li>
                            <li>
                                <a href="announcement.php" class=" waves-effect">
                                    <i class="mdi mdi-bullhorn mdi-18px"></i>
                                    <span>Announcement</span>
                                </a>
                            </li> 
                            <!-- <li>
                                <a href="report.php?d1=0&d2=0" class=" waves-effect">
                                    <i class="ti ti-clipboard"></i>
                                    <span>Report</span>
                                </a>
                            </li> -->
                            <!-- <li>
                                <a href="user_management.php" class="waves-effect">
                                    <i class="mdi mdi-account-multiple-outline mdi-18px"></i>
                                    <span>User Management</span>
                                </a>
                            </li> -->
                             <?php } ?>
                             

                           <!--  <li>
                                <a href="visitor_log.php" class=" waves-effect">
                                    <i class="mdi mdi-badge-account-outline"></i>
                                    <span>Visitor Log</span>
                                </a>
                            </li> -->
                           
                           
                    




                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End