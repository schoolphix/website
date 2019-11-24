<?php
require_once("functions.php");
mustLogin();
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Upload New File";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'upload new file';
$crumb[1][2] = 'Upload New File';

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
                <h4 class="classic-title"><span>Upload New File</span></h4>
                
				<!-- Start Contact Form -->
 
<form name ="forumnewpost" id="forumnewpost" method="POST" action="controller" enctype="multipart/form-data">
<table width="100%" border="0" class="mytable" align="center" style="border-top:none">
  <tr>
    <td align="left" width="25%"><span style="font-weight:bold">Select Upload Type:</span></td>
    <td align="left">
<select name="picturetype" class="email" title="select an upload type">
    <option value="">Select Upload Type</option>
	<!--
	<option value="calendar">Calendar</option>
    <option value="timetable">Timetable</option>
    -->
    <option value="newsletter">Secondary News Letter</option>     
    <option value="newsletter_2">Primary News Letter</option>     
    <option value="admission_form">Secondary Admission Form</option>     
    <option value="admission_form_2">Primary Admission Form</option>     
</select>
          </td>
  </tr>
  <tr>
    <td align="left" width="10%"></td>
    <td align="left">
<input type="file" name="photo" title="show upload dialog" class="email" />
	</td>
  </tr>
  <tr>                
    <td align="left" colspan="2">&nbsp;
    </td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td align="left">
    <input type="hidden" name="action" value="upload-new-file" />
    <input type="submit" name="Post" id="submit" value="Upload" class="mybutton" title="send message"/>&nbsp;&nbsp;
    <input type="button" name="cancelpost" id="submit" value="Cancel" class="mybutton" title="Click to Cancel" onclick="parent.location = 'cpanel-home'"/>&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="color:#00f;font-weight:bold">PDF or Excel (5MB Max)</span>    

    </td>
  </tr>
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