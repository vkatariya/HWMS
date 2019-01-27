   

    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="logo-area">
                       <h3 style="color:white; font-family:Calibri;">Client Administrator | Bhopal Incinerators Ltd.</h3>                       
					   
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            
                            <li class="nav-item"> <a href="logout.php"  role="button" aria-expanded="false" ><span><i class=" fa fa-sign-out">&nbsp Logout</i></span></a>
                              
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class = "container">
        <div class = "row"> 
            <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><img src="images/logo.png" style="align-content:center; width: 400px; height:100px;" class="center-block"> 
            <hr style="color:black;">
            
            <h3 style="text-align:center; font-family: Times New Roman;">Welcome Back: <?php echo $member['authorized_person'];  ?></h3>
            <h3 style="text-align:center; font-family: Times New Roman;"><?php echo $member['organization_name']; ?></h3>
            <h5 style="text-align:center; font-family: Times New Roman;"><?php echo $member['street']; ?>,<?php echo $member['area']; ?>,<?php echo $member['city']; ?>,<?php echo $member['district']; ?>,<?php echo $member['state']; ?>,<?php echo $member['country']; ?>,<?php echo $member['pincode']; ?></h5>
            <hr style="color:black;">
            
            <h5 style="text-align:center; font-family: Times New Roman;">BIL-ID:<?php echo $member['username_bil'];  ?> &nbsp &nbsp &nbsp PCB-ID: <?php echo $member['username_pcb'];  ?> &nbsp &nbsp &nbsp HCF-ID: <?php echo $member['hcf_number'];  ?>  </h5>
            <hr style="color:black;">

            </div>
        </div>
    </div>