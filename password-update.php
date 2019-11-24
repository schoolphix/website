<?php
require_once("functions.php");
mustLogin();
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Password Update";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'password update';
$crumb[1][2] = 'Password Update';

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            
            
            <!-- Page Content -->
            <div class="col-md-9 page-content">

               <? callErrorMessage();?>
 
                <!-- Classic Heading -->
                <h4 class="classic-title"><span>Update Admin Password</span></h4>
                
				<!-- Start Contact Form -->
 
     
     <form role="form" class="contact-form" id="contact-form" method="post" action="controller">

    <div class="form-group">
    <div class="controls">
    <input type="password" name="oldpass" title="enter your current password here" required="required" class="email" placeholder="Current Password:"/>
     
    </div>
    </div>

    <div class="form-group">
    <div class="controls">
    <input type="password" name="newpass" title="enter your password here" required="required" class="email" placeholder="New Password:"/>
     
    </div>
    </div>


    <div class="form-group">
    <div class="controls">
    <input type="password" name="newpasssecond" title="enter your new password again" required="required" class="email" placeholder="New Password Again:"/>
     
    </div>
    </div>
    

     <input type="hidden" name="action" value="password-update" />
    <button type="submit" id="submit" class="btn btn-base">Save</button>
    
    <button type="button" id="submit" class="btn btn-base" onClick="parent.location='cpanel-home'">Cancel</button><div id="success" style="color:#34495e;"></div>
    
    </form>
    
     
     
     
				<!-- End Contact Form -->
                 
                
                <!-- Divider -->
                <div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>




            </div>
            <!-- End Page Content-->
            

<?	getSideBar($links)?>            
            
        </div>
    </div>
</div>
<!-- End Content -->


<?php
getSiteFooter($web_data);
?>