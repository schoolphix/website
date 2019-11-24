<?php
require_once("functions.php");
if(isset($_SESSION['wtsession'])){
	header("Location: cpanel-home");
	exit;
}
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Admin Login";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);




$crumb[0][0] = './';
$crumb[0][1] = 'home';
$crumb[0][2] = 'Home';
$crumb[1][0] = '';
$crumb[1][1] = 'login';
$crumb[1][2] = 'Login';

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            
            
            <!-- Page Content -->
            <div class="col-md-9 page-content">
                
                <!-- Classic Heading -->
                <h4 class="classic-title"><span>Login Page</span></h4>
                
				<!-- Start Contact Form -->
<? callErrorMessage();
if(isset($_GET['logout'])&&$_GET['logout']=="true"){
	echo "<div class='portlet-msg-success'>You Have Logged Out Successfully</div>";
}											
if(isset($_GET['login'])&&$_GET['login']=="false"){
	echo "<div class='portlet-msg-info'>Please login to continue</div>";
}
if(isset($_GET['login'])&&$_GET['login']=="false-admin"){
	echo "<div class='portlet-msg-info'>Please login as admin to continue</div>";
}											

?>
                <? if(isset($_COOKIE['cookieuser'])){$valuser = $_COOKIE['cookieuser'];}?>
                <? if(isset($_COOKIE['cookiepass'])){$valpass = $_COOKIE['cookiepass'];}?>

    <form role="form" class="contact-form" id="contact-form" method="post" action="controller">
        <div class="form-group">
            <div class="controls">
	            <input type="text" value="<?=$valuser?>" name="email" title="enter your user id here" required="required" placeholder="UserId"/>
            </div>
        </div>

    <div class="form-group">
    <div class="controls">
    <input type="password" name="password" value="<?=$valpass?>" title="enter your password here" required="required" class="email" placeholder="Password"/>
     
    </div>
    </div>
    
    
    <div class="form-group">
    <div class="controls">
    <label>Remember Me:
<input type="checkbox" style="cursor:pointer" name="remember" title="click here to save login details on this device" onClick="if(this.checked){alert('Your login details will be saved on this device. Please uncheck if it is a shared device.');}"/>
	</label>
     
    </div>
    </div>
    

     <input type="hidden" name="action" value="login" />
    <button type="submit" id="submit" class="btn btn-base">Login</button><div id="success" style="color:#34495e;"></div>
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