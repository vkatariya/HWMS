<div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">

                                <li><a data-toggle="collapse" data-target="" href="Dashboard.php">Home</a>
                                    
                                </li>
                                <li><a data-toggle="collapse" data-target="" href="Notifications.php">Notifications</a>
                                    
                                </li>
                                <li><a data-toggle="collapse" data-target="" href="Payment.php">Payment Info</a>
                                   
                                </li>
                                <li><a data-toggle="collapse" data-target="" href="GCertificate.php">Generate Certificate</a>
                                   
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Update Profile</a>
                                  <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="updetails.php">Update Application Details</a>
                                        </li>
										<li><a href="changep.php">Change Password</a>
                                        </li>
                                       
                                    </ul>  
                                </li>
                                <li><a data-toggle="collapse" data-target="" href="GQRcode.php">Generate QR Code</a>
                                    
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Reports</a>
                                  <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="dailyreport.php">Daily Reports</a>
                                        </li>
										<li><a href="datereport.php">Datewise Reports</a>
                                        </li>
                                       <li><a href="annualreport.php">Annual Reports</a>
                                        </li>
                                    </ul>  
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
</div>

    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <?php
                $url =($_SERVER['REQUEST_URI']);
                $id = substr($url, strrpos($url, '/') + 1);
                //echo $id;
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <?php  
                        if($id == 'Dashboard.php'){ ?>
<li class="active"><a data-toggle="" href="Dashboard.php"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <?php }else{ ?>
<li><a data-toggle="" href="Dashboard.php"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <?php } 

                        if($id == 'Notifications.php'){ ?>

                        <li class="active"><a data-toggle="" href="Notifications.php"><i class="notika-icon notika-mail"></i> Notifications</a>
                        </li>
                        <?php }else{ ?>

                        <li ><a data-toggle="" href="Notifications.php"><i class="notika-icon notika-mail"></i> Notifications</a>
                        </li>
                        <?php }
                        

                        if($id =='Payment.php'){ ?>
                        <li class="active"><a data-toggle=""  href="Payment.php"><i class="fa fa-money"></i> Payment</a>
                        </li>
                          <?php }else{ ?>
                         <li> <a data-toggle="" href="Payment.php"><i class="fa fa-money"></i> Payment</a>
                        </li>
                    <?php } 

                         if($id == 'Gcertificate.php'){ ?>
                           <li class="active"><a data-toggle="" href="Gcertificate.php"><i class="fa fa-certificate"></i> Generate Certificate</a>
                          <?php }else{ ?>
                           <li><a data-toggle="" href="Gcertificate.php"><i class="fa fa-certificate"></i> Generate Certificate</a>
                    <?php } ?>

                        <li><a data-toggle="tab" href="#up"><i class="fa fa-user"></i> Update Profile</a>
                        </li>
                        <li><a data-toggle="" href="GQRcode.php"><i class="fa fa-qrcode"></i> Generate QR Code</a>
                        </li>
                        <li><a data-toggle="tab" href="#reports"><i class="notika-icon notika-form"></i> Reports</a>
                        </li>
                        
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                           
                        </div>
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                           
                        </div>
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                           
                        </div>
                        <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                          
                        </div>
                        <div id="up" class="tab-pane notika-tab-menu-bg animated flipInX">
                           <ul class="notika-main-menu-dropdown">
                         <?php
                            if($id=='updetails.php'){?>
                                <li class="active"><a href='updetails.php'>Update Application Details</a>
                                  </li>
                                 <?php }else {?>
                          <li ><a href='updetails.php'>Update Application Details</a>
                                </li>

                           <?php }
                           if($id=='cpassword.php'){ ?>}
                                   else{ ?> 

                            <li class="active"><a href="cpassword.php">Change Password</a>
                                </li>
                                    <?php } ?>
                                <li><a href="cpassword.php">Change Password</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Forms" class="tab-pane notika-tab-menu-bg animated flipInX">
                            
                        </div>
                        <div id="Appviews" class="tab-pane notika-tab-menu-bg animated flipInX">
                            
                        </div>
                        <div id="reports" class="tab-pane notika-tab-menu-bg animated flipInX">
                           <ul class="notika-main-menu-dropdown">
                                <li><a href="dailyreport.php">Daily Report</a>
                                </li>
                                <li><a href="datereport.php">Datewise Reports</a>
                                </li>
                                <li><a href="annualreport.php">Annual Reports</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>