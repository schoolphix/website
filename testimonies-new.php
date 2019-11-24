<?php
require_once("functions.php");
mustLogin("ADMIN");
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Add New Testimony";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
?>
<script type="text/javascript" src="texteditors/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<?
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'add new testimony';
$crumb[1][2] = 'Add New Testimony';

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
                <h4 class="classic-title"><span>Add New Testimony</span>
                	<span style="float:right">
                		<a href="testimonies-list.php"><b>Show All Testimonies</b></a>
                    </span>
                </h4>
                
				<!-- Start Contact Form -->
 
<form name ="forumnewpost" id="forumnewpost" method="POST" action="controller" enctype="multipart/form-data">
<table width="100%" border="0" class="mytable" align="center" style="border-top:none">
  
  <tr>
    <td width="25%" align="left" class="leftTd">Name:</td>
    <td width="75%" align="left">
      <input type="text" name="name" class="email" title="enter name">
    </td>
  </tr>
  
  <tr>
    <td align="left" width="25%"><span style="font-weight:bold">Testimony:</span></td>
    <td align="left">
		<textarea name="testimony" title="enter testimony" rows="1" cols="50"></textarea>
    </td>
 </tr>

  <tr>
    <td align="left" width="10%"><span style="font-weight:bold">Select Picture:</span></td>
    <td align="left">
<input type="file" name="photo" title="show upload dialog" class="email" style="width:400px" />
	</td>
  </tr>
  <tr>                
    <td align="left" colspan="2">&nbsp;
    </td>
  </tr>

  <tr>
    <td align="left">
    	<label onClick="if(document.getElementById('check_resize').checked){document.getElementById('show_resize').style.display='block';}else{document.getElementById('show_resize').style.display='none';}"><b>Resize Picture?</b>
<input type="checkbox" style="cursor:pointer" name="remember" onClick="" id="check_resize"/>
	</label>
    </td>
    <td>&nbsp;</td>
 </tr>

  <tr>
    <td>&nbsp;</td>
    <td align="left">
    <div class="form-group" id="show_resize" style="display:none">
    <div class="controls">
		<input type="text" name="width" placeholder="width" style="width:100px"/> * <input type="text" name="height" placeholder="Height" style="width:100px;"/>
    </div>
    </div>
    	
    </td>
 </tr>

  <tr>
  	<td>&nbsp;</td>
    <td align="left">
    <input type="hidden" name="action" value="add-testimony" />
    <input type="submit" name="Post" id="submit" value="Upload" class="mybutton" title="submit testimony"/>&nbsp;&nbsp;
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