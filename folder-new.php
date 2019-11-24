<?php
require_once("functions.php");
mustLogin();
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="New Album";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'new album';
$crumb[1][2] = 'New Album';

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
                <h4 class="classic-title"><span>Create New Album</span>
                <span style="float:right">
                	<a href="folder-list.php"><b>See All Albums</b></a>
               </span>
                </h4>
                
				<!-- Start Contact Form -->
 
     
<form id="postform" name="postform" method="post" action="controller">
    <table class="mytable" width="100%" align="center">
    <tr>
    <td width="25%" align="left" class="leftTd">Album Name:</td>
    <td width="75%" align="left">
      <input type="text" name="caption" class="smalltxt" title="enter the folder caption" style="width:290px">
    </td>
    </tr>
    <tr>
    <td class="leftTd" align="left">Description:</td>
    <td align="left">
    <textarea name="description" id="description" cols="45" rows="3" class="smallTxtArea" title="describe this category" style="width:290px"></textarea>
	</td>
    </tr>
    <tr><td>&nbsp;</td><td align="left">
    <input type="submit" name="createcat" id="mybutton" title="click to save" value="Save" />&nbsp;
    <input type="hidden" name="action" value="create-album" />
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