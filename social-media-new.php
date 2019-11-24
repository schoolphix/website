<?php
require_once("functions.php");
mustLogin("ADMIN");
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Add / Update Social Media Page";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'social media';
$crumb[1][2] = 'Social Media';

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
                <h4 class="classic-title"><span>Add / Update Social Media Page</span>
                	<span style="float:right">
                		<a href="social-media-list"><b>See All Social Media Pages</b></a>
                    </span>
                </h4>
                
				<!-- Start Contact Form -->
 
     
<form id="postform" name="postform" method="post" action="controller">
    <table class="mytable" width="100%" align="center">
    <tr>
    <td class="leftTd" align="left">Social Media Caption:</td>
    <td align="left">
 <select name="caption" class="email">
 	<option value="">Select Social Media</option>
     <option value="facebook">Facebook</option>
     <option value="twitter">Twitter</option>
     <option value="google">Google</option>
     <option value="dribbble">Dribbble</option>
     <option value="linkedin">Linkedin</option>
     <option value="flickr">Flickr</option>
     <option value="tumblr">Tumblr</option>
     <option value="instagram">Instagram</option>
     <option value="vimeo">Vimeo</option>
     <option value="skype">Skype</option>
 </select>
	</td>
    </tr>
    <tr>
    <td width="25%" align="left" class="leftTd">Social Media Link:</td>
    <td width="75%" align="left">
      <input type="text" name="medialink" class="email" title="enter social media link">
    </td>
    </tr>
    <tr><td>&nbsp;</td><td align="left">
    <input type="submit" name="createcat" id="mybutton" title="click to save" value="Save" />&nbsp;
    <input type="hidden" name="action" value="social-media" />
<input type='button' id='mybutton' value='Cancel' title='click to cancel' onclick="parent.location='cpanel-home'">
    </td></tr>
    </table>

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